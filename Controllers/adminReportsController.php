<?php

class adminReportsController {
  public function __construct() {
    $templateData = new stdClass;

    // render page
    $view = new Page();
    $view->setTemplate('adminReportsView');
    $view->setDataSrc($templateData);
    $view->render();

  }

}
