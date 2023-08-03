<?php

function site_url($path): string
{
    return $_ENV['HOST'] . $path;
}
function view($path) # errors.404
{
    $path = str_replace('.', '/', $path);
    include_once BASEPATH . "views/$path.php";
}
