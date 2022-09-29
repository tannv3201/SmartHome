<?php 
  include('header.php');
?>
<head>
    <title>Trang chủ</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
</head>

    <form action="" method="POST">
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Information personl -->
        <div class="container rounded bg-white mt-5 mb-5">
            <br>
            <br>
       
        <div class="row">
            <div class="col-md-4 border-right"></div>
            <div class="col-md-8 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 style="margin-left:110px" class="text-right">Đổi mật khẩu</h4>
                        </div>                                              
                            <div class="col-md-6"><label class="labels"> Nhập mật khẩu cũ</label>
                                <input  name="password" type="password" class="form-control" >
                            </div>                                                                                
                        <!-- <div class="row mt-3">
                                                                                                        
                        </div> -->
                        <div class="col-md-6"><label class="labels"> Mật khẩu mới</label>
                            <input  name="new_password" type="password" class="form-control" placeholder="">                                                   
                        </div>
                        <div class="col-md-6"><label class="labels"> Nhập lại mật khẩu mới</label>
                            <input  name="new_password2" type="password" class="form-control" placeholder="">                                                   
                        </div>
                        <div class="mt-5 text-center">
                            <button name="change-password" type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Đổi mật khẩu
                                </button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <!-- End Information personl -->
        <!-- PHP -->
        <?php
            $sql = "SELECT * FROM `tb_user` WHERE id_user = '$iduser'";
            $res = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($res);
            $password = $row['user_pass'];
        ?>
        <?php
            if (isset($_POST['change-password'])){
                $oldpassword = $_POST['password'];
                $newpassword = $_POST['new_password'];
                $newpassword2 = $_POST['new_password2'];
             if( $oldpassword == null || $newpassword == null || $newpassword2 == null){
                 $_SESSION['status'] = "Vui lòng nhập đầy đủ thông tin";
                 $_SESSION['status_code'] = "error";
                }
             else if($oldpassword != $password){
                $_SESSION['status'] = "Mật khẩu cũ bạn nhập không đúng";
                $_SESSION['status_code'] = "error";
             }   
             else if( $newpassword != $newpassword2){
                $_SESSION['status'] = "Mật khẩu mới bạn nhập không trùng khớp";
                $_SESSION['status_code'] = "error";
             }
            else if($oldpassword == $password &&  $newpassword == $newpassword2 ){
                $sql1 = "UPDATE `tb_user` SET `user_pass`='$newpassword' WHERE id_user = '$iduser'";
                $res1 = mysqli_query($conn, $sql1);
                if($res1 == true){
                    $_SESSION['status'] = "Đổi mật khẩu thành công";
                    $_SESSION['status_code'] = "success";
                }
                else{
                    $_SESSION['status'] = "Đổi mật khẩu thất bại";
                    $_SESSION['status_code'] = "error";
                }
            }
            else{
                $_SESSION['status'] = "Đổi mật khẩu thất bại";
                $_SESSION['status_code'] = "error";
            }
           }
    
        ?>
<?php include('footer.php')?>

<?php
        
        if(isset($_SESSION['status']) && $_SESSION['status'] !='')
        {
            ?>
        <script> 
            Swal.fire({
            icon: "<?php echo $_SESSION['status_code'];?>",
            title: "<?php echo $_SESSION['status'];?>",
            showConfirmButton: false,
            });     
                
        </script>
        <?php 
            unset($_SESSION['status']);
         }
        
    ?>
    