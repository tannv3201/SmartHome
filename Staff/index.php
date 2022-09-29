<?php
include('header.php');
?>
<main>
    <div class="dash-cards">
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
                    <h4><?php echo $count1; ?></h4>
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
                    <h4><?php echo $count3; ?></h4>
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
                    <h4><?php echo $count2; ?></h4>
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
                <h3>Thông tin căn hộ</h3>
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
                            if ($res == TRUE) {
                                $count = mysqli_num_rows($res);
                                if ($count > 0) {
                                    while ($row = mysqli_fetch_assoc($res)) {
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
                                } else {
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