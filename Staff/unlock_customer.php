<?php
    include('connect_database/connect.php');
    if(isset($_GET['id_customer'])){
        $id_customer = $_GET['id_customer'];
    }
    $sql = "Update tb_user SET status = 2 Where id_user = '$id_customer'";
    $res = mysqli_query($conn, $sql);
    if($res==true){
        header("Location:customer.php");
    }
    else{
        header("Location:customer.php");
    }
?>