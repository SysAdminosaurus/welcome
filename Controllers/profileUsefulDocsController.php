<?php

class profileUsefulDocsController {

  public function __construct() {

    // getting list of documents from database
    $documentModel = new documentModel;
    $templateData = new stdClass;
    $templateData->documentlist = $documentModel->getDocumentBySectionID(4, 0);

    // rendering page
    $view = new Page();
    $view->setTemplate('profileUsefulDocsView');
    $view->setDataSrc($templateData);
    $view->render();
  }

}
