<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <title>Archiiro Website</title>
</head>

<body>
    <div class="wrapper">
        <section class="form signup">
            <header>ĐĂNG KÝ</header>
            <form action="">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>Họ & tên đệm</label>
                        <input type="text" name="fname" placeholder="Họ & tên đệm" required>
                    </div>
                    <div class="field input">
                        <label>Tên</label>
                        <input type="text" name="lname" placeholder="Nhập Tên" required>
                    </div>
                </div>
                <div class="field input">
                    <label>Địa chỉ email</label>
                    <input type="text" name="email" placeholder="Nhập email" required>
                </div>
                <div class="field input">
                    <label>Số điện thoại</label>
                    <input type="text" name="phone" placeholder="Nhập số điện thoại" required>
                </div>
                <div class="field input">
                    <label>Mật khẩu</label>
                    <input type="password" name="pass1" placeholder="Nhập mật khẩu" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field input">
                    <label>Xác minh mật khẩu</label>
                    <input type="password" name="pass2" placeholder="Nhập mật khẩu" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Đăng ký">
                </div>
            </form>
            <div class="link">Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a></div>
        </section>
    </div>
    <script src="javascript/showPass.js"></script>
    <script src="javascript/showError.js"></script>
</body>

</html>