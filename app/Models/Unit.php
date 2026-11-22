<?php

namespace App\Models;

use App\Services\Database;
use PDO;

class Unit
{
    public static function all()
    {
        $pdo = Database::connection();

        $stmt = $pdo->query(
            "SELECT *
             FROM units
             ORDER BY unit_code"
        );

        return $stmt->fetchAll(
            PDO::FETCH_ASSOC
        );
    }


public static function countAll()
{
    $pdo = Database::connection();

    return $pdo
        ->query(
            "SELECT COUNT(*) FROM units"
        )
        ->fetchColumn();
}

public static function countOccupied()
{
    $pdo = Database::connection();

    return $pdo
        ->query(
            "SELECT COUNT(*)
             FROM units
             WHERE occupancy_status='Occupied'"
        )
        ->fetchColumn();
}

public static function countVacant()
{
    $pdo = Database::connection();

    return $pdo
        ->query(
            "SELECT COUNT(*)
             FROM units
             WHERE occupancy_status='Vacant'"
        )
        ->fetchColumn();
}

public static function countOverdue()
{
    $pdo = Database::connection();

    return $pdo
        ->query(
            "SELECT COUNT(*)
             FROM units
             WHERE arrears_status='Overdue'"
        )
        ->fetchColumn();
}

    public static function find(int $id)
    {
        $pdo = Database::connection();

        $stmt = $pdo->prepare(
            "SELECT *
             FROM units
             WHERE id = ?"
        );

        $stmt->execute([$id]);

        return $stmt->fetch(
            PDO::FETCH_ASSOC
        );
    }

    public static function update(
        int $id,
        array $data
    )
    {
        $pdo = Database::connection();

        $stmt = $pdo->prepare(
            "UPDATE units
             SET occupancy_status = ?,
                 occupier_name = ?,
                 occupier_address = ?,
                 arrears_status = ?,
                 notes = ?
             WHERE id = ?"
        );

        return $stmt->execute([
            $data['occupancy_status'],
            $data['occupier_name'],
            $data['occupier_address'],
            $data['arrears_status'],
            $data['notes'],
            $id
        ]);
    }
}
