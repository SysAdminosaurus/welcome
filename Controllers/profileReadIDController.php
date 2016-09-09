<?php

class profileReadIDController {

  public function __construct() {
    // checking url for document id
    $complianceModel = new complianceModel;
    $baseurl = explode('/',$_SERVER['REQUEST_URI']);
    $documentID = $baseurl[4];
    // marking document id as read 
    $complianceModel->updateCompliance($documentID, $_SESSION['userID']);
    // redirect back to profile read page
    header('Location: /profile/'.$_SESSION['companyID'].'/read');
    exit;
  }

}
