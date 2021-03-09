<?php

namespace controllers;

use Core\Controller;

class HomeController extends Controller
{

    public function index()
    {
        $this->loadTemplate("home");
    }

}