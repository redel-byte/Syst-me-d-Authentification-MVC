<?php

require_once "../app/core/router.php";

$router = new Router();

// Using array notation
$router->addRouter('GET', '/', function () {
  require_once "../app/views/home.php";
});

$router->addRouter('GET', '/login', function () {
  require_once "../app/views/auth/login.php";
});
$router->addRouter('get','/Dashboard',function(){
  require_once "../app/views/Dashboard.php";
});
$router->addRouter('POST','/Logincontroller',function(){
  require_once "../app/controllers/Logincontroller.php";
});

$router->dispatch();
