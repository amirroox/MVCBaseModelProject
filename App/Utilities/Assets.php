<?php

namespace App\Utilities;

class Assets {
    public static function loadAssets(string $fileName): string
    {
        // style.css , jojo/style.css
        if(strpos($fileName, "/")) // Find it!
        {
            return $_ENV["HOST"] . "assets/$fileName";
        }
        $format = explode('.', $fileName);
        $format = end($format);
        if($format == "css") return $_ENV["HOST"] . "assets/css/$fileName";
        if($format == "js") return $_ENV["HOST"] . "assets/css/$fileName";
        return "$fileName Not Found";
    }
}
