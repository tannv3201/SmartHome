<?php
    session_start();
    include('config/config.php');
    $iduser = $_SESSION['id_customerSession'];
    // include('connect_database/connect.php');
    if(!isset($_SESSION['id_customerSession'])) //nếu chưa đăng nhập thì ra ngoài
    {
        header("Location:../SignInUp/login.php");
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Archiiro Company</title>
     <!-- Favicon -->
     <link href="image/favicon.ico" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style1.css" rel="stylesheet">
 

    <link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
    <script type="text/javascript" src="js/lightbox-plus-jquery.min.js"></script>
</head>

<body>
<!-- Navbar Start -->
<div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="index_home.php" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="../image/icon-deal.png" alt="Icon" style="width: 30px; height: 30px;">
                    </div>
                    <h1 class="m-0 text-primary">Archiiro</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="index_home.php" class="nav-item nav-link">Trang chủ</a>
                        <a href="about.php" class="nav-item nav-link">Chúng tôi</a>
                        <a href="tel:+84346785893" class="nav-item nav-link">Liên hệ</a>
                    </div>
                    <!-- information user -->
                    <?php
                    $sql2 = "SELECT * FROM `tb_user` WHERE id_user = '$iduser'";
                    $res2 = mysqli_query($conn,$sql2);
                    $row2 = mysqli_fetch_assoc($res2);
                    $cc = $row2['status'];
                    ?>
                    <div class="nav-item dropdown">  
                        <div style="display:flex;" class="ifuser">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><?php echo $row2['firstName']?> <?php echo $row2['lastName']?></a> 
                                <img style="width:40px; height:40px; border-radius:50%;" class="img-fluid" src="../image/<?php echo $row2['image'] ?>" alt="">                      
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="personal_information.php?id_user=<?php echo $iduser;?>" class="dropdown-item">Thông tin cá nhân</a>
                                <a href="history_contract.php?id_user=<?php echo $iduser;?>" class="dropdown-item">Lịch sử đặt cọc</a>
                                <a href="change_password.php?id_user=<?php echo $iduser;?>" class="dropdown-item">Đổi mật khẩu</a>
                                <a href="logout.php" class="dropdown-item">Đăng xuất</a>
                                <div style=" margin-left:15px; width:130px; height:0.2px; background-color:black;" class="lane"></div>
                               <?php if($cc == 2 )
                                    {
                                        ?>
                                        <a class="dropdown-item" style="color: red;" href="active.php?id_user=<?php echo $iduser;?>"> Xác thực tài khoản</a>
                                        <?php
                                    }else if($cc == 1)
                                    {
                                        ?>
                                        <span class="dropdown-item" style="color: green; font-style: italic;"> Đã xác thực</span>
                                        <?php
                                    }
                                    else if($cc == 4)
                                    {
                                        ?>
                                        <span class="dropdown-item" style="color: #FADB0D; font-style: italic;"> Đang chờ xác thực</span>
                                        <?php
                                    }

                                    ?>
                            </div>
                        </div>     
                    </div>
                    <!-- End information user -->
                </div>
            </nav>
</div>
</body>
 <!-- Navbar End -->