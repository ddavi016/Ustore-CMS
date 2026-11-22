<?php

namespace App\Controllers;

class AuthController
{
    public function login()
    {
        require '../public/views/login.php';
    }

    public function logout()
    {
        session_destroy();

        header(
            'Location: /login'
        );

        exit;
    }
}
