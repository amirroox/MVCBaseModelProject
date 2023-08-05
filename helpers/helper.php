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
