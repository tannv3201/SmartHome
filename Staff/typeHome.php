<?php
    include('header.php');
?>
    <main>
        <a href="add_typeHome.php" class="btn btn-add"><i class="fa-solid fa-house-chimney"></i> Thêm loại nhà</a>
        <section class="recent">
            <div class="activity-grid">
                <div class="activity-card">
                    <h3>Quản lý loại nhà</h3>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Loại nhà</th>
                                    <th>Đang giao bán</th>
                                    <th>Đang đặt cọc</th>
                                    <th>Đã bán được</th>
                                    <th>Hình ảnh</th>
                                    <th>Cập nhật</th>
                                    <th>Xóa bỏ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- CODE PHP -->
                                <?php
                                    $sql = "select * from tb_typeHome Where status = 1 Order by id_typeHome";
                                    $res = mysqli_query($conn, $sql);
                                    if($res == TRUE)
                                    {
                                        $count = mysqli_num_rows($res);
                                        if($count>0)
                                        {
                                            while($row = mysqli_fetch_assoc($res))
                                            {
                                                $id_typeHome = $row['id_typeHome'];
                                                $name_typeHome = $row['name_typeHome'];
                                                $image = $row['img_typeHome'];
                                                
                                ?>
                                                <tr>
                                                    <td><?php echo $name_typeHome; ?></td>   
                                                    <td>
                                                        <span style="margin-left: 3rem;">
                                                            <?php
                                                                $sql1 = "Select COUNT(id_home) As numberHome FROM tb_home h, tb_typehome t WHERE t.id_typeHome = h.id_typeHome AND t.id_typeHome = $id_typeHome and h.status = 1";
                                                                $res1 = mysqli_query($conn, $sql1);
                                                                $count1 = mysqli_num_rows($res1);
                                                                if($count1 == 1){
                                                                    $row1 = mysqli_fetch_assoc($res1);
                                                                    $numberHome = $row1['numberHome'];
                                                                }
                                                                echo $numberHome;
                                                            ?>
                                                        </span>
                                                    </td>
                                                    
                                                    <td>
                                                        <span style="margin-left: 3rem;">
                                                            <?php
                                                                $sql2 = "Select COUNT(id_home) As numberHome FROM tb_home h, tb_typehome t WHERE t.id_typeHome = h.id_typeHome AND t.id_typeHome = $id_typeHome and h.status = 2";
                                                                $res2 = mysqli_query($conn, $sql2);
                                                                $count2 = mysqli_num_rows($res2);
                                                                if($count2 == 1){
                                                                    $row2 = mysqli_fetch_assoc($res2);
                                                                    $numberHome2 = $row2['numberHome'];
                                                                }
                                                                echo $numberHome2;
                                                            ?>
                                                        </span>
                                                    </td>

                                                    <td>
                                                        <span style="margin-left: 3rem;">
                                                            <?php
                                                                $sql2 = "Select COUNT(id_home) As numberHome FROM tb_home h, tb_typehome t WHERE t.id_typeHome = h.id_typeHome AND t.id_typeHome = $id_typeHome and h.status = 3";
                                                                $res2 = mysqli_query($conn, $sql2);
                                                                $count2 = mysqli_num_rows($res2);
                                                                if($count2 == 1){
                                                                    $row2 = mysqli_fetch_assoc($res2);
                                                                    $numberHome2 = $row2['numberHome'];
                                                                }
                                                                echo $numberHome2;
                                                            ?>
                                                        </span>
                                                    </td>
                                                    
                                                    <td>
                                                        <div class="img-1 img_alone">
                                                            <?php 
                                                                if($image != null){
                                                                    ?>
                                                                        <img style = "width: 50px; margin-left: 20px;" src="../image/<?php echo $image?>" alt="">    
                                                                    <?php
                                                                }
                                                                else{
                                                                    echo "Không có ảnh";
                                                                }
                                                            ?>
                                                            
                                                        </div>
                                                    </td>
                                                    
                                                    <td>
                                                        <a href="view_typeHome.php?id_typeHome=<?php echo $id_typeHome; ?>" class="delete-icon">
                                                            <i class="fas fa-edit"></i>
                                                    </td>                                                           
                                                    <td>
                                                            <a href="delete_typeHome.php?id_typeHome=<?php echo $id_typeHome; ?>" class="delete-icon">
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