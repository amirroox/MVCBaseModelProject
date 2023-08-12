<?php

use App\Core\Routing\Router;

include "Bootstrap/init.php";

$router = new Router;

try {
    $router->run();
} catch (Exception $e) {
    echo $e;
}

$user = new \App\Models\User();
//var_dump($user->readAll());
var_dump($user->readAll());