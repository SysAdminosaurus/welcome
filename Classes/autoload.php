<?php

// registering auto load so we dont have to keep including our classes in the project. 

function controllerAutoload($controller_name) {
  if (file_exists("Controllers/".$controller_name.".php")) {
    require_once "Controllers/".$controller_name.".php";
  }
}
function modelAutoload($model_name) {
  if (file_exists("Models/".$model_name.".php")) {
    require_once "Models/".$model_name.".php";
  }
}
function classAutoload($class_name) {
  if (file_exists("Classes/".$class_name.".php")) {
    require_once "Classes/".$class_name.".php";
  }
}

spl_autoload_register('controllerAutoload');
spl_autoload_register('modelAutoload');
spl_autoload_register('classAutoload');
