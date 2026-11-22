<?php

namespace App\Models;

use App\Services\Database;
use PDO;

class AuditLog
{
    public static function create(
        int $userId,
        string $action,
        string $entityType,
        int $entityId,
        string $description
    )
    {
        $pdo = Database::connection();

        $stmt = $pdo->prepare(
            "INSERT INTO audit_logs
            (
                user_id,
                action,
                entity_type,
                entity_id,
                description
            )
            VALUES (?, ?, ?, ?, ?)"
        );

        return $stmt->execute([
            $userId,
            $action,
            $entityType,
            $entityId,
            $description
        ]);
    }

    public static function latest(
        int $limit = 20
    )
    {
        $pdo = Database::connection();

        $limit = (int) $limit;

        $stmt = $pdo->query(
            "SELECT *
             FROM audit_logs
             ORDER BY created_at DESC
             LIMIT {$limit}"
        );

        return $stmt->fetchAll(
            PDO::FETCH_ASSOC
        );
    }

    public static function byUnit(
        int $unitId,
        int $limit = 50
    )
    {
        $pdo = Database::connection();

        $stmt = $pdo->prepare(
            "SELECT *
             FROM audit_logs
             WHERE entity_id = ?
             ORDER BY created_at DESC
             LIMIT ?"
        );

        $stmt->bindValue(
            1,
            $unitId,
            PDO::PARAM_INT
        );

        $stmt->bindValue(
            2,
            $limit,
            PDO::PARAM_INT
        );

        $stmt->execute();

        return $stmt->fetchAll(
            PDO::FETCH_ASSOC
        );
    }
}
