<?php
DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', '');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 's3112251'); 

$db_connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$db_connection) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($db_connection, 'utf8'); 
?>