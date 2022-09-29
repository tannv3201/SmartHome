<?php
include('config/config.php');
?>
    <?php
    if (isset($_POST['action'])) {
        $id_home = $_POST['id_home'];
        $id_customer = $_POST['id_customer'];
        // $content = $_POST['content'];
        // $status = $_POST['status'];       
        $sql1 = "INSERT INTO `tb_contract`(`id_contract`, `id_home`, `id_customer`, `id_staff`, `status`) 
        VALUES (null, '$id_home', $id_customer, null, 2)";
        $res1 = mysqli_query($conn, $sql1);
        $sql2 = "UPDATE `tb_home` SET `status`='2' WHERE id_home = '$id_home'";
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
    }
        ?>    
    
