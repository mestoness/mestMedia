<?php
spl_autoload_register(function ($class_name) {
  if (file_exists(__DIR__ . "/Model/" . $class_name . "Model.php")) {
    require __DIR__ . "/Model/" . $class_name . "Model.php";
  }
  if (file_exists(__DIR__ . "/Helper/classes/class." . strtolower($class_name) . ".php")) {
    require __DIR__ . "/Helper/classes/class." . strtolower($class_name) . ".php";
  }
  if (file_exists(__DIR__ . "/Middleware/" . $class_name . ".php")) {
    require __DIR__ . "/Middleware/" . $class_name . ".php";
  }
});
Helper::load();

require 'app/Core/model.php';
require 'app/Core/middleware.php';

require 'app/Core/view.php';
require 'app/Core/controller.php';
require 'app/Core/route.php';


$_reg_number = '(\d+)';
$_reg_url = '(.*?)';
