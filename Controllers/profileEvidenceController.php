<?php

class profileEvidenceController {

  public function __construct() {

    $evidenceModel = new evidenceModel;
    $templateData = new stdClass;

    if ($_POST) {
      // on post archive evidence by id
      $evidenceModel->archiveEvidenceByID($_POST['remove']);
    }

    // get list of evidence by company id
    $templateData->evidencelist = $evidenceModel->getListOfEvidenceByCompanyID($_SESSION["companyID"]);

    // render page
    $view = new Page();
    $view->setTemplate('profileEvidenceView');
    $view->setDataSrc($templateData);
    $view->render();
  }

}
