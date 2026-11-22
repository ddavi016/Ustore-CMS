<?php

namespace App\Services;

use PDO;

class Database
{
    private static ?PDO $pdo = null;

    public static function connection()
    {
        if (!self::$pdo) {

            self::$pdo = new PDO(
                "mysql:host=".$_ENV['DB_HOST'].
                ";dbname=".$_ENV['DB_NAME'],
                $_ENV['DB_USER'],
                $_ENV['DB_PASS']
            );

            self::$pdo->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
        }

        return self::$pdo;
    }
}
