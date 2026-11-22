<?php

use App\Models\Document;

$documentId =
    (int) ($_GET['id'] ?? 0);

$document =
    Document::find(
        $documentId
    );

if ($document) {

    $file =
        __DIR__ .
        '/../uploads/documents/' .
        $document['stored_filename'];

    if (file_exists($file)) {

        unlink($file);

    }

    Document::delete(
        $documentId
    );

    header(
        'Location: /unit/edit?id=' .
        $document['unit_id'] .
        '&deleted=1'
    );

    exit;
}
