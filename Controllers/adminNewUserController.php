<?php

class adminNewUserController {
  public function __construct() {

    $userModel = new userModel;
    $companyModel = new companyModel;
    $templateData = new stdClass;

    if ($_POST) {
      // getting the information from the form
      $formInfo = new stdClass;
      $formInfo->email = htmlspecialchars($_POST['email']);
      $formInfo->friendlyname = htmlspecialchars($_POST['friendly_name']);
      $formInfo->company_name = htmlspecialchars($_POST['company_name']);
      // creating new company and user
      $formInfo->companyID = $companyModel->createNewCompany($formInfo);
      $token = $userModel->createNewUser($formInfo);
      // sending reset token to user so they can then login
      $email = new emailsend;
      $to = $formInfo->email;
      $title = "Welcome to CLC contractors system";
      $message = "<p>The following code is required to create and reset your password on your new CLC contractors system, please follow the link provied and enter the code.</p>";
      $message .= "<p>Reset Code: ".$token."</p>";
      $message .= "<p><a href=\"http://contractors.cheltenhamladiescollege.co.uk/reset\" >Create account and reset your password</a></p>";
      $email->email_user($to, $title, $message);
      // letting admin know user created
      $templateData->message = "New user created";
    }
    // render page
    $view = new Page();
    $view->setTemplate('newuserView');
    $view->setDataSrc($templateData);
    $view->render();
  }

}
