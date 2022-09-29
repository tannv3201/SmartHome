<?php 
   include('header.php')

?>
<head>
    <title>Trang chủ</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

</head>


    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Information personl -->
        <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img id="phongto" class="rounded-circle mt-5" src="../image/<?php echo $row2['image'] ?>" style="width :100px ;height :100px ;">
                    <span class="font-weight-bold"></span>
                    <span class="text-black-50"></span><br>
                    <span><label for="image" class="btn btn-secondary"> Ảnh đại diện</label><input disabled id="image" type="file" name="image" style="display:none;"></span>
                </div>
            </div>
            <div class="col-md-7 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h4 style="margin-left:110px" class="text-right">Thông tin cá nhân</h4>
                                                </div>
                                                <div class="row mt-6">
                                                    <div class="col-md-6"><label class="labels"> Fist Name</label>
                                                        <input disabled name="user_name" type="text" class="form-control" placeholder="Full Name" value="<?php echo $row2['firstName']; ?>">
                                                    </div>
                                                    <div class="col-md-6"><label class="labels"> Last Name</label>
                                                        <input disabled name="user_name" type="text" class="form-control" placeholder="Full Name" value="<?php echo $row2['lastName']; ?>">
                                                    </div>
                                                    <br>
                                                    <div class="col-md-6"> <label class="labels">Giới tính</label>
                                                        <div class="form-control">
                                                            <input disabled <?php if ($row2['gender'] == 1) {
                                                                                echo "checked";
                                                                            } ?> type="radio" name="gender" value="1">
                                                            <label>Nam</label>
                                                            <input disabled <?php if ($row2['gender'] == 2) {
                                                                                echo "checked";
                                                                            } ?> type="radio" name="gender" value="0">
                                                            <label>Nữ</label>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6"> <label class="labels"> Birthday</label>
                                                        <input disabled class="form-control" type="date" id="user_birthday" name="birthday" value="<?php echo $date = date("Y-m-d", strtotime($row2['birthday'])); ?>">
                                                    </div>
                                                    <div class="col-md-6"><label class="labels">Địa chỉ</label>
                                                        <input disabled name="user_phone" type="text" class="form-control" placeholder="Nhập SDT" value="<?php echo $row2['address'] ?>">
                                                    </div>
                                                    <div class="col-md-6"><label class="labels">Số điện thoại</label>
                                                        <input disabled name="user_phone" type="text" class="form-control" placeholder="Nhập SDT" value="<?php echo $row2['phoneNumber'] ?>">
                                                    </div>

                                                    <div class="col-md-6"><label class="labels">Email</label>
                                                        <input disabled name="user_email" type="email" class="form-control" placeholder="nhập email" value="<?php echo $row2['email'] ?>">
                                                    </div>                                 
                                                </div>
                                                <!-- <div class="row mt-3">
                                                                                                                               
                                                </div> -->
                                                <div class="col-md-6"><label class="labels"> Trạng thái</label>
                                                    <?php if($cc == 2 )
                                                        {
                                                            ?>
                                                            <a  class="dropdown-item" style="color: red;" href="active.php"> Tài khoản chưa xác thực</a>
                                                            <?php
                                                        }else if($cc == 1)
                                                        {
                                                            ?>
                                                            <span class="dropdown-item" style="color: green; font-style: italic;"> Đã xác thực</span>
                                                            <?php
                                                        }
                                                        else if($cc == 2)
                                                        {
                                                            ?>
                                                            <span class="dropdown-item" style="color: green; font-style: italic;"> Đang chờ xác thực</span>
                                                            <?php
                                                        }

                                                        ?>
                                                    </div>
                                                <div class="mt-5 text-center">
                                                    <a href="update_personal_information.php?id_user=<?php echo $iduser;?>"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            Sửa thông tin
                                                        </button></a>
                                                    <!-- Modal -->

                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
        <!-- End Information personl -->

       
        <?php include('footer.php')?>