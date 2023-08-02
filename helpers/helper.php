<?php

function site_url($path): string
{
    return $_ENV['HOST'] . $path;
}
