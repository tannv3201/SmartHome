<?php
include('header.php');
?>
<section class="view" id="order">
    <section class="recent" style="margin: 8rem 0 0 1rem;">
        <div class="activity-grid">
            <div class="activity-card">
                <h3>Thêm nhân viên</h3>

            </div>
        </div>
    </section>
    <form action="" method="POST" class="register" enctype="multipart/form-data">
        <!-- INSERT -->
        <?php
            if(isset($_POST['submit'])){
                $id_staff = $_POST['id_staff'];
                $daySalary = $_POST['daySalary'];
                
                $sql1 = "INSERT INTO tb_staff(id_staff, daySalary) VALUES($id_staff, '$daySalary')";
                $res1 = mysqli_query($conn, $sql1);
                if($res1 == true){
                    $sql2 = "UPDATE tb_user SET status = 2 where id_user = '$id_staff'";
                    $res2 = mysqli_query($conn, $sql2);
                    if($res2 == true){
                        header("Location:staff.php");
                    }
                    else{
                        header("Loaction:add_staff.php");
                    }
                }
                else{
                    header("Loaction:add_staff.php");
                }
            }
        ?>
        <div class="inputBox">
            <div class="input">
                <span>Họ & Tên nhân viên</span>
                <select name="id_staff" style="display:block;" class="typeAccount">
                    <?php
                    // Tìm ra tài khoản nhân viên chưa được thêm vào bảng nhân viên
                    $sql = "SELECT * FROM tb_user WHERE levelUser = 2 AND status = 1 ORDER BY lastName";
                    $res = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($res)) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            $firstName = $row['firstName'];
                            $lastName = $row['lastName'];
                            $name = $firstName.' '.$lastName; 
                            echo '<option value="' . $row['id_user'] . '">' . $name . '</option>';
                        }
                    }
                    ?>
                </select> 

                <span>Mức lương</span>
                <select name="daySalary" style="display:block;" class="typeAccount">
                    <option value="300.000">300.000 VND</option>
                    <option value="400.000">400.000 VND</option>
                    <option value="500.000">500.000 VND</option>
                    <option value="1.000.000">1.000.000 VND</option>
                    <option value="2.000.000">2.000.000 VND</option>
                </select>
                
            </div>
        </div>
        <input style="padding: 0.9rem 2rem;" type="submit" name="submit" value="Thêm nhân viên" class="btn">
        <a href="staff.php" class="btn btn-add btn-cancel">Hủy bỏ</a>
    </form>

</section>
<?php
include('footer.php');
?>