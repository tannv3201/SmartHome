<?php
    include('connect_database/connect.php');
    if(isset($_GET['id_typeHome'])){
        $id = $_GET['id_typeHome'];
    }
    $sql = "Update tb_typeHome SET status = 2 Where id_typeHome = '$id'";
    $res = mysqli_query($conn, $sql);
    if($res==true){
        // Nếu dúng thì xóa 
        header("Location:typeHome.php");
    }
    else{
        // Không xóa được thì chịu
        header("Location:typeHome.php");
    }
?>