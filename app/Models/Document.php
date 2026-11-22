<?php

namespace App\Models;

use App\Services\Database;
use PDO;

class Document
{

public static function latestForUnit(
    int $unitId
)
{
    $pdo = Database::connection();

    $stmt = $pdo->prepare(
        "SELECT *
         FROM audit_logs
         WHERE entity_id = ?
         ORDER BY created_at DESC
         LIMIT 1"
    );

    $stmt->execute([$unitId]);

    return $stmt->fetch(
        PDO::FETCH_ASSOC
    );
}


 public static function byUnit(int $unitId)
    {
        $pdo = Database::connection();

        $stmt = $pdo->prepare(
            "SELECT *
             FROM unit_documents
             WHERE unit_id = ?
             ORDER BY uploaded_at DESC"
        );

        $stmt->execute([$unitId]);

        return $stmt->fetchAll(
            PDO::FETCH_ASSOC
        );
    }

public static function find(
    int $id
)
{
    $pdo = Database::connection();

    $stmt = $pdo->prepare(
        "SELECT *
         FROM unit_documents
         WHERE id = ?"
    );

    $stmt->execute([$id]);

    return $stmt->fetch(
        PDO::FETCH_ASSOC
    );
}

public static function delete(
    int $id
)
{
    $pdo = Database::connection();

    $stmt = $pdo->prepare(
        "DELETE
         FROM unit_documents
         WHERE id = ?"
    );

    return $stmt->execute([$id]);
}

    public static function create(
        int $unitId,
        string $documentName,
        string $originalFilename,
        string $storedFilename
    )
    {
        $pdo = Database::connection();

        $stmt = $pdo->prepare(
            "INSERT INTO unit_documents
            (
                unit_id,
                document_name,
                original_filename,
                stored_filename
            )
            VALUES (?, ?, ?, ?)"
        );

        return $stmt->execute([
            $unitId,
            $documentName,
            $originalFilename,
            $storedFilename
        ]);
    }
public static function countAll()
{
    $pdo = Database::connection();

    return $pdo
        ->query(
            "SELECT COUNT(*) FROM documents"
        )
       ->fetchColumn();
}
}
