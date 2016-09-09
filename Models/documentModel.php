<?php

class documentModel {

  public function getDocumentBySectionID($sectionID, $typeID = 0) {
    /*
    * @description getting a list of documents by reqested section
    * @param int $sectionID, int $typeID - ints of section required and document type
    * @return array of $results
    */
    $database = new Database();
    $database->query("SELECT *
                      FROM document
                      WHERE section_id = :sectionID
                      AND type_id IN(:typeID, 0)
                      ");
    $database->bind(":sectionID", $sectionID);
    $database->bind(":typeID", $typeID);
    $results = $database->resultset();
    if ($database->rowCount() === 0) { return null; }
    return $results;
  }

}
