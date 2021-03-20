<?php

namespace Source\Middlewares;

use Glauce\Authenticator\Authenticator;

class AuthMiddleware
{

    public function __construct()
    {
        self::authorized();
    }

    public static function authorized()
    {
        $isLogged = Authenticator::isAuth();

        if(!$isLogged)
            redirect('login');

    }

}