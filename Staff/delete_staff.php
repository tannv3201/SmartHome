<?php
    include('connect_database/connect.php');
    if(isset($_GET['id_staff'])){
        $id_staff = $_GET['id_staff'];
    }
    $sql = "Update tb_user SET status = 3 Where id_user = '$id_staff'";
    $res = mysqli_query($conn, $sql);
    if($res == true){
        header("Location:staff.php");
    }
    else{
        header("Location:staff.php");
    }
?>