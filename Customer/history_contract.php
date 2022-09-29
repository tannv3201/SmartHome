<?php
    include('header.php');
?>
    <main>
       <link href="css/admin.css" rel="stylesheet">
        <section class="recent">
            <div class="activity-grid history-contract">
                <div class="activity-card">
                    <h3>Lịch sử giao dịch</h3>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Mã giao dịch</th>
                                    <th>Tên nhà</th>
                                    <th>Hình ảnh</th>
                                    <th>Nhân viên phụ trách</th>
                                    <th>Xác nhận</th>
                                    <th>Hủy</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                <!-- CODE PHP -->
                                <?php
                                    $sql1 = "SELECT * FROM `tb_contract` WHERE  id_customer = '$iduser' ";
                                    $res1 = mysqli_query($conn, $sql1);    
                                    if($res1 == TRUE)
                                    {
                                        $count = mysqli_num_rows($res1);
                                        if($count>0)
                                        {
                                            while ($row1 =mysqli_fetch_array($res1)) { ?>                   
                                                <tr>
                                                    <td><?php $idcontract = $row1['id_contract']; echo $idcontract ?></td>                                   
                                                    <td>
                                                        <!-- lấy thông tin nhà -->
                                                        <?php  $idhome = $row1['id_home']; 
                                                         $sql3 = "SELECT * FROM `tb_home` WHERE id_home = '$idhome'";
                                                         $res3 = mysqli_query($conn, $sql3);
                                                         $row3 = mysqli_fetch_array($res3);
                                                         $namehome = $row3['name_home'];
                                                         $image = $row3['image1'];
                                                         echo $namehome;
                                                        ?>
                                                        <!-- end lấy thông tin nhà -->
                                                    </td>
                                                    <td><img class="img-fluid" alt="Ảnh nhà" style="width:100px; height:70px" src="../image/<?php echo $image?>"></td>     
                                                    <?php if($row1['id_staff'] == null)
                                                                {
                                                                    ?>
                                                                        <td><span style="color:  #FADB0D; font-style: italic;">Đang chờ nhân viên tiếp nhận</span></td>
                                                                    <?php
                                                                }else
                                                                {
                                                                    ?>
                                                                     <td><span style="font-weight: bold;">
                                                                        <!-- lấy thông tin nhân viên phụ trách -->
                                                                        <?php 
                                                                            $idstaff = $row1['id_staff'];
                                                                            $sql5 = "SELECT * FROM `tb_user` WHERE id_user = '$idstaff'";
                                                                            $res5 = mysqli_query($conn, $sql5);
                                                                            $row5 = mysqli_fetch_array($res5);
                                                                            $fristname = $row5['firstName'];
                                                                            $lastname = $row5['lastName'];
                                                                            echo $fristname;
                                                                            echo " ";
                                                                            echo $lastname;
                                                                        ?></span></td>
                                                                        <!-- end lấy thông tin nhân viên phụ trách -->
                                                                    <?php
                                                                }
                                                    ?>   
                                                    <?php if($row1['status'] == 3)
                                                                {
                                                                    ?>
                                                                   <td><a href="confirm_contract.php?id_contract=<?php echo $row1['id_contract']; ?>"><button name="xacnhan" type="button" class="btn btn-warning">Xác nhận</button></a></td>
                                                                    <?php
                                                                }else if($row1['status'] == 2)
                                                                {
                                                                    ?>
                                                                     <td><span style="color:  #FADB0D; font-style: italic;">Chờ phản hồi từ công ty</span></td>
                                                                    <?php
                                                                }
                                                                else if($row1['status'] == 4)
                                                                {
                                                                    ?>
                                                                     <td><span style="color: #FADB0D; font-style: italic;">Đang xử lý</span></td>
                                                                    <?php
                                                                }
                                                                else if($row1['status'] == 5)
                                                                {
                                                                    ?>
                                                                     <td><span style="color: #FADB0D; font-style: italic;">Đang xử lý</span></td>
                                                                    <?php
                                                                }
                                                                else if($row1['status'] == 6)
                                                                {
                                                                    ?>
                                                                     <td><span style="color: red; font-style: italic;">Đã hủy</span></td>
                                                                    <?php
                                                                }
                                                                else if($row1['status'] == 1)
                                                                {
                                                                    ?>
                                                                     <td><span style="color: green; font-style: italic;">Thành công</span></td>
                                                                    <?php
                                                                }
                                                                else 
                                                                {
                                                                    ?>
                                                                     <td><span style="color: #FADB0D; font-style: italic;">.......</span></td>
                                                                    <?php
                                                                }
                            
                                                    ?>
                                                     <?php if($row1['status'] == 4 || $row1['status'] == 3 || $row1['status'] == 2)
                                                                {
                                                                    ?>
                                                                  <td><a href="cancel_contract.php?id_contract=<?php echo $row1['id_contract']; ?>"><button name="huy" type="button" class="btn btn-danger text-white me-2">Hủy</button></a></td>                   
                                                                    <?php
                                                                }else
                                                                {
                                                                    ?>
                                                                     <td><span style="color: blue; font-style: italic;">Khóa</span></td>
                                                                    <?php
                                                                }
                                                    ?>                    
                                                </tr>
                                        <?php             
                                        }
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