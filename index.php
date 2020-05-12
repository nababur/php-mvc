<?php
include_once "system/libs/Session.php";
include_once "config/config.php";
spl_autoload_register(function($classes){
  include 'system/libs/'.$classes.".php";
});


$mainCtlr = new Main();




 ?>
