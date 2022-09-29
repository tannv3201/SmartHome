<?php 
    $idtypehome = $_GET['id_typeHome'];
    include('header.php');
    
?>
<head>
    <title>Trang chủ</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
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
       <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4">Căn hộ cao cấp cho cuộc sống nhẹ nhàng</h1>
                    
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
        </div>
        <!-- Header End -->


        <!-- Search Start -->
        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
        <form action="" method="POST">
            <div class="container">
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-4">

                                <input placeholder="khu vực nhà" name="area_house" id="area_house" class="form-select border-0 py-3 area_house" style="background-image: none ;">

                                </input>
                            </div>
                            <div class="col-md-4">
                                <select aria-placeholder="thể loại nhà" name="type_home" id="type_home" class="form-select border-0 py-3 ">
                                    <option value="-1">Thể loại nhà</option>
                                    <?php
                                    $sql_type = "select * from tb_typehome";
                                    $qr_type = mysqli_query($conn, $sql_type);
                                    if ($qr_type) {
                                        while ($row = mysqli_fetch_assoc($qr_type)) {
                                    ?>
                                            <option value="<?= $row['id_typeHome'] ?>"><?= $row['name_typeHome'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="col-md-4">
                                <select name="area_home" id="area_home" class="form-select border-0 py-3 ">
                                    <option value="0">Diện tích nhà</option>
                                    <option value="1">0-50 m2</option>
                                    <option value="2">50-100 m2</option>
                                    <option value="3">100-150 m2</option>
                                    <option value="4">150-200 m2</option>
                                    <option value="5">lớn hơn 200 m2</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-dark border-0 w-100 py-3 search_house">Tìm kiếm</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
        <!-- Search End -->
      
        
        <!-- Category Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Các loại nhà</h1>
                    <p>Tập trung vào chất lượng công trình bằng cả trái tim và tạo ra sự vững tin cho khách hàng bằng hành động.</p>
                </div>
                <div class="row g-4">
                    <?php
                    $sql = "Select tb_typehome.id_typeHome, tb_typehome.img_typeHome, tb_typehome.name_typeHome, Count(tb_home.id_home) AS number_Home From tb_home, tb_typeHome Where tb_home.id_typeHome = tb_typeHome.id_typeHome and tb_home.status = 1 
                    Group By tb_typeHome.id_typeHome; ";
                    $query = mysqli_query($conn, $sql);
                    if ($query) {
                        while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                            <div class="col-lg-3 col-sm-6 wow fadeInUp list_house" data-wow-delay="0.1s" >
                                 <!-- thẻ a -->
                                <a href="index_typeHome_nologin.php?id_typeHome=<?php echo $row['id_typeHome']?>" class="cat-item d-block bg-light text-center rounded p-3" >  
                                   
                                    <div class="rounded p-4 ">
                                        <div class="icon mb-3">
                                            <img class="img-fluid" src="image/<?php echo $row['img_typeHome']?>" alt="Icon">
                                        </div>
                                        <h6><?= $row['name_typeHome'] ?></h6>
                                        <span><?= $row['number_Home'] ?> căn hộ</span>
                                    </div>
                                </a>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- Category End -->

        <!-- Property List Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-0 gx-5 align-items-end">
                    <div class="col-lg-6">
                        <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                            <h1 class="mb-3">NTT HOME</h1>
                            <p>Ngôi nhà mà bạn mơ ước đang trong tầm tay. Hãy tận hưởng những đêm ấm cúng cùng gia đình bạn.</p>
                        </div>
                    </div>
                </div>
                <!-- Hiển thị tên dạng căn hộ-->
                <?php
                    $sql_type1 = "select * from tb_typehome where id_typeHome = $idtypehome";
                    $qr_type1 = mysqli_query($conn, $sql_type1);
                    $row_type1 = mysqli_fetch_assoc($qr_type1);
                ?>
                <h4><?php echo $row_type1['name_typeHome']?></h4>
                <!-- end hiển thị tên dạng căn hộ-->
                <br>
                <br>

                <div class="tab-content">
                    <?php                 
                    $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:6;
                    $current_page = isset($_GET['page'])?$_GET['page']:1;
                    $offset = ($current_page - 1) * $item_per_page;
                    $sql1 = "SELECT * FROM tb_home WHERE status = 1 and id_typeHome = '$idtypehome' ORDER BY 'id_home' ASC  LIMIT " . $item_per_page . " OFFSET " . $offset;
                    $res1 = mysqli_query($conn,$sql1);               
                    $sqlsp = mysqli_query($conn,"SELECT * FROM `tb_home` WHERE status = 1 and id_typeHome = '$idtypehome'");
                    $totalsp = mysqli_num_rows($sqlsp);                  
                    $totalpage = ceil($totalsp / $item_per_page);
                    ?>
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">          
                            <?php while($row = mysqli_fetch_array($res1)){
                           ?>
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href="detail_home_nologin.php?id_home=<?=$row['id_home']?>"><img style="height:230px; width:100%; object-fit:cover; justify-content: cover; border-radius: 2px;" class="" src="image/<?php echo $row['image1'] ?>" alt=""></a>
                                    </div>
                                    <div class="p-2">
                                        <a style="margin-top:30px; padding-bottom:10px;" class=" d-flex align-items-center  h5 mb-2" href="detail_home_nologin.php?id_home=<?=$row['id_home']?>"><?php echo $row['name_home']?></a>
                                        <h6 class="d-flex align-items-center text-primary mb-3"><span><?=number_format($row['price'], 0, '.', '.')?> VND</h5>
                                        <p class="d-flex align-items-center"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $row['address_home']?></p>                                      
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i><?php echo $row['area_home']?> m2</small>
                                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i><?php echo $row['numberBedRoom']?> Phòng ngủ</small>
                                        <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i><?php echo $row['numberBathRoom']?> Phòng tắm</small>
                                    </div>
                                </div>
                            </div>
                        <?php }?>                        
                </div>
                <?php
                        include "page.php";
                        ?>                
            </div>
            <br>
            <br>
            <div class="searchq">
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="tab-content search_house_page">
                </div>
            </div>
        </div>
        <!-- Property List End -->

        <!-- Post -->
        <br>
            <br>
        <div class="container-xxl py-5">
           <div class="container">
               <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                   <h1 class="mb-3">Bài viết</h1>
                   <p>Tập trung vào chất lượng công trình bằng cả trái tim và tạo ra sự vững tin cho khách hàng bằng hành động.</p>
               </div>
               <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                   <?php
                    $sql = "SELECT * FROM `tb_post` limit 0,6";
                    $qr = mysqli_query($conn, $sql);
                    if ($qr) {
                        while ($row = mysqli_fetch_assoc($qr)) {
                    ?>
                           <div class="testimonial-item bg-light rounded p-3">
                               <div class="bg-white border rounded p-4">
                                   <p><?= substr($row['postContent'], 0, 200) ?> ... </p> 
                                   <a  href="post_detail_nologin.php?id_post=<?=$row['id_post']?>">Đọc thêm</a>

                                 
                                   <div class="d-flex align-items-center">
                                       <img class="img-fluid flex-shrink-0 rounded" src="image/<?= $row['img_post'] ?>" style="width: 45px; height: 45px;">
                                       <div class="ps-3">
                                           <h5 style="display: flex;align-items:flex-start;" class="fw-bold mb-1"><?= $row['postTitle'] ?></h5>
                                           <small style="display: flex;align-items:flex-start;">Profession</small>
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
       <!-- End Post -->

        <?php include('footer.php')?>

        <script>
            
            $(document).ready(function() {

                action = "nothing"
                search(action)
                $(".search_house").on("click", function() {
                    area_home = $("#area_home").val()
                    type_house = $("#type_home").val()
                    area_house = $("#area_house").val()
                    action = "search"
                    search(area_home, type_house, area_house, action)
                    $(".search_house").on("submit", function() {
                        return false
                    })
                    $('html, body').animate({
                        scrollTop: $(".searchq").offset().top
                    }, 100);
                })

                function search(area_home, type_house, area_house, action) {
                    $.ajax({
                        url: "search_house.php",
                        method: "post",
                        data: {
                            action: action,
                            type_house: type_house,
                            area_house: area_house,
                            area_home: area_home
                        },
                        success: function(dt) {
                            $(".search_house_page").html(dt)
                          
                        }
                    })
                }
            })

          
        </script>