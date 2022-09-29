<?php session_start() ?>
<?php 
      include('config/config.php');
?>
<?php     
$idcontract = $_GET['id_contract'];                                    
 if(isset($_GET['id_contract'])){
     $sql_cancel = "UPDATE `tb_contract` SET `status`= 6 WHERE id_contract = '$idcontract'";
     $res_cancel = mysqli_query($conn, $sql_cancel);    
     $sql2 = "UPDATE `tb_home` SET `status`='1' WHERE id_home = '$idhome'";
     $res2 = mysqli_query($conn, $sql2); 
     if ($res_cancel == true) {
        header('location: history_contract.php');
        
    } else {
        header('location: history_contract.php');      
    }                                         
 }

 
?>