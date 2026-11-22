<?php

use App\Models\Image;

$unitId =
    (int)($_POST['unit_id'] ?? 0);

if (
    isset($_FILES['image']) &&
    $_FILES['image']['error'] === 0
)
{
    $maxSize = 10 * 1024 * 1024;

    if (
        $_FILES['image']['size']
        > $maxSize
    ) {
        die('Image too large.');
    }

    $allowedExtensions = [
        'jpg',
        'jpeg',
        'png',
        'webp'
    ];

    $allowedMimeTypes = [
        'image/jpeg',
        'image/png',
        'image/webp'
    ];

    $originalFile =
        $_FILES['image']['name'];

    $extension =
        strtolower(
            pathinfo(
                $originalFile,
                PATHINFO_EXTENSION
            )
        );

    $mimeType =
        mime_content_type(
            $_FILES['image']['tmp_name']
        );

    if (
        !in_array(
            $extension,
            $allowedExtensions
        )
    ) {
        die('Invalid image type.');
    }

    if (
        !in_array(
            $mimeType,
            $allowedMimeTypes
        )
    ) {
        die('Invalid image MIME type.');
    }

    $storedFilename =
        bin2hex(
            random_bytes(16)
        ) .
        '.' .
        $extension;

    move_uploaded_file(
        $_FILES['image']['tmp_name'],
        __DIR__ .
        '/../uploads/images/' .
        $storedFilename
    );

    Image::create(
        $unitId,
        $_POST['image_name'],
        $originalFile,
        $storedFilename
    );
}

header(
    'Location: /unit/edit?id=' .
    $unitId .
    '&image=1'
);

exit;
