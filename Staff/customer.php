<?php
    include('header.php');
?>
    <main>
        <section class="recent">
            <div class="activity-grid">
                <div class="activity-card">
                    <h3>Thông tin khách hàng</h3>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Họ & Tên</th>
                                    <th>Địa chỉ</th>
                                    <th>Phone</th>
                                    <th>Số CCCD</th>
                                    <th>Ngày cấp</th>
                                    <th>Mặt trước</th>                                   
                                    <th>Mặt sau</th>
                                    <th>Khóa / Mở</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- CODE PHP -->
                                <?php
                                    $sql = "SELECT * FROM tb_user u, tb_customer c where u.id_user = c.id_customer and levelUser = 3";
                                    $res = mysqli_query($conn, $sql);
                                    if($res == TRUE)
                                    {
                                        $count = mysqli_num_rows($res);
                                        if($count>0)
                                        {
                                            while($row = mysqli_fetch_assoc($res))
                                            {
                                                $id_customer = $row['id_user'];
                                                $firstName = $row['firstName'];
                                                $address = $row['address'];
                                                $lastName = $row['lastName'];
                                                $gender = $row['gender'];
                                                $phone = $row['phoneNumber'];
                                                $cardNumber = $row['cardNumber'];
                                                $dateRange = $row['dateRange'];
                                                $isuseBy =  $row['isuseBy'];
                                                $imgFront = $row['imageFront'];
                                                $imgBack = $row['imageBack'];
                                                $status = $row['status'];
                                                
                                ?>
                                                <tr>
                                                    <td><?php echo $firstName.' '.$lastName; ?></td>            
                                                    <td><?php echo $address; ?></td>                                                     
                                                    <td><?php echo $phone; ?></td>                                                     
                                                    <td><?php echo $cardNumber; ?></td>   
                                                    <td>
                                                        <?php
                                                            if($dateRange != null)
                                                            {
                                                                 ?>
                                                                <span><?php  echo date("d-m-Y", strtotime($dateRange));?></span>
                                                                 <?php
                                                                }  
                                                                else{
                                                                    ?>
                                                                    <span> Không có dữ liệu </span>
                                                                    <?php
                                                                }
                                                        ?>
                                                    </td>    
                                                    <td>
                                                        <?php
                                                            if($imgFront != null){
                                                                ?>
                                                                    <img src="../image/<?php echo $imgFront; ?>" alt="" width="100px">
                                                                <?php
                                                            }

                                                            else{
                                                                ?>
                                                                    <span>Không có ảnh</span>
                                                                <?php
                                                            }
                                                        ?>
                                                        
                                                    </td>
                                                    <td>
                                                    <?php
                                                            if($imgBack != null){
                                                                ?>
                                                                    <img src="../image/<?php echo $imgBack; ?>" alt="" width="100px">
                                                                <?php
                                                            }

                                                            else{
                                                                ?>
                                                                    <span>Không có ảnh</span>
                                                                <?php
                                                            }
                                                        ?>
                                                    </td>           
                                                                                            
                                                    <td>
                                                        <?php
                                                            if($status == 1 || $status == 2)
                                                            {
                                                                ?>
                                                                    <a href="lock_customer.php?id_customer=<?php echo $id_customer; ?>" class="delete-icon">
                                                                    <i class="fa-solid fa-lock-open"></i>
                                                                <?php
                                                            }
                                                            if($status ==3)
                                                            {
                                                                ?>
                                                                    <a href="unlock_customer.php?id_customer=<?php echo $id_customer; ?>" class="delete-icon">
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