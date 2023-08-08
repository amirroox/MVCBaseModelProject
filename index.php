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
//var_dump($user->delete(13));
var_dump($user->create(['id' => 65 , 'name' => "kids"]));
//var_dump($user->create(['id' => 113 , 'name' => "You_113"]));