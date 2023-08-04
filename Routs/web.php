<?php

use App\Core\Routing\Routs;

$Router = new Routs();

$Router::get("/null");
$Router::get("/", 'HomeController@index');
$Router::get("/todo/list", 'TodoController@list');
