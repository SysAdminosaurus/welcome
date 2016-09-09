<?php

class profileController {

  public function __construct() {

    // checking companyID to url ID if different throwing 403
    $baseurl = explode('/',$_SERVER['REQUEST_URI']);
    if ($baseurl[2] != $_SESSION['companyID']) {
      header($_SERVER["SERVER_PROTOCOL"]." 403 forbidden", true, 403);
      $view = new Page();
      $view->setTemplate('403View');
      $view->setDataSrc();
      $view->render();
    }

    // get data from database
    $companyModel = new companyModel;
    $templateData = new stdClass;
    $templateData->companyinfo = $companyModel->getCompanyInfoByID($_SESSION['companyID']);

    if ($baseurl[2] === $_SESSION['companyID']) {
    // when companyIDs match url IDs render page with company details
    $view = new Page();
    $view->setTemplate('profileView');
    $view->setDataSrc($templateData);
    $view->render();
    }
  }
}
