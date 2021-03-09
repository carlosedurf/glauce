<?php

define("HOME", "http://localhost:8000");
define("BASE_DIR", __DIR__);

define("DATABASE", [
    "host"      =>  "localhost",
    "dbname"    =>  "glauce",
    "dbuser"    =>  "root",
    "dbpass"    =>  ""
]);

global $conn;
$conn = new PDO("mysql:dbname=".DATABASE['dbname'].";host=".DATABASE['host'], DATABASE['dbuser'], DATABASE['dbpass']);