<?php
include('header.php');
?>
<section class="view" id="order">
    <section class="recent" style="margin: 8rem 0 0 1rem;">
        <div class="activity-grid">
            <div class="activity-card">
                <h3>Thêm loại căn hộ</h3>
            </div>
        </div>
    </section>
    <form action="" method="POST" enctype="multipart/form-data">
        <?php
            if (isset($_POST['submit'])) {
                $name = $_POST['nameTypeHome'];
                if (isset($_FILES['img_typeHome']['name'])) {
                    $image_name = $_FILES['img_typeHome']['name'];
                    if ($image_name != "") {
                        $source_path = $_FILES['img_typeHome']['tmp_name'];

                        $dess_path = "../image/image_database/" . $image_name;

                        $upload = move_uploaded_file($source_path, $dess_path);
                        if ($upload == FALSE) {
                            die();
                        }
                    }
                } else {
                    $image_name = "typeHome_default.jpg";
                }
                $sql = "INSERT INTO tb_typeHome(name_typeHome, img_typeHome, status) VALUES('$name', '$image_name', 1)";
                $res = mysqli_query($conn, $sql);
                if ($res == true) {
                    header("Location:typeHome.php");
                } else {
                    header("Location:add_typeHome.php");
                }
        }

        ?>
        <div class="inputBox">
            <div class="input">
                <span>Loại căn hộ</span>
                <input type="text" name="nameTypeHome" placeholder="Nhập loại căn hộ">
            </div>

        </div>
        <div class="inputBox">
            <div class="inputImage">
                <span>Hình ảnh</span>
                <input type="file" name="img_typeHome" >
            </div>
        </div>


        <input style="padding: 0.9rem 2rem;" type="submit" name="submit" value="Thêm mới" class="btn">
        <a href="typeHome.php" class="btn btn-add btn-cancel">Hủy bỏ</a>
    </form>

</section>
<?php
include('footer.php');
?>