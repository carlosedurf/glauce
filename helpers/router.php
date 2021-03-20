<?php

function routeUrl(string $route, $params = false){
    return \Glauce\Configuration\ConfigApp::HOME_URI . "/" . \Glauce\Directory\Dir::fixPath($route) . ( (!$params) ? "" : "/$params" );
}

function redirect(string $route, $params = false){
    $url = routeUrl($route, $params);
    header("Location: " . $url);
}