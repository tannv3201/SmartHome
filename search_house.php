<h1>Các ngôi nhà cần tìm kiếm</h1>
<br>
<br>
<?php
include("Customer/config/config.php");
// area_home dia chi 
// area_house dien tich 
// type_house loai nha
if (isset($_POST['action'] )) {
    $type_house =  $_POST['type_house'];
    $area_house =  $_POST['area_house'];
    $area_home = $_POST['area_home'];
    $min_area  ; 
    $max_area  ;
    if($area_home ==0)
    {
        $min_area = 0 ;
        $max_area = 0 ;
    }
    if($area_home ==1)
    {
        $min_area = 0 ;
        $max_area = 50 ;
    }
    if($area_home ==2)
    {
        $min_area = 50 ;
        $max_area = 100 ;
    }
    if($area_home ==3)
    {
        $min_area = 100 ;
        $max_area = 150 ;
    }
    if($area_home ==4)
    {
        $min_area = 150 ;
        $max_area = 200 ;
    }
    if($area_home ==5)
    {
        $min_area = 200 ;
        $max_area = 1000000000000000000000000000000000000000000000000 ;
    }
    if($type_house == -1)
    {
        echo "Không có căn nhà nào";
    }else 
    {
        $sql_search = "Select * from tb_typehome,tb_home 
        where tb_home.status = 1 and tb_home.id_typeHome = tb_typehome.id_typeHome and
         tb_home.id_typeHome = $type_house and 
         address_home like '%$area_house%' and 
         area_home between  $min_area and $max_area
         ";
    
        $qr_search = mysqli_query($conn, $sql_search);
        if(mysqli_num_rows($qr_search)>0)
        {
           ?>
           <div id="tab-1" class="tab-pane fade show p-0 active">
            <div class="row g-4">
                <?php while ($row_s = mysqli_fetch_assoc($qr_search)) {
                ?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="property-item rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <a href="detail_home_nologin.php?id_home=<?= $row_s['id_home'] ?>"><img style="height:230px;" class="img-fluid" src="image/<?php echo $row_s['image1'] ?>" alt=""></a>
                            </div>
                            <div class="p-2">
                                <a style="margin-top:30px; padding-bottom:10px;" class=" d-flex align-items-center  h5 mb-2" href="detail_home.php?id_home=<?= $row_s['id_home'] ?>"><?php echo $row_s['name_home'] ?></a>
                                <h6 class="d-flex align-items-center text-primary mb-3"><span class="priceX"><?= number_format( $row_s['price'], 0, '.', '.') ?> </span> VNĐ</h5>
                                   
                                <p class="d-flex align-items-center"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $row_s['address_home'] ?></p>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i><?php echo $row_s['area_home'] ?> m2</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i><?php echo $row_s['numberBedRoom'] ?> Phòng ngủ</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i><?php echo $row_s['numberBathRoom'] ?> Phòng tắm</small>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
    
        </div>
           <?php
        }else 
        {
            echo "Không có căn nhà nào";
        }
    }
    

?>
    
<?php
    // }
} else {
    echo "Nhà tìm kiếm sẽ ở đây";
}
?>