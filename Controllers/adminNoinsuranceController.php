<?php

class adminNoinsuranceController {

  public function __construct() {
    $templateData = new stdClass;
    $companyModel = new companyModel;
    $evidenceModel = new evidenceModel;

    // get a list of companies
    $templateData->companylist = $companyModel->getListOfCompanies();
    // loop over list and check if insurance exists
    foreach ($templateData->companylist as $key => $value) {
      $templateData->companylist[$key]["insurance"] = ($evidenceModel->doesInsuranceExist($value["id"])) ? "Insurance Uploaded" : "No Insurance Uploaded" ;
    }

    // render page
    $view = new Page();
    $view->setTemplate('noinsuranceView');
    $view->setDataSrc($templateData);
    $view->render();
  }

}
