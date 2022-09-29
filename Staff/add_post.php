<?php
include('header.php');
?>
<section class="view" id="order">
    <section class="recent" style="margin: 8rem 0 0 1rem;">
        <div class="activity-grid">
            <div class="activity-card">
                <h3>Thêm bài viết</h3>
            </div>
        </div>
    </section>
    <form action="" method="POST" class="register" enctype="multipart/form-data">
        <?php
            if (isset($_POST['submit'])) {
                $title = $_POST['title'];
                $content = $_POST['content'];
                if (isset($_FILES['image_post']['name'])) {
                    $image_name = $_FILES['image_post']['name'];
                    if ($image_name != "") {
                        $source_path = $_FILES['image_post']['tmp_name'];

                        $dess_path = "../image/image_database/" . $image_name;

                        $upload = move_uploaded_file($source_path, $dess_path);
                        if ($upload == FALSE) {
                            die();
                        }
                    }
                } else {
                    $image_name = "post_default.jpg";
                }

                $sql1 = "INSERT INTO tb_post(postTitle, postContent, idWriter, img_post, status)
                        VALUES('$title', '$content', $id_admin, '$image_name', 1)";
                $res1 = mysqli_query($conn, $sql1);
                if ($res1 == TRUE) {
                    header("Location:post.php");
                } else {

                    header("Location:add_post.php");
                }
            }
        ?>
        <div class="inputBox">
            <div class="input">
                <span>Tiêu đề</span>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="input">
            </div>
        </div>

        <div class="inputBox">
            <div class="input" style="margin-top: 1rem;">
                <span>Nội dung bài viết</span>
                <textarea cols="30" name="content" rows="5"></textarea>
            </div>
        </div>

        <div class="inputBox">
            <div class="inputImage">
                <span>Hình ảnh</span>
                <input type="file" name="image_post" >
            </div>
        </div>
        <input style="padding: 0.9rem 2rem;" type="submit" name="submit" value="Tạo bài viết" class="btn">
        <a href="post.php" class="btn btn-add btn-cancel">Hủy bỏ</a>
    </form>

</section>
<?php
include('footer.php');
?>