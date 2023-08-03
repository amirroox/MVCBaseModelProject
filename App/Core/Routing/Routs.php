<?php
namespace App\Core\Routing;

class Routs{
    private static array $routs = [];
    public static function add($method, $url, $func = null){
        if(is_string($method) && strpos($method,",")) { // For Option => $Router::add("get , put", "/e");
            $method = str_replace(' ', '', $method);
            $method = explode(',', $method);
        }
        $method = is_array($method) ? $method : [$method];
        $method = array_map("strtoupper", $method); // To UpperCase
        self::$routs[] = ["method" => $method ,"url" => $url, "func" => $func ];
    }

    /**
     * Model Static
     **/
    public static function get($url, $func = null){
        self::add('GET', $url, $func);
    }
    public static function post($url, $func = null){
        self::add('POST', $url, $func);
    }
    public static function put($url, $func = null){
        self::add('PUT', $url, $func);
    }
    public static function patch($url, $func = null){
        self::add('PATCH', $url, $func);
    }
    public static function delete($url, $func = null){
        self::add('DELETE', $url, $func);
    }
    public static function options($url, $func = null){
        self::add('OPTIONS', $url, $func);
    }

    /**
     * Model One Non Static
     **/
    public function __call($name, $arguments)
    {
        $arguments[1] = $arguments[1] ?? null;
        if($name == "get" || $name == "GET")
            self::$routs[] = ["method" => "GET" , "url" => $arguments[0], "func" => $arguments[1] ];

        if($name == "post" || $name == "POST")
            self::$routs[] = ["method" => "POST" , "url" => $arguments[0], "func" => $arguments[1] ];

        if($name == "put" || $name == "PUT")
            self::$routs[] = ["method" => "PUT" , "url" => $arguments[0], "func" => $arguments[1] ];

        if($name == "patch" || $name == "PATCH")
            self::$routs[] = ["method" => "PATCH" , "url" => $arguments[0], "func" => $arguments[1] ];

        if($name == "delete" || $name == "DELETE")
            self::$routs[] = ["method" => "DELETE" , "url" => $arguments[0], "func" => $arguments[1] ];

        if($name == "options" || $name == "OPTIONS")
            self::$routs[] = ["method" => "OPTIONS" , "url" => $arguments[0], "func" => $arguments[1] ];
    }

    public static function getRouts(): array
    {
        return self::$routs;
    }
}