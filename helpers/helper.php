<?php

function site_url($path): string
{
    return $_ENV['HOST'] . $path;
}
function view($path, $data = []) # errors.404
{
    extract($data);
    $path = str_replace('.', '/', $path);
    $file = BASEPATH . "views/$path.php";
    if(file_exists($file)){
        include_once $file;
    }
    else {
        view("errors.404");
    }

}


function generateRandomString($length = 10): string
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}
