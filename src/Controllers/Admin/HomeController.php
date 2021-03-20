<?php

namespace Source\Controllers\Admin;

use Source\Middlewares\AuthMiddleware;

class HomeController
{

    public function __construct()
    {
        AuthMiddleware::authorized();
    }

    public function index()
    {
        return view('admin.dashboard');
    }

}