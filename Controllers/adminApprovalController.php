<?php

class adminApprovalController {

  public function __construct() {

    $companyModel = new companyModel;
    $complianceModel = new complianceModel;
    $templateData = new stdClass;

    if ($_POST) {
      // when from posted update database to say company approved with date and time 
      $companyModel->updateApproval($_SESSION['companyID']);
      $templateData->message = "Company approved: " . date("d/m/Y H:i");
    }

    // render page
    $view = new Page();
    $view->setTemplate('approvalView');
    $view->setDataSrc($templateData);
    $view->render();

  }

}
