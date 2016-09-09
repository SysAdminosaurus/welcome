<?php

class adminTypeController {

  public function __construct() {
    $templateData = new stdClass;
    $companyModel = new companyModel;

    $templateData->listofcompanies = $companyModel->getListOfCompaniesGroupByType();
    
    // render page
    $view = new Page();
    $view->setTemplate('typeView');
    $view->setDataSrc($templateData);
    $view->render();
  }

}
