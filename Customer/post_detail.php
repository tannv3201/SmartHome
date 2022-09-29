<?php
 session_start();
 $iduser = $_SESSION['id_customerSession'];
  include('config/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="../image/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="./css/animate/animate.min.css" rel="stylesheet">
    <link href="./css/animate//owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="./css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="fonts/fontawesome-free-6.1.1/css/all.min.css">

    <title>Bài viết</title>
</head>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


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
                        <a href="https://www.facebook.com/daihocthuyloi1959" class="nav-item nav-link">Chúng tôi</a>
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
                        </div>                        
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="personal_information.php?id_user=<?php echo $iduser;?>" class="dropdown-item">Thông tin cá nhân</a>
                                <a href="history_contract.php?id_user=<?php echo $iduser;?>" class="dropdown-item">Lịch sử đặt cọc</a>
                                <a href="change_password.php?id_user=<?php echo $iduser;?>" class="dropdown-item">Đổi mật khẩu</a>
                                <a href="logout.php" class="dropdown-item">Đăng xuất</a>
                                <div style=" margin-left:15px; width:130px; height:0.2px; background-color:black;" class="lane"></div>
                               <?php if($cc == 2)
                                    {
                                        ?>
                                        <a href="active.php?id_user=1" class="dropdown-item" style="color: red;" href="active.php?id_user=<?php echo $iduser;?>"> Xác thực tài khoản</a>
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
                    <!-- End information user -->
                </div>
            </nav>
        </div>
<!-- header -->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container pb50">
    <div class="row">
        <div class="col-md-9 mb40">
               <br>
               <br>
               <br>                     
            <?php
            $id_post = $_GET['id_post'];
            $sql = "select * from tb_post where id_post = $id_post";
            $qr = mysqli_query($conn, $sql);
            if ($qr) {
                while ($row = mysqli_fetch_assoc($qr)) {
            ?>
                    <article>
                        
                        <div class="post-content">
                            <h1 style="font-size: 50px; color:#50c1c7"><?= $row['postTitle'] ?></h1>
                            <h6>Người viết:
                                <?php 
                                    $iduser = $row['idWriter'];
                                    $sql1 = "SELECT * FROM `tb_user` WHERE id_user = '$iduser'";
                                    $res1 = mysqli_query($conn, $sql1);
                                    $row1 = mysqli_fetch_array($res1);
                                    echo $row1['firstName'];
                                    echo " ";
                                    echo $row1['lastName'];
                                ?>
                            </h6>
        
                            <img style="margin-top:50px; border-radius:5%; width:700px;" src="../image/<?= $row['img_post'] ?>" alt="" class="img-fluid mb30">
                            <hr class="mb40">
                        </div>
                    </article>
                    </div>
                </div>
                    <h5 style="margin-top: -50px;">Nội dung:</h5>
                    <p><?= $row['postContent'] ?></p>
            <?php
                }
            }
            ?>

   
   <?php
   include("footer.php");
   ?>
    <style>
        body {
            margin-top: 20px;
        }

        /*
Blog post entries
*/

        .entry-card {
            -webkit-box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.05);
            -moz-box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.05);
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.05);
        }

        .entry-content {
            background-color: #fff;
            padding: 36px 36px 36px 36px;
            border-bottom-left-radius: 6px;
            border-bottom-right-radius: 6px;
        }

        .entry-content .entry-title a {
            color: #333;
        }

        .entry-content .entry-title a:hover {
            color: #4782d3;
        }

        .entry-content .entry-meta span {
            font-size: 12px;
        }

        .entry-title {
            font-size: .95rem;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .entry-thumb {
            display: block;
            position: relative;
            overflow: hidden;
            border-top-left-radius: 6px;
            border-top-right-radius: 6px;
        }

        .entry-thumb img {
            border-top-left-radius: 6px;
            border-top-right-radius: 6px;
        }

        .entry-thumb .thumb-hover {
            position: absolute;
            width: 100px;
            height: 100px;
            background: rgba(71, 130, 211, 0.85);
            display: block;
            top: 50%;
            left: 50%;
            color: #fff;
            font-size: 40px;
            line-height: 100px;
            border-radius: 50%;
            margin-top: -50px;
            margin-left: -50px;
            text-align: center;
            transform: scale(0);
            -webkit-transform: scale(0);
            opacity: 0;
            transition: all .3s ease-in-out;
            -webkit-transition: all .3s ease-in-out;
        }

        .entry-thumb:hover .thumb-hover {
            opacity: 1;
            transform: scale(1);
            -webkit-transform: scale(1);
        }

        .article-post {
            border-bottom: 1px solid #eee;
            padding-bottom: 70px;
        }

        .article-post .post-thumb {
            display: block;
            position: relative;
            overflow: hidden;
        }

        .article-post .post-thumb .post-overlay {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            transition: all .3s;
            -webkit-transition: all .3s;
            opacity: 0;
        }

        .article-post .post-thumb .post-overlay span {
            width: 100%;
            display: block;
            vertical-align: middle;
            text-align: center;
            transform: translateY(70%);
            -webkit-transform: translateY(70%);
            transition: all .3s;
            -webkit-transition: all .3s;
            height: 100%;
            color: #fff;
        }

        .article-post .post-thumb:hover .post-overlay {
            opacity: 1;
        }

        .article-post .post-thumb:hover .post-overlay span {
            transform: translateY(50%);
            -webkit-transform: translateY(50%);
        }

        .post-content .post-title {
            font-weight: 500;
        }

        .post-meta {
            padding-top: 15px;
            margin-bottom: 20px;
        }

        .post-meta li:not(:last-child) {
            margin-right: 10px;
        }

        .post-meta li a {
            color: #999;
            font-size: 13px;
        }

        .post-meta li a:hover {
            color: #4782d3;
        }

        .post-meta li i {
            margin-right: 5px;
        }

        .post-meta li:after {
            margin-top: -5px;
            content: "/";
            margin-left: 10px;
        }

        .post-meta li:last-child:after {
            display: none;
        }

        .post-masonry .masonry-title {
            font-weight: 500;
        }

        .share-buttons li {
            vertical-align: middle;
        }

        .share-buttons li a {
            margin-right: 0px;
        }

        .post-content .fa {
            color: #ddd;
        }

        .post-content a h2 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 0px;
        }

        .article-post .owl-carousel {
            margin-bottom: 20px !important;
        }

        .post-masonry h4 {
            text-transform: capitalize;
            font-size: 1rem;
            font-weight: 700;
        }

        .mb40 {
            margin-bottom: 40px !important;
        }

        .mb30 {
            margin-bottom: 30px !important;
        }

        .media-body h5 a {
            color: #555;
        }

        .categories li a:before {
            content: "\f0da";
            font-family: 'FontAwesome';
            margin-right: 5px;
        }

        /*
Template sidebar
*/

        .sidebar-title {
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }

        .categories li {
            vertical-align: middle;
        }

        .categories li>ul {
            padding-left: 15px;
        }

        .categories li>ul>li>a {
            font-weight: 300;
        }

        .categories li a {
            color: #999;
            position: relative;
            display: block;
            padding: 5px 10px;
            border-bottom: 1px solid #eee;
        }

        .categories li a:before {
            content: "\f0da";
            font-family: 'FontAwesome';
            margin-right: 5px;
        }

        .categories li a:hover {
            color: #444;
            background-color: #f5f5f5;
        }

        .categories>li.active>a {
            font-weight: 600;
            color: #444;
        }

        .media-body h5 {
            font-size: 15px;
            letter-spacing: 0px;
            line-height: 20px;
            font-weight: 400;
        }

        .media-body h5 a {
            color: #555;
        }

        .media-body h5 a:hover {
            color: #4782d3;
        }
    </style>