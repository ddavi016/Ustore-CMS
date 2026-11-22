<?php

use App\Models\Document;

$unitId =
    (int) ($_POST['unit_id'] ?? 0);

if (
    isset($_FILES['document']) &&
    $_FILES['document']['error'] === 0
)
{
$maxSize = 10 * 1024 * 1024;

if (
    $_FILES['document']['size'] >
    $maxSize
)
{
    die('File exceeds 10MB limit.');
}

    $originalFile =
        $_FILES['document']['name'];

    $extension =
        strtolower(
            pathinfo(
                $originalFile,
                PATHINFO_EXTENSION
            )
        );
$mimeType =
    mime_content_type(
        $_FILES['document']['tmp_name']
    );

$allowedMimeTypes = [

    'application/pdf',

    'application/msword',

    'application/vnd.openxmlformats-officedocument.wordprocessingml.document'

];

if (
    !in_array(
        $mimeType,
        $allowedMimeTypes
    )
)
{
    die('Invalid file type.');
}

    $allowed = [
        'pdf',
        'doc',
        'docx'
    ];

    if (
        in_array(
            $extension,
            $allowed
        )
    )
    {
        $storedFilename =
            bin2hex(
                random_bytes(16)
            ) .
            '.' .
            $extension;

        move_uploaded_file(
            $_FILES['document']['tmp_name'],
            __DIR__ .
            '/../uploads/documents/' .
            $storedFilename
        );

        Document::create(
            $unitId,
            $_POST['document_name'],
            $originalFile,
            $storedFilename
        );
    }
}

header(
    'Location: /unit/edit?id=' .
    $unitId .
    '&upload=1'
);

exit;
