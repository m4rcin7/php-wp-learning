<?php
// connection with db

$host = 'localhost';
$dbname = 'php_wp_learning';
$username = 'root';
$password = '';

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Error db connection: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

function close_connection($conn)
{
    mysqli_close($conn);
}

?>