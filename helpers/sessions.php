<?php

function flashMessage(string $msg, string $type = 'success', string $key = 'message'){
    \Glauce\Session\Flash::add($key, $msg);
    \Glauce\Session\Flash::add('type_msg', $type);
}

function message(string $key = 'message'){
    return \Glauce\Session\Flash::get($key);
}

function hasSession($key = 'message'){
    return is_null(\Glauce\Session\Session::get($key)) ? false : true;
}

