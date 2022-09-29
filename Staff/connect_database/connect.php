<?php
    session_start();
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'db_archiiro');

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if($conn)
    {
        mysqli_query($conn, "SET NAMES 'UTF8'");
    }
    else
    {
        echo "Kết nối thất bại";
    }
?>