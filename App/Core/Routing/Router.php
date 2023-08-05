<?php
namespace App\Core\Routing;

use App\Core\Request;
use App\Middleware\GlobalMiddle\BlockGlobal;
use Exception;

class Router{
    private array $allRotes;    // All Rotes In Project
    private Request $request;   // Request Users
    private $current_uri;       // Current URI For User
    const HOME_CONTROLLER = "App\Controller\\" ;

    public function __construct()
    {
        $this->request = new Request();
        $this->allRotes = Routs::getRouts();
        $this->current_uri = $this->findRoute($this->request) ?? null ;
        # MiddleWare Handler
        $this->global_middleware();
        $this->middleware_current_uri($this->current_uri['middleware'] ?? []);
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

    /**
     * @throws Exception
     */
    public function run()
    {
        # Check Valid Methods (GET | POST | ...) => Error 405 Method Not Allowed
        if($this->invalidRequest($this->request)){
            view('errors.405');
            die();
        }

        # Check Valid Address => Error 404 Not Found
        if(is_null($this->current_uri)){
            view('errors.404');
            die();
        }

        # Check DisPatch
        $this->disPatch($this->current_uri);

    }
    private function invalidRequest(Request $request): bool # Check Method Allowed
    {
        foreach ($this->allRotes as $route)
        {
            if($route["url"] == $request->getUri()) {
                if(!in_array($request->getMethod(), $route["method"])) return true;
            }
        }
        return false;
    }

    /**
     * @throws Exception
     */
    private function disPatch($patch) # 'HomeController@index' OR ['HomeController', 'index']
    {
//        var_dump($patch);
        $action = $patch["func"]; # Action Patch
        if (empty($action)) return; # Empty Return

        if (is_string($action)){ # => 'HomeController@index'
            $action = explode('@', $action);
        }

        if (is_array($action)){ # => ['HomeController', 'index']
            $class_name = self::HOME_CONTROLLER . $action[0];
            $method = $action[1];
            if(!class_exists($class_name)){
                throw new Exception("(** Class : $class_name Not Existed **)");
            }
            if(!method_exists($class_name, $method)){
                throw new Exception("(** Method : $method in Class : $class_name Not Existed **)");
            }
            $controller = new $class_name();
            $controller->{$method}();
        }

        if(is_callable($action)){ # => Closure Function
            $action();
        }
    }
    private function middleware_current_uri($middlewares){
        foreach ($middlewares as $middleware){
            $middleware_obj = new $middleware;
            $middleware_obj->handler();
        }
    }

    private function global_middleware(){
        $glob = new BlockGlobal();
        $glob->handler();
    }
}
