<?php
    include('header.php');
?>
    <main>
        <div class="dash-cards">
            <div class="card-single">
                <div class="card-body">
                    <span class="fas fa-user"></span>
                    <div style="margin-left: 1rem;">
                        <?php
                            $sql = "SELECT * FROM tb_user, tb_staff where tb_user.id_user = tb_staff.id_staff and levelUser = 2 and status = 2";
                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);
                        ?>
                        <h5>Nhân viên</h5>
                        <h4><?php echo $count; ?></h4>
                        <a href="staff.php">
                            View all
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-single">
                <div class="card-body">
                    <span class="fas fa-home"></span>
                    <div style="margin-left: 1rem;">
                        <?php
                            $sql1 = "SELECT * FROM tb_home where status =1";
                            $res1 = mysqli_query($conn, $sql1);
                            $count1 = mysqli_num_rows($res1);
                        ?>
                        <h5>Số căn hộ</h5>
                        <h4><?php echo $count1;?></h4>
                        <a href="home.php">
                            View all
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-single">
                <div class="card-body">
                    <span class="fa-solid fa-file-contract"></span>
                    <div style="margin-left: 1rem;">
                        <?php
                            $sql3 = "Select * from tb_contract where status = 1 ";
                            $res3 = mysqli_query($conn, $sql3);
                            $count3 = mysqli_num_rows($res3);
                        ?>
                        <h5>Số hợp đồng</h5>
                        <h4><?php echo $count3;?></h4>
                        <a href="contract.php">
                            View all
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-single">
                <div class="card-body">
                    <span class="fa-solid fa-file-signature"></span>
                    <div style="margin-left: 1rem;">
                        <h5>HĐ chờ duyệt</h5>
                        <?php
                            $sql2 = "SELECT * FROM tb_contract where status = 2 or status = 5";
                            $res2 = mysqli_query($conn, $sql2);
                            $count2 = mysqli_num_rows($res2);
                        ?>
                        <h4><?php echo $count2;?></h4>
                        <a href="view_checkContract.php">
                            View all
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <section class="recent">
            <div class="activity-grid">
                <div class="activity-card">
                    <h3>Thông tin nhân viên</h3>
                    <div class="table-responsive">
                    <table>
                            <thead>
                                <tr>
                                    <th>Họ & tên</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Gender</th>
                                    <th>Số hợp đồng</th>
                                    <th>Số hợp đồng hủy</th>
                                    <th>Hình ảnh</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- CODE PHP -->
                                <?php
                                    $sql = "SELECT * from tb_user u, tb_staff s WHERE u.id_user = s.id_staff and u.status = 2 and u.levelUser = 2 Order by u.lastName";
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
                                                $image = $row['image'];
                                                $email = $row['email'];
                                                $phone = $row['phoneNumber'];
                                                $gender = $row['gender'];
                                                $dayStart = $row['dayStart'];
                                                
                                ?>
                                                <tr>
                                                    <td><?php echo $firstName. " ".$lastName; ?></td>            
                                                    <td><?php echo $email; ?></td>      
                                                    <td><?php echo $phone; ?></td>      
                                                    <td style="text-align: center;">
                                                       <?php
                                                            if($gender == null){
                                                                ?>
                                                                <span>Không có dữ liệu</span>
                                                                <?php
                                                            }
                                                            if($gender == 1){
                                                                ?>
                                                                <span>Nam</span>
                                                                <?php
                                                            }
                                                            if($gender == 2){
                                                                ?>
                                                                <span>Nữ</span>
                                                                <?php
                                                            }
                                                       ?>
                                                    </td>           
                                                    <td style="text-align: center;">
                                                        <span>
                                                            <?php
                                                                $sql4 = "Select COUNT(id_contract) As numberContract from tb_contract WHERE id_staff = $id_staff AND status = 1";
                                                                $res4 = mysqli_query($conn, $sql4);
                                                                $count4 = mysqli_num_rows($res4);
                                                                if($count4 == 1){
                                                                    $row4 = mysqli_fetch_assoc($res4);
                                                                    $numberContract = $row4['numberContract'];
                                                                }

                                                                echo $numberContract;
                                                            ?>
                                                            
                                                        </span>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <span>
                                                            <?php
                                                                $sql5 = "Select COUNT(id_contract) As numberContract from tb_contract WHERE id_staff = $id_staff AND status = 6";
                                                                $res5 = mysqli_query($conn, $sql5);
                                                                $count5 = mysqli_num_rows($res5);
                                                                if($count5 == 1){
                                                                    $row5 = mysqli_fetch_assoc($res5);
                                                                    $numberContract1 = $row5['numberContract'];
                                                                }

                                                                echo $numberContract1;
                                                            ?>
                                                            
                                                        </span>
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

<?php
    include('footer.php');
?>