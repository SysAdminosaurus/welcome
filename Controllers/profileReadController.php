<?php

class profileReadController {

  public function __construct() {

    // getting a list of documents for this section
    $documentModel = new documentModel;
    $complianceModel = new complianceModel;
    $templateData = new stdClass;
    $templateData->documentlist = $documentModel->getDocumentBySectionID(3, 0);

    // getting complinace details for each document in list
    foreach ($templateData->documentlist as $key => $value) {
      //itterate over document list which is multi dimention array, update using $key correct array with compliance check
      $templateData->documentlist[$key]["compliance"] = $complianceModel->checkCompliance($value['id'] ,$_SESSION['userID']);
    }

    // render page
    $view = new Page();
    $view->setTemplate('profileReadView');
    $view->setDataSrc($templateData);
    $view->render();
  }

}
