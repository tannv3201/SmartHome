<?php
    include('header.php');
?>
    <main>
        <a href="add_staff.php" class="btn btn-add"><i class="fas fa-user-plus"></i> Thêm nhân viên</a>
        <div>
            <!-- <h2 style="font-weight: 400; color:green; margin-top: 2rem;">Thêm thành công!</h2> -->
        </div>
        <section class="recent">
            <div class="activity-grid">
                <div class="activity-card">
                    <h3>Quản lý nhân viên</h3>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Họ & Tên</th>
                                    <th>Giới tính</th>
                                    <th>Mức lương</th>
                                    <th>Làm từ ngày</th>
                                    <th>Hình ảnh</th>
                                    <th>Xem chi tiết</th>
                                    <th>Xóa nv</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- CODE PHP -->
                                <?php
                                    $sql = "SELECT * from tb_user u, tb_staff s WHERE u.id_user = s.id_staff and u.status = 2 Order by u.lastName";
                                    $res = mysqli_query($conn, $sql);
                                    if($res == TRUE)
                                    {
                                        $count = mysqli_num_rows($res);
                                        if($count>0)
                                        {
                                            while($row = mysqli_fetch_assoc($res))
                                            {
                                                $id_staff = $row['id_user'];
                                                $firstName = $row['firstName'];
                                                $lastName = $row['lastName'];
                                                $gender = $row['gender'];
                                                $daySalary = $row['daySalary'];
                                                $dayStart = $row['dayStart'];
                                                $birthday = $row['birthday'];
                                                $image = $row['image'];
                                                
                                ?>
                                                <tr>
                                                    <td><?php echo $firstName.' '.$lastName;?></td>  
                                                    <td>
                                                       <?php
                                                            if($gender == null){
                                                                ?>
                                                                <span >Không có dữ liệu</span>
                                                                <?php
                                                            }
                                                            if($gender == 1){
                                                                ?>
                                                                <span style="margin-left: 1.5rem;">Nam</span>
                                                                <?php
                                                            }
                                                            if($gender == 2){
                                                                ?>
                                                                <span style="margin-left: 1.5rem;">Nữ</span>
                                                                <?php
                                                            }
                                                       ?>
                                                    </td>                                                      
                                                    <td><?php echo $daySalary;?> VND</td>    
                                                                    
                                                    <td>
                                                        <?php
                                                            if($dayStart== null)
                                                            {
                                                                 ?>
                                                                <span>Không có dữ liệu</span>
                                                                 <?php
                                                                }  
                                                                else{
                                                                    ?>
                                                                    <span style="margin-left: 1.5rem;"> <?php echo $dayStart = date("d-m-Y", strtotime($dayStart)); ?> </span>
                                                                    <?php
                                                                }
                                                        ?>
                                                    </td> 
                                                    <td class="td-team">
                                                        <div class="img-1 img_alone">
                                                            <?php 
                                                            if($image != null)
                                                            {
                                                                ?>
                                                                <img style = "margin-left: 10px;" src="../image/<?php echo $image?>" alt="">
                                                                <?php
                                                            }
                                                            else{
                                                                echo "Không có ảnh";
                                                            }
                                                            ?>
                                                        </div>
                                                    </td>   
                                                                                                
                                                    <td>
                                                        <a style="margin-left: 3rem;" href="view_staff.php?id_staff=<?php echo $id_staff; ?>" class="update-icon">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                            <a href="delete_staff.php?id_staff=<?php echo $id_staff; ?>" class="delete-icon">
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