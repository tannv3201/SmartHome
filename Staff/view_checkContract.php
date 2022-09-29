<?php
    include('header.php');
?>
    <main>
    <a href="contract.php" class="btn btn-add"><i class="fa-solid fa-file-contract"></i> Danh sách hợp đồng</a>
        <div>
            <!-- <h2 style="font-weight: 400; color:green; margin-top: 2rem;">Thêm thành công!</h2> -->
        </div>
        <section class="recent">
            <div class="activity-grid">
                <div class="activity-card">
                    <h3>Quản lý hợp đồng chờ duyệt</h3>
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
                                    <th>Duyệt</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- CODE PHP -->
                                <?php
                                    $sql = "SELECT * FROM tb_contract where status = 2 or status = 5";
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
                                                       if(is_null($id_staff)){
                                                        echo 'Chưa có nhân viên xác nhận';
                                                       }else{
                                                        $sql3 = "SELECT * FROM tb_user where id_user = $id_staff";
                                                        $res3 = mysqli_query($conn, $sql3);
                                                        $count3 = mysqli_num_rows($res3);
                                                        if($count3 == 1){
                                                            $row3 = mysqli_fetch_assoc($res3);
                                                            $firstName2 = $row3['firstName'];
                                                            $lastName2 = $row3['lastName'];
                                                        }

                                                        echo $firstName2. " " .$lastName2;
                                                       }
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
                                                            if($status == 2)
                                                            {
                                                                ?>
                                                                <span class="badge warning">NV duyệt</span>
                                                                <?php
                                                            }
                                                            if($status == 5)
                                                            {
                                                                ?>
                                                                <span class="badge warning">Xác nhận hủy</span>
                                                                <?php
                                                            }
                                                        ?>
                                                    </td>                                                                
                                                    <td>
                                                        <a href="check_contract.php?id_contract=<?php echo $id_contract; ?>" class="update-icon">
                                                            <i class="fa-solid fa-check"></i>
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