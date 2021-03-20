<?php

namespace Source\Controllers;

use Glauce\Authenticator\Authenticator;
use Glauce\Session\Session;
use Source\Models\User;

class HomeController
{

    public function __construct()
    {

    }

    public function index()
    {
        view('home');
    }

    public function about()
    {
        view('about');
    }

    public function works()
    {
        view('works');
    }

    public function contact()
    {
        view('contact');
    }

}