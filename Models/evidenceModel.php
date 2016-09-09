<?php

class evidenceModel {

  public function getListOfEvidenceByCompanyID($companyID) {
    /*
    * @description getting list of evidence uploaded by company id unless archived
    * @param int $companyID - company id
    * @return array of $results
    */
    $database = new Database();
    $database->query("SELECT *
                      FROM evidence
                      WHERE company_id = :companyID
                      AND archived = 0
                      ORDER BY date_uploaded DESC
                      ");
     $database->bind(":companyID", $companyID);
     $results = $database->resultset();
     if ($database->rowCount() === 0) { return null; }
     return $results;
  }

  public function addEvidence($forminfo) {
    /*
    * @description logging the evidence uploaded via a form
    * @param stdClass $formInfo - class containing form data with required variables
    * @return null
    */
    $database = new Database();
    $database->query("INSERT INTO evidence (evidence_href, expires, archived, evidence_type_id, company_id, evidence_name, date_uploaded)
                      VALUES (:evidence_href, :expires, :archived, :evidence_type_id, :company_id, :evidence_name, :date_uploaded)
                      ");
    $database->bind(":evidence_href", $forminfo->evidence_href);
    $database->bind(":expires", $forminfo->expires);
    $database->bind(":archived", $forminfo->archived);
    $database->bind(":evidence_type_id", $forminfo->evidence_type_id);
    $database->bind(":company_id", $forminfo->company_id);
    $database->bind(":evidence_name", $forminfo->evidence_name);
    $database->bind(":date_uploaded", $forminfo->date_uploaded);
    $database->execute();
    //return $database->lastInsertId();
    //TODO should check if update sucessful and return bool instead of null
    return;
  }

  public function getListOfEvidenceTypes() {
    /*
    * @description getting list of evidence types that can be uploaded
    * @param none
    * @return array of $results
    */
    $database = new Database();
    $database->query("SELECT *
                      FROM evidence_type
                      ");
     $results = $database->resultset();
     if ($database->rowCount() === 0) { return null; }
     return $results;
  }

  public function archiveEvidenceByID($id) {
    /*
    * @description instead of del rows we flag row as archived
    * @param int $id - id of row to archive
    * @return null
    */
    $database = new Database();
    $database->query("UPDATE evidence
                      SET evidence.archived = 1
                      WHERE evidence.id = :id");
    $database->bind(":id", $id);
    $database->execute();
    //TODO should check if update sucessful and return bool instead of null
    return null;
  }

  public function doesInsuranceExist($companyID) {
    /*
    * @description checks evidence table for insurance documents by companyid
    * @param int $companyId - id of company
    * @return bool true/false - does insurance exist
    */
    $database = new Database();
    $database->query("SELECT *
                      FROM evidence
                      WHERE evidence.company_id = :companyid
                      AND evidence.evidence_type_id = 5
                      AND evidence.archived != 1
                      ");
    $database->bind(":companyid", $companyID);
    $results = $database->resultset();
    if ($database->rowCount() === 0) { return false; }
    return true;
  }

  public function getInsuranceDue() {
    /*
    * @description get evidence of type 5 (insurance) where expires is in next 30 days or past
    * @param null
    * @return array of documents due to expires as $results
    */
    $querydate = date('Y-m-d H:i:s', strtotime("+30 days"));
    $database = new Database();
    $database->query("SELECT *
                      FROM evidence
                      JOIN company ON evidence.company_id = company.id
                      WHERE evidence.evidence_type_id = 5
                      AND evidence.expires < :querydate
                      AND evidence.archived = 0
                      ");
    $database->bind(":querydate", $querydate);
    $results = $database->resultset();
    if ($database->rowCount() === 0) { return null; }
    return $results;
  }

}
