<?php

class adminController {
  public function __construct() {
    // ldap login
    $templateData = new stdClass;
    $formError = "Please check your details and try again.";

    if ($_POST) {
      // when form is submitted grab details
      $formusername = $_POST['username'] . "@" . COMPANY_SUFFIX;
      $formpassword = $_POST['password'];

      if ($formpassword == "") {
        // check password isnt blank
        $templateData->errorMessage = $formError;
      }

      if (!$formpassword == "") {
        // if password connect to ldap
        $ldap_loc = LDAP_SERVER;
        $ldap_port = 389;
        $ldap = ldap_connect($ldap_loc, $ldap_port) or die("Could not connect to LDAP server.");
        if ($ldap) {
          // when connected to ldap try and bind/logon
          $ldapbind = ldap_bind($ldap, $formusername, $formpassword);
          if ($ldapbind) {
            // if bind/login is OK setup session variable and forward to admin page
            $_SESSION['userID'] = $_POST['username'];
            $_SESSION['friendly_name'] = $_POST['username'];
            $_SESSION['companyID'] = null;
            $_SESSION['admin'] = true;
            header('Location: /admin/overview');
            exit;
          }

          if (!$ldapbind) {
            // if bind/login fails throw error
            $templateData->errorMessage = $formError;
          }

        }
      }
    }

    // render login form
    $view = new Page();
    $view->setTemplate('adminView');
    $view->setDataSrc($templateData);
    $view->render();
  }

}
