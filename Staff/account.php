<?php
    include('header.php');
?>
    <main>
        <a href="add_account.php" class="btn btn-add"><i class="fa-solid fa-plus"></i> Thêm tài khoản</a>        <div>
            <!-- <h2 style="font-weight: 400; color:green; margin-top: 2rem;">Thêm thành công!</h2> -->
        </div>
        <section class="recent">
            <div class="activity-grid">
                <div class="activity-card">
                    <h3>Quản lý tài khoản người dùng</h3>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Ngày đăng ký</th>                                   
                                    <th>Loại tài khoản</th>
                                    <th>Trạng thái</th>
                                    <th>Xem chi tiết</th>
                                    <th>Khóa / Mở</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- CODE PHP -->
                                <?php
                                    $sql = "SELECT * FROM tb_user ORDER BY levelUser";
                                    $res = mysqli_query($conn, $sql);
                                    if($res == TRUE)
                                    {
                                        $count = mysqli_num_rows($res);
                                        if($count>0)
                                        {
                                            while($row = mysqli_fetch_assoc($res))
                                            {
                                                $id_user = $row['id_user'];
                                                $firstName = $row['firstName'];
                                                $lastName = $row['lastName'];
                                                $email = $row['email'];
                                                $user_pass = $row['user_pass'];
                                                $phone = $row['phoneNumber'];
                                                $gender = $row['gender'];
                                                $birthday =  $row['birthday'];
                                                $regisdate = $row['regisdate'];
                                                $level = $row['levelUser'];
                                                $status = $row['status'];
                                                $address = $row['address'];
                                             
                                                
                                ?>
                                                <tr>                                                        
                                                    <td><?php echo $email; ?></td> 
                                                    <td><?php echo $phone; ?></td>     
                                                    <td>
                                                        <?php
                                                            if($regisdate== null)
                                                            {
                                                                 ?>
                                                                <span>Không có dữ liệu</span>
                                                                 <?php
                                                                }  
                                                                else{
                                                                    ?>
                                                                    <span> <?php echo $regisdate = date("d-m-Y", strtotime($regisdate)); ?> </span>
                                                                    <?php
                                                                }
                                                        ?>
                                                    </td>   
                                                    <td>
                                                        <?php
                                                            if($level== null)
                                                            {
                                                                ?>
                                                                <span>Không có dữ liệu</span>
                                                                <?php
                                                            }
                                                            if($level == 1)
                                                            {
                                                                ?>
                                                                <span>Admin</span>
                                                                <?php
                                                            }
                                                            if($level== 2)
                                                            {
                                                                ?>
                                                                <span>Nhân viên</span>
                                                                <?php
                                                            }
                                                            if($level== 3)
                                                            {
                                                                ?>
                                                                <span>Khách hàng</span>
                                                                <?php
                                                            }
                                                        ?>
                                                    </td>              
                                                    <td>
                                                        <?php
                                                            if($firstName != null && $lastName != null && $gender != null && $address != null && $email != null && $phone != null)
                                                            {
                                                                ?>
                                                                <span class="badge success">Active</span>
                                                                <?php
                                                            }
                                                            if($firstName == null || $lastName == null || $gender == null || $address == null || $email == null || $phone == null)
                                                            {
                                                                ?>
                                                                <span class="badge warning">Chưa đủ dữ liệu</span>
                                                                <?php
                                                            }
                                                        ?>
                                                    </td>                                                                
                                                    <td>
                                                        <a href="view_account.php?id_user=<?php echo $id_user; ?>" class="update-icon">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if($status == 1 || $status == 2)
                                                            {
                                                                ?>
                                                                    <a href="lock_account.php?id_user=<?php echo $id_user; ?>" class="delete-icon">
                                                                    <i class="fa-solid fa-lock-open"></i>
                                                                <?php
                                                            }
                                                            if($status ==3)
                                                            {
                                                                ?>
                                                                    <a href="unlock_account.php?id_user=<?php echo $id_user; ?>" class="delete-icon">
                                                                    <i class="fa-solid fa-lock"></i>
                                                                <?php
                                                            }
                                                        ?>

                                                        
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