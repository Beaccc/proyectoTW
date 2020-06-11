<?php

    DEFINE('DB_USERNAME', 'beatrizcorrea1920');
    DEFINE('DB_PASSWORD', 'h7vckii0');
    DEFINE('DB_HOST', 'localhost:8889');
    DEFINE('DB_DATABASE', 'beatrizcorrea1920');

    $conexion = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

    if (mysqli_connect_error()) {
        die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
    }

?>
