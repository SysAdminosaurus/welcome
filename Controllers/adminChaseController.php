<?php

class adminChaseController {

  public function __construct() {

    // getting all the email address for a company
    $templateData = new stdClass;
    $chaseModel = new chaseModel;
    $userModel = new userModel;
    $email = new emailsend;
    $emailaddresses = $userModel->getEmailsByCompanyID($_SESSION['companyID']);

    // for each email setup message and send it, also log when it was chased 
    foreach ($emailaddresses as $value) {
      $to = $value['email'];
      $title = $value['friendly_name'] . " please review your information";
      $message = "<p>Our systems have noticed you have not completed your company (".$value['company_name'].") contrator information.</p>";
      $message .= "<p>Please take a moment to login and update your details.</p>";
      $message .= "<p><a href=\"http://contractors.cheltenhamladiescollege.co.uk\" >Cheltenham Ladies College Contractors Login</a></p>";
      $email->email_user($to, $title, $message);
      $chaseModel->logUserChased($value["id"]);
    }

    // render page
    $view = new Page();
    $view->setTemplate('chaseView');
    $view->setDataSrc($templateData);
    $view->render();
  }

}
