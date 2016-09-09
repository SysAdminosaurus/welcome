<?php

class adminInsurancedueController {

    public function __construct() {

      $templateData = new stdClass;
      $evidenceModel = new evidenceModel;
      $templateData->insurancedue = $evidenceModel->getInsuranceDue();
      // render page
      $view = new Page();
      $view->setTemplate('insurancedueView');
      $view->setDataSrc($templateData);
      $view->render();
    }

}
