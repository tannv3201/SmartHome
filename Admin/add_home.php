<?php
include('header.php');
?>
<section class="view" id="order">
    <section class="recent" style="margin: 8rem 0 0 1rem;">
        <div class="activity-grid">
            <div class="activity-card">
                <h3>Thêm mới căn hộ</h3>
            </div>
        </div>
    </section>
    <form action="" method="POST" class="register" enctype="multipart/form-data">
        <?php
            if (isset($_POST['submit'])) {
                $id_typeHome = $_POST['id_typeHome'];
                $nameHome = $_POST['nameHome'];
                $priceHome = $_POST['priceHome'];
                $price = (float)$priceHome;
                $priceSale = $_POST['priceSale'];
                $sale = (float)$priceSale;
                $area = $_POST['areaHome'];
                $address = $_POST['address'];
                $room = $_POST['numberRoom'];
                $bed = $_POST['numberBedRoom'];
                $bath = $_POST['numberBathRoom'];
                $des =  $_POST['description'];
                if (isset($_FILES['image1']['name'])) {
                    $image_name = $_FILES['image1']['name'];
                    if ($image_name != "") {
                        $source_path = $_FILES['image1']['tmp_name'];

                        $dess_path = "../image/image_database/" . $image_name;

                        $upload = move_uploaded_file($source_path, $dess_path);
                        if ($upload == FALSE) {
                            die();
                        }
                    }
                } else {
                    $image_name = "home_default.jpg";
                }


                if (isset($_FILES['image2']['name'])) {
                    $image_name2 = $_FILES['image2']['name'];
                    if ($image_name2 != "") {
                        $source_path = $_FILES['image2']['tmp_name'];

                        $dess_path = "../image/image_database/" . $image_name2;

                        $upload = move_uploaded_file($source_path, $dess_path);
                        if ($upload == FALSE) {
                            die();
                        }
                    }
                } else {
                    $image_name2 = "home_default.jpg";
                }

                if (isset($_FILES['image3']['name'])) {
                    $image_name3 = $_FILES['image3']['name'];
                    if ($image_name3 != "") {
                        $source_path = $_FILES['image3']['tmp_name'];

                        $dess_path = "../image/image_database/" . $image_name3;

                        $upload = move_uploaded_file($source_path, $dess_path);
                        if ($upload == FALSE) {
                            die();
                        }
                    }
                } else {
                    $image_name3 = "home_default.jpg";
                }

                if (isset($_FILES['image4']['name'])) {
                    $image_name4 = $_FILES['image4']['name'];
                    if ($image_name4 != "") {
                        $source_path = $_FILES['image4']['tmp_name'];

                        $dess_path = "../image/image_database/" . $image_name4;

                        $upload = move_uploaded_file($source_path, $dess_path);
                        if ($upload == FALSE) {
                            die();
                        }
                    }
                } else {
                    $image_name4 = "home_default.jpg";
                }

                if (isset($_FILES['image5']['name'])) {
                    $image_name5 = $_FILES['image5']['name'];
                    if ($image_name5 != "") {
                        $source_path = $_FILES['image5']['tmp_name'];

                        $dess_path = "../image/image_database/" . $image_name5;

                        $upload = move_uploaded_file($source_path, $dess_path);
                        if ($upload == FALSE) {
                            die();
                        }
                    }
                } else {
                    $image_name5 = "home_default.jpg";
                }

                $sql1 = "INSERT INTO tb_home(id_typeHome, name_home, price, priceSale, area_home, address_home, numberRoom, numberBedRoom, numberBathRoom, description, image1, image2, image3, image4, image5, status)
                                VALUES($id_typeHome, '$nameHome', '$price', '$sale', '$area','$address',  '$room', '$bed', '$bath', '$des', '$image_name', '$image_name2', '$image_name3', '$image_name4', '$image_name5', 1)";

                $res1 = mysqli_query($conn, $sql1);
                if ($res1 == TRUE) {
                    header("Location:home.php");
                } else {
                    header("Location:add_home.php");
                }
            }
        ?>
        <div class="inputBox">
            <div class="input">
                <span>Loại nhà</span>
                <select name="id_typeHome" class="typeAccount">
                    <?php
                    $sql = "SELECT * FROM tb_typeHome WHERE status = 1";
                    $res = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($res)) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            echo '<option value="' . $row['id_typeHome'] . '">' . $row['name_typeHome'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="input">
                <span>Tên căn hộ</span>
                <input type="text" name="nameHome" placeholder="Nhập tên căn hộ">
            </div>
        </div>
        <div class="inputBox">
            <div class="input">
                <span>Giá bán</span>
                <input type="text" name="priceHome" placeholder="Nhập giá">
            </div>
            <div class="input">
                <span>Giảm giá</span>
                <input type="text" name="priceSale" placeholder="Nhập giảm giá (Nếu có)">
            </div>
        </div>

        <div class="inputBox">
            <div class="input">
                <span>Diện tích</span>
                <input type="text" name="areaHome" placeholder="Diện tích">
            </div>
            <div class="input">
                <span>Địa chỉ</span>
                <input type="text" name="address" placeholder="Địa chỉ nhà">
            </div>
        </div>

        <div class="inputBox">
            <div class="input">
                <span>Số phòng khách</span>
                <select name="numberRoom" class="typeAccount">
                    <option value="1">1 phòng</option>
                    <option value="2">2 phòng</option>
                    <option value="3">3 phòng</option>
                    <option value="4">4 phòng</option>
                    <option value="5">5 phòng</option>
                    <option value="6">6 phòng</option>
                    <option value="7">7 phòng</option>
                </select>
            </div>
            <div class="input">
                <span>Số phòng ngủ</span>
                <select name="numberBedRoom" class="typeAccount">
                    <option value="1">1 phòng</option>
                    <option value="2">2 phòng</option>
                    <option value="3">3 phòng</option>
                    <option value="4">4 phòng</option>
                    <option value="5">5 phòng</option>
                    <option value="6">6 phòng</option>
                    <option value="7">7 phòng</option>
                </select>
            </div>
        </div>

        <div class="inputBox">
            <div class="input">
                <span>Số phòng tắm</span>
                <select name="numberBathRoom" class="typeAccount">
                    <option value="1">1 phòng</option>
                    <option value="2">2 phòng</option>
                    <option value="3">3 phòng</option>
                    <option value="4">4 phòng</option>
                    <option value="5">5 phòng</option>
                    <option value="6">6 phòng</option>
                    <option value="7">7 phòng</option>
                </select>
            </div>
            <div class="input">
                <span>Mô tả</span>
                <textarea cols="30" name="description" rows="5"></textarea>
            </div>
        </div>
        <div class="inputBox">
            <div class="inputImage">
                <span>Hình ảnh 1</span>
                <input type="file" name="image1">
            </div>

            <div class="inputImage">
                <span>Hình ảnh 2</span>
                <input type="file" name="image2">
            </div>

            <div class="inputImage">
                <span>Hình ảnh 3</span>
                <input type="file" name="image3">
            </div>

            <div class="inputImage">
                <span>Hình ảnh 4</span>
                <input type="file" name="image4">
            </div>

            <div class="inputImage">
                <span>Hình ảnh 5</span>
                <input type="file" name="image5">
            </div>
        </div>
        <input style="padding: 0.9rem 2rem;" type="submit" name="submit" value="Thêm mới" class="btn">
        <a href="home.php" class="btn btn-add btn-cancel">Hủy bỏ</a>
    </form>

</section>
<?php
include('footer.php');
?>