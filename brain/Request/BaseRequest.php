<?php

namespace Glauce\Request;

class BaseRequest
{

    public static function getMethod()
    {
        if((isset($_REQUEST['_method']) && !empty($_REQUEST['_method'])) && $_SERVER['REQUEST_METHOD'] === 'POST'){
            $method = strtolower($_REQUEST['_method']);
            unset($_REQUEST['_method']);
            unset($_POST['_method']);

            return $method;
        }

        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public static function getUrl()
    {
        return $_SERVER['REQUEST_URI'];
    }
}