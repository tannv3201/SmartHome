<?php
    include('connect_database/connect.php');
    session_destroy(); //Unsets $_SESSION['user']

    //2. REdirect to Login Page
    header("Location:../SignInUp/login.php");
?>