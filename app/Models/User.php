<?php

namespace App\Models;

use App\Services\Database;
use PDO;

class User
{
    public static function findByUsername(
        $username
    )
    {
        $pdo =
            Database::connection();

        $stmt =
            $pdo->prepare(
                "SELECT *
                 FROM users
                 WHERE username=?"
            );

        $stmt->execute([$username]);

        return $stmt->fetch(
            PDO::FETCH_ASSOC
        );
    }
}
