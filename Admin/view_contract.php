<?php
include('header.php');
?>
<section class="view" id="order">

    <?php
    if (isset($_GET['id_contract'])) {
        $id_contract = $_GET['id_contract'];
    }
    $sql = "SELECT * FROM tb_contract WHERE id_contract = $id_contract";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    if ($count == 1) {
        $row = mysqli_fetch_assoc($res);
        $id_home = $row['id_home'];
        $id_customer = $row['id_customer'];
        $id_staff = $row['id_staff'];
        $note = $row['note'];
        $status = $row['status'];
    }

    // Lấy tên nhân viên
    $sql1 = "Select * from tb_user where id_user = $id_staff";
    $res1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($res1) == 1) {
        $row1 = mysqli_fetch_assoc($res1);
        $firstName1 = $row1['firstName'];
        $lastName1 = $row1['lastName'];
    }

    // Lấy tên khách hàng
    $sql2 = "Select * from tb_user where id_user = $id_customer";
    $res2 = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($res2) == 1) {
        $row2 = mysqli_fetch_assoc($res2);
        $firstName2 = $row2['firstName'];
        $lastName2 = $row2['lastName'];
    }

    // Lấy tên nhà
    $sql3 = "Select * from tb_home where id_home = $id_home";
    $res3 = mysqli_query($conn, $sql3);
    if (mysqli_num_rows($res3) == 1) {
        $row3 = mysqli_fetch_assoc($res3);
        $nameHome = $row3['name_home'];
    }


    ?>
    <section class="recent" style="margin: 8rem 0 0 1rem;">
        <div class="activity-grid">
            <div class="activity-card">
                <h3>Thông tin hợp đồng</h3>
            </div>
        </div>
    </section>
    <form action="" method="POST" class="register" enctype="multipart/form-data">
        <!-- Update -->
        <?php
        if (isset($_POST['submit'])) {
            $request = $_POST['note'];
            $sql4 = "UPDATE tb_contract SET note = '$request' Where id_contract = $id_contract";
            $res4 = mysqli_query($conn, $sql4);
            if ($res4 == true) {
                header("Location:contract.php");
            } else {
                header("Location:view_contract.php");
            }
        }

        ?>
        <div class="inputBox">
            <div class="input">
                <span>Họ & tên nhân viên</span>
                <input type="text" readonly class="readOnly" value="<?php echo $firstName1 . ' ' . $lastName1; ?>">
            </div>
            <div class="input">
                <span>Họ & tên khách hàng</span>
                <input type="text" readonly class="readOnly" value="<?php echo $firstName2 . ' ' . $lastName2; ?>">
            </div>
        </div>
        <div class="inputBox">
            <div class="input">
                <span>Tên nhà</span>
                <input type="text" readonly class="readOnly" value="<?php echo $nameHome; ?>">
            </div>
            <div class="input">
                <span>Ghi chú</span>
                <input type="text" name="note" value="<?php echo $note; ?>">
            </div>
        </div>

        <?php
        if ($status != 1) {
        ?>
            <input style="padding: 0.9rem 2rem;" type="submit" name="submit" value="Cập nhật" class="btn">;
        <?php
        }
        ?>

        <a href="contract.php" class="btn btn-add btn-cancel">Hủy bỏ</a>
    </form>

</section>
<?php
include('footer.php');
?>