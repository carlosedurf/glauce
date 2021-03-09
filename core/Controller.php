<?php

namespace Core;

class Controller
{

    protected $db;

    public function __construct()
    {
        global $conn;
        $this->db = $conn;
    }

    public function loadView($viewName, $viewData = [])
    {
        extract($viewData);
        include(BASE_DIR."/views/{$viewName}.php");
    }

    public function loadTemplate($viewName, $viewData = [])
    {
        include(BASE_DIR."/views/template/template.php");
    }

    public function loadViewInTemplate($viewName, $viewData = [])
    {
        extract($viewData);
        include(BASE_DIR."/views/{$viewName}.php");
    }

}