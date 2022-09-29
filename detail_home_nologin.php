<?php
  include('header.php');
?>

<head>
    <title>Thông tin căn hộ</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <style>
        #gallery {
            margin-top: 10px;
        }

        #gallery ul {
            margin: 0;
            padding: 0;
        }

        #gallery ul li {
            width: 150px;
            float: left;
            list-style: none;
            margin-right: 5px;
            margin-bottom: 5px;
            height: 100px;
            text-align: center;
            padding: 3px;
            border-radius: 8px;
            border: 2px solid #355C7D;
            background: #fafafb;
        }

        #gallery ul li img {
            max-width: 100%;
            max-height: 100%;
            vertical-align: middle;
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
        }
    </style>
</head>
<div class="container-xxl bg-white p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->




    <!-- Header Start -->
    <!-- <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4">Find A <span class="text-primary">Perfect Home</span> To Live With Your Family</h1>
                    <a href="" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Get Started</a>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <div class="owl-carousel header-carousel">
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="image/carousel-1.jpg" alt="">
                        </div>
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="image/carousel-2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Header End -->

    <!-- Search Start -->
                                </br>
    <div style=" margin-left:15px; width:98%; height:12px; background-color:#5ad1b5; border-radius: 5px" class="lane"></div>
    <!-- Search End -->


    <!-- Property List Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                        <h2 class="mb-3">Thông tin chi tiết</h2>
                    </div>
                </div>

            </div>
            <?php
            $idhome = $_GET['id_home'];
            $sql1 = "SELECT * FROM `tb_home` WHERE id_home = '$idhome'";
            $res1 = mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_assoc($res1);
            $idtypehome = $row1['id_typeHome'];
            $sql2 = "SELECT * FROM `tb_typehome` WHERE id_typeHome = '$idtypehome'";
            $res2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($res2);
            $nametypehome = $row2['name_typeHome'];
            ?>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="property-item rounded overflow-hidden">
                                <div class="position-relative overflow-hidden">
                                    <a href=""><img style="width:100%; height:350px;" class="" src="image/<?php echo $row1['image1'] ?>" alt="Đéo có ảnh thêm mệt vl"></a>
                                </div>
                            </div>
                        </div>
                        <div style="padding-top:0" class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div style="transform: translateY(-0.6rem);">
                                <h1><?php echo $row1['name_home'] ?></h1>
                            </div>
                            <h6>Loại nhà: <?php echo $nametypehome ?></h1>
                            </h6>
                            <labe><h5 style="color:#63d076;;"><?=number_format($row1['price'], 0, '.', '.')?> VNĐ</h5></label>
                            <div id="gallery">
                            <ul>
                                    <?php if($row1['image2'] != null) { ?>
                                    <li><a href="image/<?php echo $row1['image2'] ?>" data-lightbox="mygallery"><img src="image/<?php echo $row1['image2'] ?>" /></a></li>
                                   <?php } ?>
                                   <?php if($row1['image3'] != null) { ?>
                                    <li><a href="image/<?php echo $row1['image2'] ?>" data-lightbox="mygallery"><img src="image/<?php echo $row1['image3'] ?>" /></a></li>
                                   <?php } ?>
                                   <?php if($row1['image4'] != null) { ?>
                                    <li><a href="image/<?php echo $row1['image2'] ?>" data-lightbox="mygallery"><img src="image/<?php echo $row1['image4'] ?>" /></a></li>
                                   <?php } ?>
                                   <?php if($row1['image5'] != null) { ?>
                                    <li><a href="image/<?php echo $row1['image2'] ?>" data-lightbox="mygallery"><img src="image/<?php echo $row1['image5'] ?>" /></a></li>
                                   <?php } ?>
                                </ul>
                            </div>
                            <!-- condition request -->
    
                                        <div style="margin-top:205px; padding-left: 20px;">  <a href="SignInUp/login.php" class="btn btn-primary" >Đăng nhập</a></div>
                                        <span class="dropdown-item" style="color: red; font-style: italic;">Lưu ý: Đăng nhập tài khoản để có thể yêu cầu đặt cọc</span>       
                                                                            
                            <!-- condition request -->
                            
                        </div>
                        <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                            <h2>Mô tả</h2>
                            <p><?php echo $row1['description'] ?></p>
                        </div>
                        <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                            <h4>Căn hộ liên quan</h4></br>
                            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                                <?php
                                $sql = "SELECT * FROM `tb_home` WHERE status = 1 and id_typeHome = '$idtypehome'";
                                $qr = mysqli_query($conn, $sql);
                                if ($qr) {
                                    while ($row = mysqli_fetch_assoc($qr)) {
                                        ?>
                                                <div class="testimonial-item bg-light rounded p-3">
                                                    <div class="bg-white border rounded p-4">                                                                   
                                                        <div class="d-flex align-items-center">
                                                           <a href="detail_home.php?id_home=<?= $row['id_home'] ?>"><img style="width:200px; height:200px;" class="img-fluid rounded" src="image/<?= $row['image1'] ?>" style="width: 45px; height: 45px;"></a>
                                                            <div class="ps-3">
                                                                <div style="transform: translateY(-3.5rem);">
                                                                <h5  class="fw-bold mb-1"><?= $row['name_home']?></h5>
                                                                <h6 class="fw-bold mb-1"><?=number_format($row['price'], 0, '.', '.')?> VND</h6>
                                                                </div>
                                                                <a style="transform: translateY(3.3rem);" class="btn btn-success" href="detail_home_nologin.php?id_home=<?= $row['id_home'] ?>">Xem nhà</a>
                                                               
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                            </div>
                            </div>
                        </div>


                    <!-- Hết phần hiển thị -->
                </div>
            </div>
            <!-- Property List End -->


            <?php include('footer.php')?>
       