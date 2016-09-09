<?php

class thankyouController {
  public function __construct() {

    $templateData = new stdClass;

    // rendering thankyou page
    $view = new Page();
    $view->setTemplate('thankyouView');
    $view->setDataSrc($templateData);
    $view->render();

    //unset($_SESSION['thankyou_message']);

  }

}
