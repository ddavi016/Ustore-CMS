
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ .
    '/../bootstrap/app.php';

use App\Models\User;
use App\Middleware\AuthMiddleware;

$uri = parse_url(
    $_SERVER['REQUEST_URI'],
    PHP_URL_PATH
);

if ($uri === '/') {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $user = User::findByUsername(
            $_POST['username']
        );

        if (
            $user &&
            password_verify(
                $_POST['password'],
                $user['password_hash']
            )
        ) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['username'] = $user['username'];

            session_write_close();

	header('Location: https://ustore-cms.timevortex.nz/dashboard');

            exit;
        }

    }

    require __DIR__ . '/views/login.php';
    exit;
}

if ($uri === '/dashboard') {

    AuthMiddleware::check();

    require __DIR__ . '/views/dashboard.php';

    exit;
}

if ($uri === '/units') {

    AuthMiddleware::check();

    require __DIR__ .
        '/views/units.php';

    exit;
}

if ($uri === '/unit/edit') {

    AuthMiddleware::check();

    require __DIR__ .
        '/views/unit-edit.php';

    exit;
}

if ($uri === '/document/upload') {

    AuthMiddleware::check();

    require __DIR__ .
        '/actions/document-upload.php';

    exit;
}

if ($uri === '/document/delete') {

    AuthMiddleware::check();

    require __DIR__ .
        '/actions/document-delete.php';

    exit;
}

if ($uri === '/image/upload') {

    AuthMiddleware::check();

    require __DIR__ .
        '/actions/image-upload.php';

    exit;
}

if ($uri === '/logout') {

	session_unset();

    	session_destroy();

    	header('Location: /');
    exit;
}

http_response_code(404);

echo 'Page Not Found';
