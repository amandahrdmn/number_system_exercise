<?php


namespace App\Utilities;


class DBConnectionUtility
{
    static public function getConnection()
    {
        return new \PDO('mysql:host=127.0.0.1;dbname=number_system_user_db', 'root', 'password');
    }
}