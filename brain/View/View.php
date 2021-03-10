<?php

namespace Glauce\View;

use Glauce\Configuration\ConfigApp;
use Glauce\Directory\Dir;

class View
{
    protected static $template = null;
    protected static array $data;

    public static function view($view, $data = [])
    {
        $view = Dir::fixPath($view);
        ob_start();
        extract($data);
        require ConfigApp::BASEDIR . "/views/{$view}.php";

        $html = ob_get_contents();
        ob_end_clean();

        if(!is_null(self::$template)){
            unset($html);
            return self::template($view, $data);
        }

        print $html;
    }

    public static function template($view, $data = [])
    {

        self::$template = Dir::fixPath(self::$template);

        ob_start();

        extract($data);
        require ConfigApp::BASEDIR . "/views/" . Dir::fixPath(self::$template) . ".php";

        $html = ob_get_contents();
        ob_end_clean();

        print $html;
    }

    public static function loadViewInTemplate($view, $data = [])
    {
        $view = Dir::fixPath($view);
        extract($data);
        include(ConfigApp::BASEDIR . "/views/{$view}.php");
    }

    public static function layout(string $name)
    {
        self::$template = $name;
    }

}