<?php

use App\Core\Routing\Routs;

$Router = new Routs();

$Router::add(["get", "post"], "/c");
$Router::add(["post", "put"], "/d");
$Router::add("get , put", "/e" , function (){
    echo "bb";
});
$Router::get("/a");
$Router::get("/null");
$Router::delete("/b" , function (){
    echo "vv";
});