<?php

class profileInfoController {

  public function __construct() {

    $companyModel = new companyModel;
    $templateData = new stdClass;

    if ($_POST) {
      // on post update company details
      $forminfo = new stdClass;
      $forminfo->id = $_SESSION['companyID'];
      $forminfo->company_name = htmlspecialchars($_POST['company_name']);
      $forminfo->company_address = htmlspecialchars($_POST['companyaddress']);
      $forminfo->contact_name = htmlspecialchars($_POST['contactname']);
      $forminfo->contact_position = htmlspecialchars($_POST['contactposition']);
      $forminfo->contact_tel = htmlspecialchars($_POST['contacttel']);
      $forminfo->contact_email = htmlspecialchars($_POST['contactemail']);
      $forminfo->company_HSO = htmlspecialchars($_POST['companyhealthandsafety']);
      $forminfo->company_scope = htmlspecialchars($_POST['scope']);
      $companyModel->updateCompanyInfo($forminfo);
    }

    // getting data from db and rendering page
    $templateData->companyinfo = $companyModel->getCompanyInfoByID($_SESSION['companyID']);
    $view = new Page();
    $view->setTemplate('profileInfoView');
    $view->setDataSrc($templateData);
    $view->render();


  }

}
