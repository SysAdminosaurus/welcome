<?php

class adminOverviewController {

  public function __construct() {

    $templateData = new stdClass;
    $companyModel = new companyModel;
    $complianceModel = new complianceModel;

    if ($_POST) {
      // when form submitted
      // checking which button is pressed forwarding to correct page
      if ($_POST["review"]) {
          $_SESSION['companyID'] = $_POST["companyID"];
          header('Location: /profile/'.$_SESSION['companyID']);
          exit;
      }
      if ($_POST["chase"]) {
          $_SESSION['companyID'] = $_POST["companyID"];
          header('Location: /admin/chase');
          exit;
      }
      if ($_POST["signoff"]) {
          $_SESSION['companyID'] = $_POST["companyID"];
          header('Location: /admin/approval/');
          exit;
      }

    }

    // getting a list of all the companies from the database
    $templateData->listofcompanies = $companyModel->getListOfCompanies();
    // render page
    $view = new Page();
    $view->setTemplate('adminOverviewView');
    $view->setDataSrc($templateData);
    $view->render();

  }


}
