<?php
    include('connect_database/connect.php');
    if(isset($_GET['id_user'])){
        $id = $_GET['id_user'];
    }
    $sql = "Update tb_user SET status = 3 Where id_user = '$id'";
    $res = mysqli_query($conn, $sql);
    if($res==true){
        // Nếu dúng thì xóa 
        header("Location:account.php");
    }
    else{
        // Không xóa được thì chịu
        header("Location:account.php");
    }
?>