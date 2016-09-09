<?php

class complianceModel {

  public function updateCompliance($documentID, $userID) {
    /*
    * @description creating a new record to log a documents audit table
    * @param int $documentID, int $userID - ids of document and user
    * @return null
    */
    $database = new Database();
    $database->query("INSERT INTO compliance (document_id, user_id, agreed_date)
                       VALUES (:documentID, :userID ,:agreed_date)
                       ");
     $database->bind(":documentID", $documentID);
     $database->bind(":agreed_date", date("c"));
     $database->bind(":userID", $userID);
     $database->execute();
    //TODO should check if update sucessful and return bool instead of null
     return;
  }

  public function checkCompliance($documentID, $userID) {
    /*
    * @description checking if user has read document and when
    * @param int $documentID, int $userID - ids of document and user
    * @return null unless agreed and then return datetime 
    */
    $database = new Database();
    $database->query("SELECT *
                      FROM compliance
                      WHERE document_id = :documentID
                      AND user_id = :userID
                      ");
     $database->bind(":documentID", $documentID);
     $database->bind(":userID", $userID);
     $result = $database->single();
     if ($database->rowCount() === 0) { return null; }
     return $result["agreed_date"];
  }

}
