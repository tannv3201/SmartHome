<?php
include('header.php');
?>
<section class="view" id="order">
    <section class="recent" style="margin: 8rem 0 0 1rem;">
        <div class="activity-grid">
            <div class="activity-card">
                <h3>Thêm tài khoản</h3>
            </div>
        </div>
    </section>
    <form action="" method="POST" class="register" enctype="multipart/form-data">
        <!-- INSERT -->
        <?php
            if(isset($_POST['submit'])){
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $email = $_POST['email'];
                $phone = $_POST['phoneNumber'];
                $pass1 = $_POST['pass1'];
                $pass2 = $_POST['pass2'];
                $level = $_POST['level'];
                $address = $_POST['address'];

                if($email != null && $phone != null && $pass1 == $pass2){
                    $sql = "INSERT INTO tb_user(firstName, lastName, email, user_pass, address, levelUser, phoneNumber, status)
                            VALUES('$firstName', '$lastName', '$email', '$pass1', '$address', '$level', '$phone', 1)";

                    $res = mysqli_query($conn, $sql);
                    if($res == true){
                        header("Location:account.php");
                    }
                    else{
                        header("Location:add_account.php");
                    }
                }
            }
        ?>
        <div class="inputBox">
            <div class="input">
                <span>Họ & tên đệm</span>
                <input type="text" name="firstName" placeholder="Nhập họ & tên đệm">
            </div>
            <div class="input">
                <span>Tên</span>
                <input type="text" name="lastName" placeholder="Nhập tên">
            </div>
        </div>
        <div class="inputBox">
            <div class="input">
                <span>Email</span>
                <input type="email" name="email" placeholder="Nhập email">
            </div>
            <div class="input">
                <span>Số điện thoại</span>
                <input type="tel" name="phoneNumber" placeholder="Nhập số điện thoại">
            </div>
        </div>

        <div class="inputBox">
            <div class="input">
                <span>Mật khẩu</span>
                <input type="password" name = "pass1" placeholder="******">
            </div>
            <div class="input">
                <span>Xác minh mật khẩu</span>
                <input type="password" name = "pass2" placeholder="*****">
            </div>
        </div>

        <div class="inputBox">
            <div class="input">
                <span>Loại tài khoản</span>
                <select class = "typeAccount" name="level">
                    <option value="1">Quản lý</option>
                    <option value="2">Nhân viên</option>
                    <option value="3">Khách hàng</option>
                </select>
            </div>
            <div class="input">
                <span>Địa chỉ</span>
                <input name="address" placeholder="Nhập địa chỉ">
            </div>
        </div>
        <input style="padding: 0.9rem 2rem;" type="submit" name="submit" value="Thêm tài khoản" class="btn">
        <a href="account.php" class="btn btn-add btn-cancel">Hủy bỏ</a>
    </form>

</section>
<?php
include('footer.php');
?>