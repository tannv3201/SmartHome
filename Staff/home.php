<?php
    include('header.php');
?>
    <main>
        <a href="add_home.php" class="btn btn-add"><i class="fa-solid fa-house-circle-check"></i> Thêm mới nhà</a>
        <section class="recent">
            <div class="activity-grid">
                <div class="activity-card">
                    <h3>Quản lý thông tin nhà</h3>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Loại nhà</th>
                                    <th>Tên nhà</th>
                                    <th>Giá bán</th>
                                    <th>Sale</th>
                                    <th>Diện tích</th>
                                    <th>Chi tiết</th>
                                    <th>Xóa bỏ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- CODE PHP -->
                                <?php
                                    $sql = "SELECT * FROM tb_typeHome, tb_home Where tb_typeHome.id_typeHome = tb_home.id_typeHome and tb_typeHome.status = 1 and tb_home.status = 1";
                                    $res = mysqli_query($conn, $sql);
                                    if($res == TRUE)
                                    {
                                        $count = mysqli_num_rows($res);
                                        if($count>0)
                                        {
                                            while($row = mysqli_fetch_assoc($res))
                                            {
                                                $id_home = $row['id_home'];
                                                $name_typeHome = $row['name_typeHome'];
                                                $name_home = $row['name_home'];
                                                $price = $row['price'];
                                                $priceSale = $row['priceSale'];
                                                $area = $row['area_home'];
                                                $address = $row['address_home'];
                                                $numberRoom = $row['numberRoom'];
                                                $numberBedRoom = $row['numberBedRoom'];
                                                $numberBathRoom = $row['numberBathRoom'];    
                                                
                                ?>
                                                <tr>
                                                    <td><?php echo $name_typeHome; ?></td>
                                                    <td><?php echo $name_home; ?></td>            
                                                    <td><?php echo number_format($price, 0, '.', '.'); ?> VND</td>                                                        
                                                    <td><?php echo $priceSale; ?> %</td>                                                        
                                                    <td><?php echo $area; ?> m²</td>  
                                                    <td>
                                                        <a href="view_home.php?id_home=<?php echo $id_home; ?>" class="update-icon">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                            <a href="delete_home.php?id_home=<?php echo $id_home; ?>" class="delete-icon">
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