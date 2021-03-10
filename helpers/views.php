<?php

function layout(string $name){
    return \Glauce\View\View::layout($name);
}

function view($view, $data = []){
    return \Glauce\View\View::view($view, $data);
}

function includeContent($view, $data){
    return \Glauce\View\View::loadViewInTemplate($view, $data);
}