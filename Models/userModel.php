<?php

class userModel {

  public function getUserDetailsByEmailIfActive($emailaddress = null) {
    /*
    * @description getting users details by email address
    * @param string $emailaddress - email address to search on
    * @return single array of $result
    */
    $database = new Database();
    $database->query("SELECT *
                      FROM user
                      WHERE email = :email
                      AND active = 1");
    $database->bind(":email", $emailaddress);
    $result = $database->single();
    if ($database->rowCount() === 0) { return null; }
    return $result;
  }

  public function getEmailsByCompanyID($companyID) {
    /*
    * @description getting list of email address assigned to a company
    * @param int $companyID - id of company to search on
    * @return array of $results
    */
    $database = new Database();
    $database->query("SELECT user.id, user.email, user.friendly_name, company.company_name
                      FROM user
                      JOIN company ON user.companyid = company.id
                      WHERE user.companyid = :companyid
                      AND user.active = 1");
    $database->bind(":companyid", $companyID);
    $results = $database->resultset();
    if ($database->rowCount() === 0) { return null; }
    return $results;
  }

  public function doesUserExist($emailaddress) {
    /*
    * @description check to see if a user exists and is active
    * @param string $emailaddress - email address of user to check
    * @return bool - true/false if user exists
    */
    $database = new Database();
    $database->query("SELECT user.id
                      FROM user
                      WHERE user.email = :email
                      AND user.active = 1");
    $database->bind(":email", $emailaddress);
    $results = $database->resultset();
    if ($database->rowCount() === 0) { return false ; }
    return true;
  }

  public function generateResetToken($emailaddress) {
    /*
    * @description generating password reset token for email address
    * @param string $emailaddress - email to create token for
    * @return string contain a $token - hex(32) 6 characters
    */
    $token = substr(md5(microtime()),rand(0,26),6);
    $database = new Database();
    $database->query("UPDATE user
                      SET user.reset_token = :token
                      WHERE user.email = :email");
    $database->bind(":email", $emailaddress);
    $database->bind(":token", $token);
    $database->execute();
    return $token;
  }

  public function isTokenValid($token) {
    /*
    * @description checking token passed is in database and user is active
    * @param string $token - token to check for
    * @return bool - true/false if token exists
    */
    $database = new Database();
    $database->query("SELECT user.id
                      FROM user
                      WHERE user.reset_token = :token
                      AND user.active = 1");
    $database->bind(":token", $token);
    $results = $database->resultset();
    if ($database->rowCount() === 0) { return false ; }
    return true;
  }

  public function updatePassword($token, $hash) {
    /*
    * @description update pwhash in database where token exists
    * @param string $token, string $hash - token to lookup and replace hash
    * @return null
    */
    $database = new Database();
    $database->query("UPDATE user
                      SET user.reset_token = null,
                          user.pwhash = :hash
                      WHERE user.reset_token = :token");
    $database->bind(":hash", $hash);
    $database->bind(":token", $token);
    $database->execute();
    //TODO should check if update sucessful and return bool instead of null
    return;
  }

  public function createNewUser($formInfo) {
    /*
    * @description creating new user record
    * @param stdClass $formInfo - class containing form data with required variables
    * @return string with reset password $token
    */
    $token = substr(md5(microtime()),rand(0,26),6);
    $database = new Database();
    $database->query("INSERT INTO user (companyid, email, pwhash, friendly_name, active, reset_token)
                      VALUES (:companyid, :email, null, :friendlyname, 1, :token)
                      ");
    $database->bind(":companyid", $formInfo->companyID);
    $database->bind(":email", $formInfo->email);
    $database->bind(":token", $token);
    $database->bind(":friendlyname", $formInfo->friendlyname);
    $database->execute();
    return $token;
  }

}
