<?php

namespace Glauce\Database;

use Glauce\Configuration\ConfigBatabase;
use \PDO;

class Connection
{

    private static $instance = null;

    public static function getInstance()
    {
        if(is_null(self::$instance)){
            self::$instance = new PDO(
                ConfigBatabase::DBDRIVER . ":dbname=" . ConfigBatabase::DBNAME . ";host=" . ConfigBatabase::DBHOST . ";port=" . ConfigBatabase::DBPORT,
                ConfigBatabase::DBUSER,
                ConfigBatabase::DBPASS,
                ConfigBatabase::DBOPTIONS
            );

            return self::$instance;
        }
    }

}