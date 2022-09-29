<?php
include('header.php');
?>
<section class="view" id="order">

    <?php
        if(isset($_GET['id_user']))
        {
            $id_user = $_GET['id_user'];
        }
        $sql = "SELECT * FROM tb_user WHERE id_user = $id_user";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if($count==1)
        {
            $row = mysqli_fetch_assoc($res);
            $firstName = $row['firstName'];
            $lastName = $row['lastName'];
            $email = $row['email'];
            $phoneNumber = $row['phoneNumber'];
            $gender = $row['gender'];
            $address = $row['address'];
            $level = $row['levelUser'];
            $birthday = $row['birthday'];
            $image_user = $row['image'];
        }
            
    ?>
    <section class="recent" style="margin: 8rem 0 0 1rem;">
        <div class="activity-grid">
            <div class="activity-card">
                <h3>Thông tin tài khoản</h3>
            </div>
        </div>
    </section>
    <form action="" method="POST" class="register" enctype="multipart/form-data">
        <!-- Update -->
        <?php
            if(isset($_POST['submit']))
            {
                $firstName1 = $_POST['firstName'];
                $lastName1 = $_POST['lastName'];
                $gender1 = $_POST['gender'];
                $level1 = $_POST['level'];
                $address1 = $_POST['address'];
                if(isset($_FILES['image']['name']))
                    {
                        $image_name = $_FILES['image']['name'];
                        if($image_name!="")
                        {
                            $source_path = $_FILES['image']['tmp_name'];

                            $dess_path = "../image/image_database/".$image_name;

                            $upload = move_uploaded_file($source_path, $dess_path);
                            if($upload== FALSE)
                            {
                                die();
                            }
                        }
                    }
                    else
                    {
                        $image_name = "user_default.jpg";
                    }
                $sql1 = "UPDATE tb_user SET firstName = '$firstName1', lastName = '$lastName1',
                         levelUser = $level1, gender = $gender1, address = '$address1', image = '$image_name' Where id_user = $id_user";
                $res1 = mysqli_query($conn, $sql1);
                if($res1 == true){
                    header("Location:account.php");
                }
                else{
                    header("Location:view_account.php");
                }
            }

        ?>
        <div class="inputBox">
            <div class="input">
                <span>Họ & tên đệm</span>
                <input type="text" name="firstName" value="<?php echo $firstName;?>">
            </div>
            <div class="input">
                <span>Tên</span>
                <input type="text" name="lastName" value="<?php echo $lastName;?>">
            </div>
        </div>
        <div class="inputBox">
            <div class="input">
                <span>Email</span>
                <input class = "readOnly" readonly value="<?php echo $email;?>">
            </div>
            <div class="input">
                <span>Số điện thoại</span>
                <input class = "readOnly" readonly value="<?php echo $phoneNumber;?>">
            </div>
        </div>

        <div class="inputBox">
            <div class="input">
                <span>Loại tài khoản</span>
                <select class = "typeAccount" name="level">
                    <option selected="selected" value="<?php echo $level; ?>">
                    <?php 
                        if($level == 1){
                            echo "Quản lý";
                        }
                        if($level == 2){
                            echo "Nhân viên";
                        }
                        if($level == 3){
                            echo "Khách hàng";
                        }
                    ?>
                    </option>
                    <option value="1">Quản lý</option>
                    <option value="2">Nhân viên</option>
                    <option value="3">Khách hàng</option>
                </select>
            </div>
            <div class="input">
                <span>Địa chỉ</span>
                <input name="address" placeholder="Nhập địa chỉ" value="<?php echo $address;?>">
            </div>
        </div>

        
       
        <div class="inputBox gender">
            <div class="gender">
                <div>
                    <span>Giới tính</span>
                    <div>
                        <input <?php if($gender==1) {echo "checked"; }?> type="radio" name = "gender" value="1"><span>Nam</span>
                        <input <?php if($gender==2) {echo "checked"; }?> type="radio" name = "gender" value="2"><span>Nữ</span>
                    </div>
                </div>
                <div>
                    <span>Ảnh</span>
                    <br>
                    <input type="file" name="image" class="fileInput" value="<?php echo $image_user; ?>">         
                </div>
            </div>
        </div>

        <input style="padding: 0.9rem 2rem;" type="submit" name="submit" value="Cập nhật" class="btn">
        <a href="account.php" class="btn btn-add btn-cancel">Hủy bỏ</a>
    </form>

</section>
<?php
include('footer.php');
?>