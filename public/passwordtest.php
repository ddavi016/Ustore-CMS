<?php

$hash = 'PASTE_YOUR_HASH_HERE';

var_dump(
    password_verify(
        'Admin123!',
        $hash
    )
);
