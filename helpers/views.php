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

function method(string $tipoDeMetodo){
    echo "<input type='hidden' name='_method' value='{$tipoDeMetodo}'>";
}

function assetsAdmin($file, $type = 'php'){
    return \Glauce\Configuration\ConfigApp::BASEDIR . "views/admin/assets/".$file.".".$type;
}