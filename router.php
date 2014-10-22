<?php 
//Dùng Silex Application. Xem document tại: http://silex.sensiolabs.org/documentation
$app->get('/', function () use ($app) {

	return Controller::load('home', '', $_REQUEST);
});
$app->get('/hello/{name}', function ($name) use ($app) {
  return Controller::load('home', '', $_REQUEST);
});

$app->run();
?>