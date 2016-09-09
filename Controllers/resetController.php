<?php

class resetController {

  public function __construct() {

    $userModel = new userModel;
    $templateData = new stdClass;

    if ($_POST) {
      // checking form posted
      if (!$userModel->isTokenValid(htmlspecialchars($_POST['token']))) {
        // checking token is in database else throw error
        $templateData->formError = "Please enter a valid reset token.";
        $error = true;
      }
      if (htmlspecialchars($_POST['newpassword']) !== htmlspecialchars($_POST['confirmpassword'])) {
        // checking passwords match else throw error
        $templateData->formError = "Please confirm both your new passwords match.";
        $error = true;
      }
      if (strlen(htmlspecialchars($_POST['newpassword'])) < 8) {
        // checking password is at least 8 characters else throw error
        $templateData->formError = "New password is too short should be at least 8 characters.";
        $error = true;
      }

      if (!$error) {
        // if no error add password hash to database
        $token = htmlspecialchars($_POST['token']);
        $hash = password_hash(htmlspecialchars($_POST['newpassword']), PASSWORD_DEFAULT);
        $userModel->updatePassword($token, $hash);
        // redirect to thankyou page
        $_SESSION['thankyou_message'] = "Your password has been reset, you can now login to continue.";
        header('Location: /thankyou/');
        exit;
      }
    }

    // render form if not submitted 
    $view = new Page();
    $view->setTemplate('resetView');
    $view->setDataSrc($templateData);
    $view->render();
  }
}
