<?php

namespace Glauce;

use Glauce\Configuration\ConfigApp;
use Glauce\Configuration\ConfigRouter;
use Glauce\Router\BaseRouter;
use Glauce\Router\Router;
use Glauce\Router\RouterAutomatic;

class App
{

    public static function start()
    {
        if (ConfigRouter::ROUTE === "automatic"){
            RouterAutomatic::run();
        }else{

            self::loadRouteWeb();

            Router::check(Router::$routes);

        }


    }

    private static function loadRouteWeb()
    {
        require ConfigApp::BASEDIR . "/routes/web.php";
    }

    private static function loadRouteApi()
    {
        require ConfigApp::BASEDIR . "/routes/api.php";
    }

}