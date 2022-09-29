<?php
include('header.php');
?>
<section class="view" id="order">

    <?php
    if (isset($_GET['id_home'])) {
        $id_home = $_GET['id_home'];
    }
    $sql = "SELECT * FROM tb_typeHome, tb_home Where tb_typeHome.id_typeHome = tb_home.id_typeHome and tb_typeHome.status = 1 and tb_home.status = 1 and id_home = $id_home";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    if ($count == 1) {
        $row = mysqli_fetch_assoc($res);
        $id_typeHome = $row['id_typeHome'];
        $type_nameHome = $row['name_typeHome'];
        $name_home = $row['name_home'];
        $price = $row['price'];
        $priceSale = $row['priceSale'];
        $area = $row['area_home'];
        $address = $row['address_home'];
        $room = $row['numberRoom'];
        $bedRoom = $row['numberBedRoom'];
        $bathRoom = $row['numberBathRoom'];
        $des = $row['description'];
        $image1 = $row['image1'];
        $image2 = $row['image2'];
        $image3 = $row['image3'];
        $image4 = $row['image4'];
        $image5 = $row['image5'];
    }

    ?>
    
    <section class="recent" style="margin: 8rem 0 0 1rem;">
        <div class="activity-grid">
            <div class="activity-card">
                <h3>Thông tin căn hộ</h3>
            </div>
        </div>
    </section>
    <form action="" method="POST" class="register" enctype="multipart/form-data">
        <!-- Update -->
        <?php
        if (isset($_POST['submit'])) {
            $name_home1 = $_POST['nameHome'];
            $price1 = $_POST['price'];
            $priceSale1 = $_POST['priceSale'];
            $area1 = $_POST['area'];
            $address1 = $_POST['address'];
            $room1 = $_POST['room'];
            $bedRoom1 = $_POST['bedRoom'];
            $bathRoom1 = $_POST['bathRoom'];
            $des1 = $_POST['description'];
            if (isset($_FILES['image1']['name'])) {
                $image6 = $_FILES['image1']['name'];
                if ($image6 != "") {
                    $source_path = $_FILES['image1']['tmp_name'];

                    $dess_path = "../image/image_database/" . $image6;

                    $upload = move_uploaded_file($source_path, $dess_path);
                    if ($upload == FALSE) {
                        die();
                    }
                }
            } else {
                $image6 = null;
            }


            if (isset($_FILES['image2']['name'])) {
                $image7 = $_FILES['image2']['name'];
                if ($image7 != "") {
                    $source_path = $_FILES['image2']['tmp_name'];

                    $dess_path = "../image/image_database/" . $image7;

                    $upload = move_uploaded_file($source_path, $dess_path);
                    if ($upload == FALSE) {
                        die();
                    }
                }
            } else {
                $image7 = null;
            }

            if (isset($_FILES['image3']['name'])) {
                $image8 = $_FILES['image3']['name'];
                if ($image8 != "") {
                    $source_path = $_FILES['image3']['tmp_name'];

                    $dess_path = "../image/image_database/" . $image8;

                    $upload = move_uploaded_file($source_path, $dess_path);
                    if ($upload == FALSE) {
                        die();
                    }
                }
            } else {
                $image8 = null;
            }

            if (isset($_FILES['image4']['name'])) {
                $image9 = $_FILES['image4']['name'];
                if ($image9 != "") {
                    $source_path = $_FILES['image4']['tmp_name'];

                    $dess_path = "../image/image_database/" . $image9;

                    $upload = move_uploaded_file($source_path, $dess_path);
                    if ($upload == FALSE) {
                        die();
                    }
                }
            } else {
                $image9 = null;
            }

            if (isset($_FILES['image5']['name'])) {
                $image10 = $_FILES['image5']['name'];
                if ($image10 != "") {
                    $source_path = $_FILES['image5']['tmp_name'];

                    $dess_path = "../image/image_database/" . $image10;

                    $upload = move_uploaded_file($source_path, $dess_path);
                    if ($upload == FALSE) {
                        die();
                    }
                }
            } else {
                $image10 = null;
            }



            $sql2 = "UPDATE tb_home SET name_home = '$name_home1', price = '$price1', priceSale = '$priceSale1', area_home = '$area1', address_home = '$address1', 
                            numberRoom = '$room1', numberBedRoom = '$bedRoom1', numberBathRoom = '$bathRoom1', description = '$des1', image1 = '$image6', image2 = '$image7', image3 = '$image8',  image4 = '$image9', image5 = '$image10' WHERE id_home = $id_home ";
            $res2 = mysqli_query($conn, $sql2);
            if ($res2 == true) {
                header("Location:home.php");
            } else {
                header("Location:view_home.php");
            }
        }
        ?>
        <div class="inputBox">
            <div class="input">
                <span>Tên loại nhà</span>
                <input class="readOnly" readonly value="<?php echo $type_nameHome; ?>">
            </div>
            <div class="input">
                <span>Tên nhà</span>
                <input type="text" name="nameHome" value="<?php echo $name_home; ?>">
            </div>
        </div>

        <div class="inputBox">
            <div class="input">
                <span>Giá thực (VND)</span>
                <input name="price" value="<?php echo number_format($price, 0, '.', '.') ?>">
            </div>
            <div class="input">
                <span>Giảm giá (%)</span>
                <input type="text" name="priceSale" value="<?php echo $priceSale ?>">
            </div>
        </div>


        <div class="inputBox">
            <div class="input">
                <span>Giá bán (VND)</span>
                <input type="text" class="form-control read" class="readOnly" readonly value="<?php echo number_format(($price) - ($price * ($priceSale / 100)), 0, '.', '.') ?>">

            </div>
            <div class="input">
                <span>Diện tích (m²)</span>
                <input type="text" class="form-control read" name="area" value="<?php echo $area ?>">
            </div>
        </div>

        <div class="inputBox">
            <div class="input">
                <span>Địa chỉ</span>
                <input type="text" class="form-control read" name="address" value="<?php echo $address ?>">
            </div>
            <div class="input">
                <span>Số phòng khách</span>
                <input type="text" class="form-control read" name="room" value="<?php echo $room ?>">
            </div>
        </div>

        <div class="inputBox">
            <div class="input">
                <span>Số phòng ngủ</span>
                <input type="text" class="form-control read" name="bedRoom" value="<?php echo $bedRoom ?>">
            </div>
            <div class="input">
                <span>Số phòng tắm</span>
                <input type="text" class="form-control read" name="bathRoom" value="<?php echo $bathRoom ?>">
            </div>
        </div>

        <div class="inputBox">
            <div class="input">
                <span>Mô tả</span>
                <textarea cols="30" name="description" rows="5"><?php echo $des; ?></textarea>
            </div>
            <div class="input">
                <span>Hình ảnh</span>
                <?php
                if ($image1 != null) {
                ?>
                    <img name="image1" class="imageView" src="../image/<?php echo $image1; ?>" alt="">
                <?php
                } else {
                ?>
                    <span class="imageMain">Không có ảnh</span>
                <?php
                }
                ?>
                <input style="background:#fff;" type="file" name="image1">
            </div>
        </div>
        <div class="listImage">
            <div class="formImage">
                <div class="imageFile" style="margin-right: 9rem;">
                    <span>Hình ảnh 2</span>
                    <?php
                    if ($image2 != null) {
                    ?>
                        <img class="imageMain" src="../image/<?php echo $image2; ?>" alt="">
                    <?php
                    } else {
                    ?>
                        <span class="imageMain">Không có ảnh</span>
                    <?php
                    }
                    ?>
                    <input style="margin-top: 15px; font-size:1.7rem;" name="image2" type="file">
                </div>

                <div class="imageFile">
                    <span>Hình ảnh 3</span>
                    <?php
                    if ($image3 != null) {
                    ?>
                        <img  class="imageMain" src="../image/<?php echo $image3; ?>" alt="">
                    <?php
                    } else {
                    ?>
                        <span class="imageMain">Không có ảnh</span>
                    <?php
                    }
                    ?>
                    <input style="margin-top: 15px; font-size:1.7rem;" name="image3" type="file">
                </div>
            </div>

            <div class="formImage">
                <div class="imageFile" style="margin-right: 9rem;">
                    <span>Hình ảnh 4</span>
                    <?php
                    if ($image4 != null) {
                    ?>
                        <img  class="imageMain" src="../image/<?php echo $image4; ?>" alt="">
                    <?php
                    } else {
                    ?>
                        <span class="imageMain">Không có ảnh</span>
                    <?php
                    }
                    ?>
                    <input style="margin-top: 15px; font-size:1.7rem;" name="image4" type="file">
                </div>

                <div class="imageFile">
                    <span>Hình ảnh 5</span>
                    <?php
                    if ($image5 != null) {
                    ?>
                        <img class="imageMain" src="../image/<?php echo $image5; ?>" alt="">
                    <?php
                    } else {
                    ?>
                        <span class="imageMain">Không có ảnh</span>
                    <?php
                    }
                    ?>
                    <input style="margin-top: 15px; font-size:1.7rem;" name="image5" type="file">
                </div>
            </div>
        </div>



        <input style="padding: 0.9rem 2rem;" type="submit" name="submit" value="Cập nhật" class="btn">
        <a href="home.php" class="btn btn-add btn-cancel">Hủy bỏ</a>
    </form>

</section>
<?php
include('footer.php');
?>