<?php

namespace Glauce\Router;

use Glauce\Configuration\ConfigRouter;
use Glauce\Request\BaseRequest;

class BaseRouter
{

    public static function check($routes)
    {

        $method   = strtolower(BaseRequest::getMethod());
        $uri      = BaseRequest::getUrl();

        // Define os itens padrão
        $controller = ConfigRouter::CONTROLLER_ERROR;
        $action     = 'index';
        $args       = [];

        if(isset($routes[$method])){

            foreach ($routes[$method] as $route => $callback){

                // Identifica os argumentos e substitui por regex
                $pattern = preg_replace('(\{[a-z0-9]{1,}\})', '([a-z0-9-]{1,})', $route);

                // Faz match da URL
                if(preg_match('#^('.$pattern.')*$#i', $uri, $matches) === 1){
                    array_shift($matches);
                    array_shift($matches);

                    // Pega todos os argumentos para associar
                    $itens = [];
                    if(preg_match_all('(\{[a-z0-9]{1,}\})', $route, $m)){
                        $itens = preg_replace('(\{|\})', '', $m[0]);
                    }

                    // Faz a associação
                    $args = [];
                    foreach ($matches as $key => $match){
                        $args[$itens[$key]] = $match;
                    }

                    // Seta o controller/action
                    $callbackSplit = explode('@', $callback);
                    $controller = $callbackSplit[0];
                    if(isset($callbackSplit[1])){
                        $action = $callbackSplit[1];
                    }

                    break;

                }

            }

        }

        $controller = "\Source\Controllers\\{$controller}";
        $defindedController = new $controller();

        $defindedController->$action($args);
    }

    public static function middleware(array $middlewares)
    {

        if(count($middlewares)){

            foreach ($middlewares as $middleware){

//                $middleware = "\Source\Middlewares\\".$middleware;
//                new $middleware();

            }
        }

    }

}