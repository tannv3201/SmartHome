<?php
  include('Customer/config/config.php');
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
    <link href="image/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="Customer/css/animate/animate.min.css" rel="stylesheet">
    <link href="Customer/css/animate//owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="Customer/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="Customer/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="Customer/fonts/fontawesome-free-6.1.1/css/all.min.css">

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
                <a href="index.php" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="image/icon-deal.png" alt="Icon" style="width: 30px; height: 30px;">
                    </div>
                    <h1 class="m-0 text-primary">Archiiro</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="index.php" class="nav-item nav-link">Trang chủ</a>
                        <a href="about.php" class="nav-item nav-link">Chúng tôi</a>
                        <a href="tel:+84346785893" class="nav-item nav-link">Liên hệ</a>                        
                    </div>
                      <!-- information user -->
                      <a href="SignInUp/login.php" class="btn btn-primary px-3 d-none d-lg-flex" >Đăng nhập</a>
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

            <?php
            $id_post = $_GET['id_post'];
            $sql = "select * from tb_post where id_post = $id_post";
            $qr = mysqli_query($conn, $sql);
            if ($qr) {
                while ($row = mysqli_fetch_assoc($qr)) {
            ?>
                    <article>
                       <br>
                       <br>
                       <br>
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
                            <!-- <ul class="post-meta list-inline">
                                <li class="list-inline-item">
                                    <i class="fa fa-user-circle-o"></i> <a href="#">John Doe</a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="fa fa-calendar-o"></i> <a href="#">29 June 2017</a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="fa fa-tags"></i> <a href="#">Bootstrap4</a>
                                </li>
                            </ul> -->
                            <img style="margin-top:50px;border-radius:5%; width:700px;" src="image/<?= $row['img_post'] ?>" alt="" class="img-fluid mb30">
                            
                            <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, </p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, </p> -->
                            <!-- <ul class="list-inline share-buttons">
                                <li class="list-inline-item">Share Post:</li>
                                <li class="list-inline-item">
                                    <a href="#" class="social-icon-sm si-dark si-colored-facebook si-gray-round">
                                        <i class="fa fa-facebook"></i>
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="social-icon-sm si-dark si-colored-twitter si-gray-round">
                                        <i class="fa fa-twitter"></i>
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="social-icon-sm si-dark si-colored-linkedin si-gray-round">
                                        <i class="fa fa-linkedin"></i>
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                            </ul> -->
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