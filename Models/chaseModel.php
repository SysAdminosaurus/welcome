<?php

class chaseModel {

  public function logUserChased($userID) {
    /*
    * @description logs when a user has received a chase email to the database
    * @param int $userID - the id of the user sent the email
    * @return bool - success or failure
    */
    $database = new Database();
    $database->query("INSERT INTO chase (user_id, chase_date)
                       VALUES (:userID ,:chase_date)
                       ");
     $database->bind(":chase_date", date("c"));
     $database->bind(":userID", $userID);
     $database->execute();
     return true;
  }

}
