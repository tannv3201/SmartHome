<?php
    include('header.php');
?>
    <main>
        <a href="add_post.php" class="btn btn-add"><i class="fa-solid fa-file-circle-plus"></i> Thêm bài viết</a>
        <div>
            <!-- <h2 style="font-weight: 400; color:green; margin-top: 2rem;">Thêm thành công!</h2> -->
        </div>
        <section class="recent">
            <div class="activity-grid">
                <div class="activity-card">
                    <h3>Quản lý bài viết</h3>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Tiêu đề</th>
                                    <th>Người viết</th>
                                    <th>Ngày tạo</th>
                                    <th>Trạng thái</th>
                                    <th>Duyệt bài</th>
                                    <th>Hình ảnh</th>
                                    <th>Chi tiết</th>
                                    <th>Xóa bài </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- CODE PHP -->
                                <?php
                                    $sql = "SELECT * FROM tb_post where status != 3";
                                    $res = mysqli_query($conn, $sql);
                                    if($res == TRUE)
                                    {
                                        $count = mysqli_num_rows($res);
                                        if($count>0)
                                        {
                                            while($row = mysqli_fetch_assoc($res))
                                            {
                                                $id_post = $row['id_post'];
                                                $id_writer = $row['idWriter'];
                                                $title = $row['postTitle'];
                                                $content = $row['postContent'];
                                                $date1 = $row['dateCreate'];
                                                $status = $row['status'];
                                                $image = $row['img_post'];
                                                
                                ?>
                                                <tr>
                                                    <td><?php echo $title; ?></td>
                                                    <td>
                                                       <?php
                                                            $sql1 = "SELECT * FROM tb_user where id_user = $id_writer ";
                                                            $res1 = mysqli_query($conn, $sql1);
                                                            $count1 = mysqli_num_rows($res1);
                                                            if($count1 == 1){
                                                                $row1 = mysqli_fetch_assoc($res1);
                                                                $firstName1 = $row1['firstName'];
                                                                $lastName1 = $row1['lastName'];
                                                            }

                                                            echo $firstName1. " " .$lastName1;
                                                       ?>
                                                    </td>            
                                                    <td><?php echo $date1 = date("d-m-Y", strtotime($date1)); ?></td>                                                                                                              
                                                         
                                                    <td>
                                                        <?php
                                                            if($status==1)
                                                            {
                                                                ?>
                                                                <span class="badge success">Đã duyệt</span>
                                                                <?php
                                                            }
                                                            if($status == 2)
                                                            {
                                                                ?>
                                                                <span class="badge warning">Chờ duyệt</span>
                                                                <?php
                                                            }
                                                        ?>
                                                    </td>     
                                                    
                                                    <td>
                                                        <a href="check_post.php?id_post=<?php echo $id_post; ?>" class="update-icon">
                                                             <i class="fa-solid fa-check"></i>
                                                        </a>
                                                    </td>   
                                                    <td>
                                                        <div class="img-1 img_alone">
                                                            <?php 
                                                                if($image != null){
                                                                    ?>
                                                                        <img style = "width: 70px; height: 70px;" src="../image/<?php echo $image?>" alt="">    
                                                                    <?php
                                                                }
                                                                else{
                                                                    echo "Không có ảnh";
                                                                }
                                                            ?>
                                                            
                                                        </div>
                                                    </td>                                                       
                                                    <td>
                                                        <a href="view_post.php?id_post=<?php echo $id_post; ?>" class="update-icon">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                            <a href="delete_post.php?id_post=<?php echo $id_post; ?>" class="delete-icon">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                <?php
                                            }
                                        }
                                        else
                                        {

                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php
include('footer.php');
?>