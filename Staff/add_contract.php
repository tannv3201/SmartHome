<?php
include('header.php');
?>
<section class="view" id="order">
    <section class="recent" style="margin: 8rem 0 0 1rem;">
        <div class="activity-grid">
            <div class="activity-card">
                <h3>Tạo hợp đồng</h3>
            </div>
        </div>
    </section>
    <form action="" method="POST" class="register">
        <!-- INSERT -->
        <?php
            if (isset($_POST['submit'])) {
                $id_admin = $_SESSION['id_staffSession'];
                $id_home = $_POST['id_homee'];
                $id_customer = $_POST['id_customer'];
                $note = $_POST['note'];

                $sql3 = "INSERT INTO tb_contract(id_home, id_customer,id_staff, note, status) VALUES($id_home, $id_customer, $id_admin, '$note', 3)";
                $res3 = mysqli_query($conn, $sql3);

                $sql4 = "Update tb_home SET status = 2 where id_home = $id_home";
                $res4 = mysqli_query($conn, $sql4);
                if($res3 == true && $res4 == true){
                    header("Location:contract.php");
                }
                else{
                    header("Location:add_contract.php");
                }
            }

            ?>

        <div class="inputBox">
            <div class="input">
                <span>Tên căn hộ</span>
                <select name="id_homee" style="display:block;" class="typeAccount">
                    <?php
                    $sql = "SELECT * FROM tb_home where status = 1";
                    $res = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($res)) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            $id_home = $row['id_home'];
                            $nameHome = $row['name_home'];
                            echo '<option value="' . $row['id_home'] . '">' . $nameHome . '</option>';
                        }
                    }
                    ?>
                </select> 
            </div>
            <div class="input">
                <span>Họ & tên khách hàng</span>
                <select name="id_customer"class="typeAccount">
                    <?php
                    $sql1 = "SELECT * FROM tb_user u, tb_customer c WHERE u.id_user = c.id_customer and u.levelUser = 3 and u.status = 1";
                    $res1 = mysqli_query($conn, $sql1);

                    
                    if (mysqli_num_rows($res1)) {
                        while ($row1 = mysqli_fetch_assoc($res1)) {
                            $id_customer = $row1['id_customer'];
                            $firstName1 = $row1['firstName'];
                            $lastName1 = $row1['lastName'];
                            $phone = $row1['phoneNumber'];
                            $cardNumber = $row1['cardNumber'];
                            $front = $row1['imageFront'];
                            $back = $row1['imageBack'];
                            if($firstName1 != null && $lastName1 != null && $phone != null && $cardNumber != null && $front != null && $back != null)
                            {
                                echo '<option value="' . $id_customer . '">' . $firstName1 . " " . $lastName1 . '</option>';
                            }
                           
                        }
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="inputBox">
            <div class="input" style="margin-top: 1rem;">
                <span>Ghi chú</span>
                <textarea cols="30" name="note" rows="5"></textarea>
            </div>
        </div>
        <input style="padding: 0.9rem 2rem;" type="submit" name="submit" value="Tạo hợp đồng" class="btn">
        <a href="contract.php" class="btn btn-add btn-cancel">Hủy bỏ</a>
    </form>

</section>
<?php
include('footer.php');
?>