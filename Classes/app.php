<?php

class app {
  public function __construct() {
    require_once "Config/config.php";
    new checkAuthentication();
    require_once "Routes/routes.php";
  }
}
