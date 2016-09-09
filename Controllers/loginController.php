<?php

class loginController {

  public function __construct() {
    $userModel = new userModel;
    $templateData = new stdClass;
    $formError = "Please check your details and try again.";

    if ($_POST) {
      // on form post grab users details
      $formPassword = $_POST['password'];
      $userdetails = $userModel->getUserDetailsByEmailIfActive(htmlspecialchars($_POST['email']));

      if (is_null($userdetails)) {
        // if no users details throw error
        $templateData->errorMessage = $formError;
      }

      if (password_verify($formPassword, $userdetails["pwhash"])) {
        // check form password vs pw hash from database if match setup session variables to be used later
        $_SESSION['userID'] = $userdetails["id"];
        $_SESSION['friendly_name'] = $userdetails["friendly_name"];
        $_SESSION['companyID'] = $userdetails["companyid"];
        $_SESSION['admin'] = null;
        // forward to profile route
        header('Location: /profile/'.$_SESSION['companyID']);
        exit;
      }

      if (!password_verify($formPassword, $userdetails["pwhash"])) {
        // if passwords do not match, throw error (generic error used so as not to leak information)
        $templateData->errorMessage = $formError;
      }
    }

    // render page if form not posted 
    $view = new Page();
    $view->setTemplate('loginView');
    $view->setDataSrc($templateData);
    $view->render();
  }

}
