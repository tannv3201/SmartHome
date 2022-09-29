<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Archiiro Website</title>
</head>

<body>
    <div class="wrapper">
        <section class="form login">
            <header>ĐĂNG NHẬP</header>
            <form action="#" autocomplete="off">
                <div class="error-txt"></div>
                <div class="field input">
                    <label>Địa chỉ email</label>
                    <input type="text" name="email" placeholder="Nhập email" required>
                </div>
                <div class="field input">
                    <label>Mật khẩu</label>
                    <input type="password" name="password" placeholder="Nhập mật khẩu" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="" class="remember-me">
                    <label for="remember-me">Lưu thông tin</label>
                </div>
                <div class="field button">
                    <input type="submit" value="Đăng nhập">
                </div>
            </form>
            <div class="link">Bạn chưa có tài khoản? <a href="register.php"> Đăng ký</a></div>
        </section>
    </div>

    <script src="javascript/showPass.js"></script>
    <script src="javascript/login.js"></script>
</body>

</html>