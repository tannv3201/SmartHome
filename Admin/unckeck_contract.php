<?php
    include('connect_database/connect.php');
    if(isset($_GET['id_contract'])){
        $id = $_GET['id_contract'];
    }
    if(isset($_SESSION['id_adminSession']))
    {
        $id_admin = $_SESSION['id_adminSession'];
    }
    $sql = "Update tb_contract SET status = 6, id_staff = $id_admin Where id_contract = '$id'";
    $res = mysqli_query($conn, $sql);
    if($res==true){
        header("Location:view_checkContract.php");
    }
    else{
        header("Location:view_checkContract.php");
    }
?>