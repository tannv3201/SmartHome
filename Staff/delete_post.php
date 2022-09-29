<?php
    include('connect_database/connect.php');
    if(isset($_GET['id_post'])){
        $id = $_GET['id_post'];
    }
    $sql = "Update tb_post SET status = 3 Where id_post = '$id'";
    $res = mysqli_query($conn, $sql);
    if($res==true){
        // Nếu dúng thì xóa 
        header("Location:post.php");
    }
    else{
        // Không xóa được thì chịu
        header("Location:post.php");
    }
?>