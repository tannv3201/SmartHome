<?php 
   include('header.php');
?>
<head>
    <title>Trang chủ</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

</head>
<style>
    .form-group{
       margin-left:30%;
    }
</style>
<div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Update Information personl -->
        <form method="POST" enctype="multipart/form-data">
        <div class="main-content">

        <div class="container">

            <div class="view-account">
                <section class="module">
                    <div class="module-inner">
                        <div class="side-bar">
                        </div>

                        <div class="content-panel">
                                    <h3 class="fieldset-title">Thông tin cá nhân</h3>
                                    <div class="form-group">
                                        <label class="col-md-2 col-sm-3 col-xs-12 control-label">Số ID</label>
                                        <div class="col-md-6 col-sm-9 col-xs-12">
                                            <input name="cardNumber" type="text" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 col-sm-3 col-xs-12 control-label">Ngày cấp</label>
                                        <div class="col-md-6 col-sm-9 col-xs-12">
                                            <input name="dateRange" type="date" class="form-control" >
                                        </div>
                                    </div>
                                        
                                    <div class="form-group">
                                        <label class="col-md-2  col-sm-3 col-xs-12 control-label">Nơi cấp</label>
                                        <div class="col-md-6 col-sm-9 col-xs-12">
                                            <input name="isuseBy" type="text" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2  col-sm-3 col-xs-12 control-label">Ảnh mặt trước</label>
                                        <div class="col-md-6 col-sm-9 col-xs-12">
                                            <input name="imageFront" type="file" class="form-control" >
                                        </div>
                                        <label class="col-md-2  col-sm-3 col-xs-12 control-label">Ảnh mặt sau</label>
                                        <div class="col-md-6 col-sm-9 col-xs-12">
                                            <input name="imageBack" type="file" class="form-control" >
                                        </div>
                                    </div>

                                <hr>
                                <div class="form-group">
                                    <div class="col-md-4 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                        <button name="update" class="btn btn-primary" type="submit" >Gửi thông tin xác thực</button>
                                    </div>
                                </div>                        
                        </div>
                    </div>
                </section>
            </div>
        </div>
        </div>
        <?php
        if (isset($_POST['update'])) {
           
            $cardnumber = $_POST['cardNumber'];
            $daterange = $_POST['dateRange'];
            $isuseby = $_POST['isuseBy'];
            $imagefront = $_FILES['imageFront']['name'];
            if ($imagefront != null) {
                $path = "../image/";
                $tmp_name = $_FILES['imageFront']['tmp_name'];
                move_uploaded_file($tmp_name,$path.$imagefront);
            }
            $imageback = $_FILES['imageBack']['name'];
            if ($imageback != null) {
                $path = "../image/";
                $tmp_name = $_FILES['imageBack']['tmp_name'];
                move_uploaded_file($tmp_name,$path.$imageback);
            }
            if($imagefront!= null && $imageback != null){
            // Bước 2 câu lệnh truy vấn
            $sql1 = "INSERT INTO `tb_customer`(`id_customer`, `cardNumber`, `dateRange`, `isuseBy`, `imageFront`, `imageBack`) 
            VALUES ('$iduser','$cardnumber','$daterange',N'$isuseby','$imagefront','$imageback')";
            $res1 = mysqli_query($conn, $sql1);
            if ($res1 == true) { 
                $slq11 = "UPDATE `tb_user` SET `status`= 1 WHERE id_user = $iduser";
                $res11 = mysqli_query($conn, $slq11);
                 $_SESSION['status'] = "Gửi yêu cầu xác thực thành công";
                 $_SESSION['status_code'] = "success";
               
                } else { 
                    $_SESSION['status'] = "Gửi yêu xác thực thất bại";
                    $_SESSION['status_code'] = "error";
                 }
            }
            else{
                $_SESSION['status'] = "Gửi yêu xác thực thất bại";
                $_SESSION['status_code'] = "error";
            }
            }
            ?>    
        </form>
        <!-- End Update Information personl -->

     <?php include('footer.php')?>
                              
    <?php
        if(isset($_SESSION['status']) && $_SESSION['status'] !='')
        {
            ?>
        <script> 
            Swal.fire({
            icon: "<?php echo $_SESSION['status_code'];?>",
            title: "<?php echo $_SESSION['status'];?>" ,
            footer: '<a class="btn btn-success" href="index_home.php?id_user=1">Xong</a>',
            showConfirmButton: false,
            });     
                
        </script>
        <?php 
            unset($_SESSION['status']);
         }
    ?>