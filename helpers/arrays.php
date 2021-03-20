<?php

function vd($array){
    var_dump($array);
}

function vdd($array){
    vd($array);
    die;
}

function pA($array){
    echo "<pre>";
        echo "<code>";
            print_r($array);
        echo "<code>";
    echo "</pre>";
}

function pAd($array){
    pA($array);
    die;
}