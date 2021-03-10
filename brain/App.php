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

            require ConfigApp::BASEDIR . "/routes/web.php";

            Router::check(Router::$routes);

        }


    }

}