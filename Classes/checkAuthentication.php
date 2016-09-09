<?php

class checkAuthentication {

    function __construct()
    {
      // starts sessions, checks user is not logged in or they are on a safe page else forwards then to the login page
      session_start();
      if (empty($_SESSION['userID'])) {
        $baseurl = explode('/',$_SERVER['REQUEST_URI']);
        if (!preg_match("/login|forgot|reset|thankyou|admin/", $baseurl[1])) {
          header('Location: /login/');
          exit;
        }
      }
    }

}
