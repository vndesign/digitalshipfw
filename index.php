<?php 
define ('APPPATH', dirname(__FILE__));
define ('INCODE', TRUE);
//include config file
include_once "loader.php";
$app = new Silex\Application();
include_once "router.php";

?>