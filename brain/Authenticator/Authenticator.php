<?php

namespace Glauce\Authenticator;

use Glauce\Session\Session;

class Authenticator
{

    public static function addLogged($user)
    {
        Session::add('user_auth', $user);
    }

    public static function getAuth()
    {
        return Session::get('user_auth');
    }

    public static function isAuth(): bool
    {
        return (!self::getAuth()) ? false : true;
    }
    
}