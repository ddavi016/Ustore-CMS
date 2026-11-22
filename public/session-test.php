<?php

session_start();

echo "<h3>Session ID</h3>";
echo session_id();

echo "<h3>Cookie</h3>";
echo "<pre>";
print_r($_COOKIE);
echo "</pre>";

if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 1;
} else {
    $_SESSION['counter']++;
}

echo "<h3>Counter</h3>";
echo $_SESSION['counter'];
