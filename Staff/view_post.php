<?php
include('header.php');
?>
<section class="view" id="order">

    <?php
        if(isset($_GET['id_post'])){
            $id_post = $_GET['id_post'];
        }
        $sql = "Select * from tb_post where id_post = $id_post";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if($count==1)
        {
            $row = mysqli_fetch_assoc($res);
            $post_title = $row['postTitle'];
            $post_content = $row['postContent'];
            $image = $row['img_post'];
        }
            
    ?>
    <section class="recent" style="margin: 8rem 0 0 1rem;">
        <div class="activity-grid">
            <div class="activity-card">
                <h3>Thông tin bài viết</h3>
            </div>
        </div>
    </section>
    <form action="" method="POST" class="register" enctype="multipart/form-data">
        <?php
            if (isset($_POST['submit'])) {
                $title = $_POST['title'];
                $content = $_POST['content'];
                if (isset($_FILES['img_post']['name'])) {
                    $image_name = $_FILES['img_post']['name'];
                    if ($image_name != "") {
                        $source_path = $_FILES['img_post']['tmp_name'];
    
                        $dess_path = "../image/image_database/" . $image_name;
    
                        $upload = move_uploaded_file($source_path, $dess_path);
                        if ($upload == FALSE) {
                            die();
                        }
                    }
                } else {
                    $image_name = "typeHome_default.jpg";
                }
                $sql1 = "Update tb_post Set postTitle = '$title', postContent = '$content', img_post = '$image_name', idWriter = $id_admin where id_post = $id_post";
                $res1 = mysqli_query($conn, $sql1);
                if ($res1 == TRUE) {
                    header("Location:post.php");
                } else {

                    header("Location:view_post.php");
                }
            }
        ?>
        <div class="inputBox">
            <div class="input">
                <span>Tiêu đề</span>
                <input type="text" class="form-control" value="<?php echo $post_title; ?>" name="title">
            </div>
            <div class="input">
            </div>
        </div>

        <div class="inputBox">
            <div class="input" style="margin-top: 1rem;">
                <span>Nội dung bài viết</span>
                <textarea cols="30" name="content" rows="5"><?php echo $post_content;?></textarea>
            </div>
        </div>

        <div class="inputBox">
            <div class="inputImage">
                <span>Hình ảnh</span>
                <input type="file" name="img_post" value="<?php echo $image; ?>">
            </div>
        </div>
        <input style="padding: 0.9rem 2rem;" type="submit" name="submit" value="Cập nhật" class="btn">
        <a href="post.php" class="btn btn-add btn-cancel">Hủy bỏ</a>
    </form>

</section>
<?php
include('footer.php');
?>