<?php

namespace Glauce\Router;

class Router extends BaseRouter
{

    public static $routes;

    public static function get($endpoint, $trigger, $middlewares = [])
    {
        self::middleware($middlewares);
        self::$routes['get'][$endpoint] = $trigger;
    }

    public static function post($endpoint, $trigger, $middlewares = [])
    {
        self::middleware($middlewares);
        self::$routes['post'][$endpoint] = $trigger;
    }

    public static function put($endpoint, $trigger, $middlewares = [])
    {
        self::middleware($middlewares);
        self::$routes['put'][$endpoint] = $trigger;
    }

    public static function delete($endpoint, $trigger, $middlewares = [])
    {
        self::middleware($middlewares);
        self::$routes['delete'][$endpoint] = $trigger;
    }

}