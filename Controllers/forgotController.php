<?php

class forgotController {

  public function __construct() {

    $userModel = new userModel;
    $templateData = new stdClass;

    if ($_POST) {
      // when form is submitted checking if email exists in user db
      $templateData->message = "Please check your registered email address for details on how to reset your password.";
      $formemail = htmlspecialchars($_POST["email"]);
      $exists = $userModel->doesUserExist($formemail);
      if ($exists) {
        // if email exists send user email with rest token
        $token = $userModel->generateResetToken($formemail);
        $email = new emailsend;
        $to = $formemail;
        $title = "Password reset request";
        $message = "<p>The following code is required to reset your password please follow the link provied and enter the code.</p>";
        $message .= "<p>Reset Code: ".$token."</p>";
        $message .= "<p><a href=\"http://contractors.cheltenhamladiescollege.co.uk/reset\" >Reset your password</a></p>";
        $email->email_user($to, $title, $message);
        // redirect to thankyou page
        $_SESSION['thankyou_message'] = "Please check your email to complete resetting the account.";
        header('Location: /thankyou/');
        exit;
      }
    }
    //render page if form not posted 
    $view = new Page();
    $view->setTemplate('forgotView');
    $view->setDataSrc($templateData);
    $view->render();
  }

}
