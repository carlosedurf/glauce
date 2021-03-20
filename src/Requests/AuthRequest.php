<?php

namespace Source\Requests;

use Glauce\Request\Request;

class AuthRequest extends Request
{

    public function filter()
    {
        return [
            "name"              => ["required"],
            "email"             => ["required"],
            "password"          => ["required"],
            "password_confirm"  => ["required"]
        ];
    }

}