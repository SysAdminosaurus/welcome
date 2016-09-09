<?php

class profileUploadController {

  public function __construct() {

    // getting list of evidence from database
    $evidenceModel = new evidenceModel;
    $templateData = new stdClass;
    $templateData->evidence_type_list = $evidenceModel->getListOfEvidenceTypes();

    if ($_POST) {
      // on post passing form info into container
      $forminfo = new stdClass;
      $forminfo->company_id = $_SESSION['companyID'];
      $forminfo->evidence_name = htmlspecialchars($_POST['evidence_name']);
      $forminfo->evidence_type_id = htmlspecialchars($_POST['evidence_type']);
      $forminfo->expires = htmlspecialchars($_POST['expires']);
      $forminfo->archived = 0;
      $forminfo->date_uploaded = date("c");
      $forminfo->evidence_href = null;
      if (is_uploaded_file($_FILES['attachment']['tmp_name']))  {
        // when file is uploaded randamzing name to avoid duplicates and moving from temp location to our uploads location
             $original_name_of_uploaded_file = basename($_FILES["attachment"]['name']);
             $type_of_uploaded_file = substr($original_name_of_uploaded_file, strrpos($original_name_of_uploaded_file, '.') + 1);
             $name_of_uploaded_file =  $_SESSION['companyID'] . "-" . substr(md5(microtime()),rand(0,26),10) . "." . $type_of_uploaded_file;
             $folder = ROOT . UPLOAD_LOC . $name_of_uploaded_file;
             $tmp_path = $_FILES["attachment"]["tmp_name"];
             move_uploaded_file($tmp_path, $folder);
             // checking file type is one of our allowed types before adding link to database
             if (mime_content_type($folder) == "image/jpeg" || mime_content_type($folder) == "image/png") {
               $forminfo->evidence_href = UPLOAD_LOC . $name_of_uploaded_file;
             }
             if (mime_content_type($folder) == "application/pdf" || mime_content_type($folder) == "application/msword" || mime_content_type($folder) == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {
               $forminfo->evidence_href = UPLOAD_LOC . $name_of_uploaded_file;
             }
           }
      // updating database with new evidence from form object
      $evidenceModel->addEvidence($forminfo);
      // redirecting back to evidence page
      header('Location: /profile/'.$_SESSION['companyID'].'/evidence');
      exit;
    }

    // render page if no post 
    $view = new Page();
    $view->setTemplate('profileUploadView');
    $view->setDataSrc($templateData);
    $view->render();
  }


}
