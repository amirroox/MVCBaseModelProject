<?php
namespace App\Middleware\GlobalMiddle;

use App\Middleware\Base\MiddlewareInterface;
use hisorange\BrowserDetect\Parser as Browser;

class BlockGlobal implements MiddlewareInterface {
    public function handler()
    {
        $this->blockTablet();
    }
    private function blockTablet(){
        /** @noinspection PhpUndefinedMethodInspection  */
        if(Browser::isTablet()) {
            echo "Tablet No Access ";
            die();
        }
    }
}
