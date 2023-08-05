<?php
namespace App\Middleware;

use App\Middleware\Base\MiddlewareInterface;
use hisorange\BrowserDetect\Parser as Browser;

class BlockIE implements MiddlewareInterface {
    public function handler()
    {
        /** @noinspection PhpUndefinedMethodInspection  */
        if(Browser::isIE()) {
            echo "Exit From IE";
            view("errors.404");
            die();
        }
    }
}
