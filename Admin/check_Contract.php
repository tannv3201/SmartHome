<?php
    include('connect_database/connect.php');
    if(isset($_GET['id_contract'])){
        $id_contract = $_GET['id_contract'];
    }
    if(isset($_SESSION['id_adminSession']))
    {
        $id_admin = $_SESSION['id_adminSession'];
    }

    $sql = "Select * from tb_contract where id_contract = $id_contract";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    if($count == 1){
        $row = mysqli_fetch_assoc($res);
        $status = $row['status'];
        $id_home = $row['id_home'];
    }

    if($status == 2){
        $sql1 = "Update tb_contract SET status = 1, id_staff = $id_admin Where id_contract = '$id_contract'";
        $res1 = mysqli_query($conn, $sql1);

        $sql2 = "Update tb_home SET status = 1 Where id_home = '$id_home'";
        $res2 = mysqli_query($conn, $sql2);
        
        if($res1 == true && $res2 == true){
            header("Location:contract.php");
        }
        else{
            header("Location:view_checkContract.php");
        }
    }

    if($status == 5){
        $sql3 = "Update tb_contract SET status = 6, id_staff = $id_admin Where id_contract = '$id_contract'";
        $res3 = mysqli_query($conn, $sql3);

        $sql4 = "Update tb_home SET status = 1 Where id_home = '$id_home'";
        $res4 = mysqli_query($conn, $sql4);
        
        if($res3 ==true && $res4 == true){
            header("Location:view_checkContract.php");
        }
        else{
            header("Location:view_checkContract.php");
        }
    }












?>