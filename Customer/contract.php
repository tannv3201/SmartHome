<?php
session_start();
include('config/config.php');
$iduser = $_SESSION['id_customerSession'];
// include('connect_database/connect.php');
?>
    <?php
       $id_home = $_POST['id_home'];
       $id_customer = $_POST['id_customer'];
        // check nha da co trong dtb 
      //  $id_customer = $iduser;
        
        $sqlcheck = "SELECT * FROM `tb_contract` WHERE id_customer = '$id_customer'";
        $rescheck = mysqli_query($conn, $sqlcheck);
        $rowcheck = mysqli_fetch_assoc($rescheck);
        $id_home_db = $rowcheck['id_home'];
        echo $id_home;
        echo $id_home_db;
    if($id_home == $id_home_db ){ ?>
      <script>
        Swal('Căn nhà đã đặt cọc trước đó')
      </script>
      <?php 
    }else {
        if (isset($_POST['action'])) {
         
            // $content = $_POST['content'];
            // $status = $_POST['status'];       
            $sql1 = "INSERT INTO `tb_contract`(`id_contract`, `id_home`, `id_customer`, `id_staff`, `status`) 
            VALUES (null, '$id_home', $id_customer, null, 2)";
            $res1 = mysqli_query($conn, $sql1);
            $sql2 = "UPDATE `tb_home` SET `status`='1' WHERE id_home = '$id_home'";
            $res2 = mysqli_query($conn, $sql2);
                   
                if ($res1 == true && $res2 == true) {
                    $_SESSION['status'] = "Gửi yêu cầu đặt cọc thành công";
                    $_SESSION['status_code'] = "success";
            ?>
                <?php
                    // header('Location:http://localhost/Archiiro/Customer/index_home.php');
                } else {
                    $_SESSION['status'] = "Gửi yêu cầu đặt cọc thất bại";
                    $_SESSION['status_code'] = "error";
                }
                $check = "success";
                return $check;
            
        }
    }
     
    
    
        ?>    
    
