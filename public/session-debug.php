<?php

session_start();

echo "<h2>Session Debug</h2>";

echo "Session ID: " . session_id();

echo "<h3>SESSION</h3>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

echo "<h3>COOKIE</h3>";
echo "<pre>";
print_r($_COOKIE);
echo "</pre>";
