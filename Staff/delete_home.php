<?php
    include('connect_database/connect.php');
    if(isset($_GET['id_home'])){
        $id = $_GET['id_home'];
    }
    $sql = "Update tb_home SET status = 4 Where id_home = '$id'";
    $res = mysqli_query($conn, $sql);
    if($res==true){
        // Nếu dúng thì xóa 
        header("Location:home.php");
    }
    else{
        // Không xóa được thì chịu
        header("Location:home.php");
    }
?>