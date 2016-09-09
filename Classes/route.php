<?php

class route {
  private $_uri = array();
  private $_controller = array();

  public function add($uri = null, $controller = null) {
    // mapping url to controller in local arrays
    $this->_uri[] = $uri;
    $this->_controller[] = $controller;
  }

  public function process() {
    // compare url to local arrays looking for route match if found load controller
    $baseurl = $_SERVER['REQUEST_URI'];
    $matches = array();
      foreach ($this->_uri as $key => $value) {
        isset($baseurl) ? $compare = $baseurl : $compare = "/";
          if (preg_match("#^$value(/{0,1})$#", $compare)) {
            $useController = $this->_controller[$key];
            $matches[] = $this->_controller[$key];
            new $useController();
          }
      }
    // on no matches throw error
      if (sizeof($matches) < 1) {
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
        $view = new Page();
        $view->setTemplate('404View');
        $view->setDataSrc(null);
        $view->render();
      }
  }

}
