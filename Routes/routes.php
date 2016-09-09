<?php

  $route = new route();

  //setting up entry points for the web app and the corisponding controller
  $route->add('/', 'loginController');
  $route->add('/login', 'loginController');
  $route->add('/logout', 'logoutController');
  $route->add('/forgot', 'forgotController');
  $route->add('/reset', 'resetController');
  $route->add('/thankyou', 'thankyouController');
  $route->add('/profile/\d*', 'profileController');
  $route->add('/profile/\d*/info', 'profileInfoController');
  $route->add('/profile/\d*/usefuldocs', 'profileUsefulDocsController');
  $route->add('/profile/\d*/upload', 'profileUploadController');
  $route->add('/profile/\d*/evidence', 'profileEvidenceController');
  $route->add('/profile/\d*/read', 'profileReadController');
  $route->add('/profile/\d*/read/\d*', 'profileReadIDController');
  $route->add('/admin', 'adminController');

if ($_SESSION["admin"]) {
  $route->add('/admin/overview', 'adminOverviewController');
  $route->add('/admin/newuser', 'adminNewUserController');
  $route->add('/admin/approval', 'adminApprovalController');
  $route->add('/admin/chase', 'adminChaseController');
  $route->add('/admin/reports', 'adminReportsController');
  $route->add('/admin/reports/type', 'adminTypeController');
  $route->add('/admin/reports/noinsurance', 'adminNoinsuranceController');
  $route->add('/admin/reports/insurancedue', 'adminInsurancedueController');
}

  $route->process();
