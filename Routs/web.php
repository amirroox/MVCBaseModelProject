<?php

use App\Core\Routing\Routs;
use App\Middleware\BlockIE;

$Router = new Routs();

$Router::get("/null");
$Router::get("/", 'HomeController@index');
$Router::get("/todo/list", 'TodoController@list');
$Router::get("/todo", 'TodoController@list',[BlockIE::class]);
