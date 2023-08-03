<?php
namespace App\Core\Routing;

use App\Core\Request;

class Router{
    private array $allRotes; // All Rotes In Project
    private Request $request; // Request Users
    private $current_uri; // Current URI For User

    public function __construct()
    {
        $this->request = new Request();
        $this->allRotes = Routs::getRouts();
        $this->current_uri = $this->findRoute($this->request) ?? null ;
    }

    private function findRoute(Request $request)
    {
        foreach ($this->allRotes as $route)
        {
            # Excited Route
            if(in_array($request->getMethod(), $route["method"]) && $request->getUri() == $route['url']){
                return $route;
            }
        }
        # Route Not Excited
        return null;
    }
    public function run()
    {
        # Check Valid Methods (GET | POST | ...) => Error 405 Method Not Allowed
        if(is_null($this->current_uri) and !in_array($this->request->getMethod(), $this->current_uri)){
            view('errors.405');
            die();
        }

        # Check Valid Address => Error 404 Not Found
        if(is_null($this->current_uri)){
            view('errors.404');
            die();
        }
    }
}
