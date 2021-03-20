<?php

function authUser(){
    return \Glauce\Authenticator\Authenticator::getAuth();
}

function auth(){
    return \Glauce\Authenticator\Authenticator::isAuth();
}

