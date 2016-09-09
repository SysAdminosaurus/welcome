<?php

class companyModel {

  public function getCompanyInfoByID($id) {
    /*
    * @description getting all the company info for one company by id
    * @param int $id - the id of the company
    * @return array of $results
    */
    $database = new Database();
    $database->query("SELECT *
                      FROM company
                      WHERE id = :id");
    $database->bind(":id", $id);
    $result = $database->single();
    if ($database->rowCount() === 0) { return null; }
    return $result;
  }

  public function updateCompanyInfo($forminfo) {
    /*
    * @description updates company info
    * @param stdClass $forminfo - class containing form data with required variables
    * @return null
    */
    $database = new Database();
    $database->query("UPDATE company
                      SET company.company_name = :company_name,
                      company.company_address = :company_address,
                      company.contact_name = :contact_name,
                      company.contact_position = :contact_position,
                      company.contact_tel = :contact_tel,
                      company.contact_email = :contact_email,
                      company.company_HSO = :company_HSO,
                      company.company_scope = :company_scope
                      WHERE company.id = :id");
    $database->bind(":company_name", $forminfo->company_name);
    $database->bind(":company_address", $forminfo->company_address);
    $database->bind(":contact_name", $forminfo->contact_name);
    $database->bind(":contact_position", $forminfo->contact_position);
    $database->bind(":contact_tel", $forminfo->contact_tel);
    $database->bind(":contact_email", $forminfo->contact_email);
    $database->bind(":company_HSO", $forminfo->company_HSO);
    $database->bind(":company_scope", $forminfo->company_scope);
    $database->bind(":id", $forminfo->id);
    $database->execute();
    //TODO should check if update sucessful and return bool instead of null
    return null;
  }

  public function getListOfCompanies() {
    /*
    * @description gets list of all companies
    * @param none
    * @return null if none else array of $results
    */
    $database = new Database();
    $database->query("SELECT *
                      FROM company
                      ");
    $results = $database->resultset();
    if ($database->rowCount() === 0) { return null; }
    return $results;
  }

  public function getListOfCompaniesGroupByType() {
    /*
    * @description gets list of all companies grouped by type
    * @param none
    * @return null if none else array of $results
    */
    $database = new Database();
    $database->query("SELECT *
                      FROM company
                      JOIN company_type ON company_type.id = company.type_id
                      ORDER BY company.type_id
                      ");
    $results = $database->resultset();
    if ($database->rowCount() === 0) { return null; }
    return $results;
  }

  public function createNewCompany($formInfo) {
    /*
    * @description creating a new company
    * @param stdClass $formInfo - class containing form data with required variables
    * @return int - lastInsertId
    */
    $database = new Database();
    $database->query("INSERT INTO company (company_name)
                      VALUES (:company_name)
                      ");
    $database->bind(":company_name", $formInfo->company_name);
    $database->execute();
    return $database->lastInsertId();
  }

  public function updateApproval($companyID) {
    /*
    * @description update company with date time stamp if appoved by admin
    * @param int $companyID - id of company to approve
    * @return null
    */
    $database = new Database();
    $database->query("UPDATE company
                      SET company.approved = :approved
                      WHERE company.id = :companyID");
    $database->bind(":approved", date("c") );
    $database->bind(":companyID", $companyID);
    $database->execute();
    //TODO should check if update sucessful and return bool instead of null
    return null;
  }


}
