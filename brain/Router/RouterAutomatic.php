<?php

namespace Glauce\Router;

class RouterAutomatic
{

    public static function run()
    {

        $url = $_SERVER['REQUEST_URI'];
        if($url !== "/"){

            $url = explode("/", $url);
            array_shift($url);

            if(!empty($url[0])){
                $currentController = $url[0]."Controller";
                array_shift($url);
            }else{
                $currentController = "homeController";
            }

            if(!empty($url[0])){
                $currentAction  = $url[0];
                array_shift($url);
            }else{
                $currentAction = "index";
            }

            if (count($url)){
                $params = $url;
            }else{
                $params = array();
            }

        }else{
            $currentController  =   "homeController";
            $currentAction      =   "index";
            $params             =   array();
        }

        $currentController = ucfirst($currentController);
        $prefix = "\Source\Controllers\\";

        if(!file_exists("src/Controllers/{$currentController}.php") || !method_exists($prefix.$currentController, $currentAction)){
            $currentController  = "NotfoundController";
            $currentAction      = "index";
        }

        $newController = $prefix.$currentController;
        $c = new $newController();

        call_user_func_array([$c, $currentAction], $params);

    }

}