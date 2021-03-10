<?php

namespace Glauce\Router;

class Router extends BaseRouter
{

    public static $routes;

    public static function get($endpoint, $trigger)
    {
        self::$routes['get'][$endpoint] = $trigger;
    }

    public static function post($endpoint, $trigger)
    {
        self::$routes['post'][$endpoint] = $trigger;
    }

    public static function put($endpoint, $trigger)
    {
        self::$routes['put'][$endpoint] = $trigger;
    }

    public static function delete($endpoint, $trigger)
    {
        self::$routes['delete'][$endpoint] = $trigger;
    }

}