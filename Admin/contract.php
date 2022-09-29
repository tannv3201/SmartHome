<?php
    include('header.php');
?>
    <main>
        <a href="add_contract.php" class="btn btn-add"><i class="fa-solid fa-file-contract"></i> Tạo hợp đồng</a>
        <a style="margin-left: 3rem;" href="view_checkContract.php" class="btn btn-add"><i class="fa-solid fa-file-signature"></i> Hợp đồng chờ duyệt</a>
        <div>
            <!-- <h2 style="font-weight: 400; color:green; margin-top: 2rem;">Thêm thành công!</h2> -->
        </div>
        <section class="recent">
            <div class="activity-grid">
                <div class="activity-card">
                    <h3>Quản lý hợp đồng</h3>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nhân viên</th>
                                    <th>Khách hàng</th>
                                    <th>Tên căn hộ</th>
                                    <th>Ngày tạo</th>
                                    <th>Cập nhật lúc</th>
                                    <th>Trạng thái</th>
                                    <th>Chi tiết</th>
                                    <th>Hủy bỏ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- CODE PHP -->
                                <?php
                                    $sql = "SELECT * FROM tb_contract where status = 1 OR status = 3 OR status = 4";
                                    $res = mysqli_query($conn, $sql);
                                    if($res == TRUE)
                                    {
                                        $count = mysqli_num_rows($res);
                                        if($count>0)
                                        {
                                            while($row = mysqli_fetch_assoc($res))
                                            {
                                                $id_contract = $row['id_contract'];
                                                $id_home = $row['id_home'];
                                                $id_staff = $row['id_staff'];
                                                $id_customer = $row['id_customer'];
                                                $status = $row['status'];
                                                $dateCreate = $row['dateCreate'];
                                                $lastDate = $row['lastDate'];
                                                
                                ?>
                                                <tr>
                                                    <td>
                                                       <?php
                                                            $sql3 = "SELECT * FROM tb_user where id_user = $id_staff ";
                                                            $res3 = mysqli_query($conn, $sql3);
                                                            $count3 = mysqli_num_rows($res3);
                                                            if($count3 == 1){
                                                                $row3 = mysqli_fetch_assoc($res3);
                                                                $firstName2 = $row3['firstName'];
                                                                $lastName2 = $row3['lastName'];
                                                            }

                                                            echo $firstName2. " " .$lastName2;
                                                       ?>
                                                    </td>
                                                    <td>
                                                       <?php
                                                            $sql2 = "SELECT * FROM tb_user where id_user = $id_customer ";
                                                            $res2 = mysqli_query($conn, $sql2);
                                                            $count2 = mysqli_num_rows($res2);
                                                            if($count2 == 1){
                                                                $row2 = mysqli_fetch_assoc($res2);
                                                                $firstName1 = $row2['firstName'];
                                                                $lastName1 = $row2['lastName'];
                                                            }

                                                            echo $firstName1. " " .$lastName1;
                                                       ?>
                                                    </td>   

                                                      
                                                    
                                                    <td>
                                                       <?php
                                                            $sql3 = "SELECT * FROM tb_home where id_home = $id_home";
                                                            $res3 = mysqli_query($conn, $sql3);
                                                            $count3 = mysqli_num_rows($res3);
                                                            if($count3 == 1){
                                                                $row3 = mysqli_fetch_assoc($res3);
                                                                $nameHome = $row3['name_home'];
                                                            }

                                                            echo $nameHome;
                                                       ?>
                                                    </td>        
                                                    
                                                    
                                                    <td> <?php echo $dateCreate = date("d-m-Y", strtotime($dateCreate)); ?></td>
                                                    <td> <?php echo $lastDate = date("d-m-Y", strtotime($lastDate)); ?></td>
                                                    <td>
                                                        <?php
                                                            if($status==1)
                                                            {
                                                                ?>
                                                                <span class="badge success">Thành công</span>
                                                                <?php
                                                            }
                                                            if($status == 2)
                                                            {
                                                                ?>
                                                                <span class="badge warning">NV xác nhận</span>
                                                                <?php
                                                            }
                                                            if($status == 3)
                                                            {
                                                                ?>
                                                                <span class="badge warning">KHXN Thêm</span>
                                                                <?php
                                                            }
                                                            if($status == 4)
                                                            {
                                                                ?>
                                                                <span class="badge warning">KHXN Hủy</span>
                                                                <?php
                                                            }
                                                        ?>
                                                    </td>                                                                
                                                    <td>
                                                        <a href="view_contract.php?id_contract=<?php echo $id_contract; ?>" class="update-icon">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                            <a href="delete_contract.php?id_contract=<?php echo $id_contract; ?>" class="delete-icon">
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