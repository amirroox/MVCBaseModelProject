<?php

function site_url($path): string
{
    return $_ENV['HOST'] . $path;
}
function view($path, $data = []) # errors.404
{
    extract($data);
    $path = str_replace('.', '/', $path);
    include_once BASEPATH . "views/$path.php";
}
