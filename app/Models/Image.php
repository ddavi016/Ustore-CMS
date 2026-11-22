<?php

namespace App\Models;

use App\Services\Database;
use PDO;

class Image
{
    public static function byUnit(
        int $unitId
    )
    {
        $pdo = Database::connection();

        $stmt = $pdo->prepare(
            "SELECT *
             FROM unit_images
             WHERE unit_id = ?
             ORDER BY uploaded_at DESC"
        );

        $stmt->execute([$unitId]);

        return $stmt->fetchAll(
            PDO::FETCH_ASSOC
        );
    }

    public static function create(
        int $unitId,
        string $imageName,
        string $originalFilename,
        string $storedFilename
    )
    {
        $pdo = Database::connection();

        $stmt = $pdo->prepare(
            "INSERT INTO unit_images
            (
                unit_id,
                image_name,
                original_filename,
                stored_filename
            )
            VALUES (?, ?, ?, ?)"
        );

        return $stmt->execute([
            $unitId,
            $imageName,
            $originalFilename,
            $storedFilename
        ]);
    }

    public static function find(
        int $id
    )
    {
        $pdo = Database::connection();

        $stmt = $pdo->prepare(
            "SELECT *
             FROM unit_images
             WHERE id = ?"
        );

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function delete(
        int $id
    )
    {
        $pdo = Database::connection();

        $stmt = $pdo->prepare(
            "DELETE
             FROM unit_images
             WHERE id = ?"
        );

        return $stmt->execute([$id]);
    }
}
