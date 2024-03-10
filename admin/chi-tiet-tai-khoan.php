<?php require "../inc/admin/header.php"; ?>

<?php
    if(empty($_GET['id']))
        header("Location: index.php");

    $taiKhoanQuery = mysqli_query($conn, "Select * From taikhoan Where TenTaiKhoan='".$_GET['id']."'");
    if($taiKhoanQuery->num_rows>0){
        while($taiKhoan = $taiKhoanQuery->fetch_assoc()){
            $email = $taiKhoan['Email'];
            $sdt = $taiKhoan['SDT'];
            $hoTen = $taiKhoan['HoTen'];
            $diaChi = $taiKhoan['DiaChi'];
            $trangThai = $taiKhoan['TrangThaiTaiKhoan'];
        }
    }else
        header("Location: index.php");
?>

                    <div class="tab-content">
                        <div class="user-management active" id="user">
                            <div class="qly-user">
                                <div class="qly-user-title">
                                    <h3>Chi tiết tài khoản - <?php echo $_GET['id'] ?></h3>
                                </div>
                            </div>
                            <div class="qly-user-main">
                                <div class="qly-content">
                                    <div class="flex">
                                        <div class="btn-lock">
                                            <?php
                                                if($trangThai == 'Đang hoạt động')
                                                    echo '<a href="#" onclick="khoaTaiKhoan(\''.$_GET['id'].'\')"><i class="fa-solid fa-xmark"></i> Khóa</a>';
                                                else
                                                    echo '<a href="#" onclick="moKhoaTaiKhoan(\''.$_GET['id'].'\')"><i class="fa-solid fa-check"></i> Mở khóa</a>';
                                            ?>
                                        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <div>
                                            <a class="color-delete" href="#" onclick="xoaTaiKhoan('<?php echo $_GET['id'] ?>')"><i class="fa-solid fa-trash"></i> Xóa</a>
                                        </div>
                                    </div><hr>
                                    <table class="table">
                                        <tr>
                                            <th>Họ tên</th>
                                            <th><?php echo $hoTen ?></th>
                                        </tr>
                                        <tr>
                                            <th>Địa chỉ</th>
                                            <th><?php echo $diaChi ?></th>
                                        </tr>
                                        <tr>
                                            <th>Số điện thoại</th>
                                            <th><?php echo $sdt ?></th>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <th><?php echo $email ?></th>
                                        </tr>
                                        <tr>
                                            <th>Trạng thái</th>
                                            <th><?php echo $trangThai ?></th>
                                        </tr>
                                    </table>
                                    <h4>Danh sách tin đăng</h4>
                                    <div class="row list-user">
                                        <table class="table">
                                            <thead class="head-table">
                                                <tr>
                                                    <th scope="col">Mã tin đăng</th>
                                                    <th scope="col">Tiêu đề</th>
                                                    <th scope="col">Số điện thoại</th>
                                                    <th scope="col">Địa chỉ</th>
                                                    <th scope="col">Thời gian đăng</th>
                                                    <th scope="col">Trạng thái</th>
                                                    <th scope="col">Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $dsTinDangQuery = mysqli_query($conn, "Select * From tindang Where TenTaiKhoan='".$_GET['id']."'");
                                                    if($dsTinDangQuery->num_rows>0){
                                                        while($dsTinDang = $dsTinDangQuery->fetch_assoc()){
                                                ?>
                                                <tr>
                                                    <th><?php echo $dsTinDang['MaTinDang'] ?></th>
                                                    <td><?php echo $dsTinDang['TieuDeTinDang'] ?></td>
                                                    <td><?php echo $dsTinDang['SDTLienHe'] ?></td>
                                                    <td><?php echo $dsTinDang['DiaChiThue'] ?></td>
                                                    <td><?php echo $dsTinDang['ThoiGianDang'] ?></td>
                                                    <td>
                                                        <div class="hoatdong">
                                                            <?php
                                                                if($dsTinDang['KiemDuyet'] == 'Chưa duyệt'){
                                                            ?>
                                                            <div class="status-detail">
                                                                <i class="fa-solid fa-circle off"></i> <?php echo $dsTinDang['KiemDuyet'] ?>
                                                            </div>
                                                            <div class="btn-lock">
                                                                <a href="#" onclick="duyetTinDang('<?php echo $dsTinDang['MaTinDang'] ?>')"><i class="fa-solid fa-check"></i> Duyệt</a>
                                                            </div>
                                                            <?php
                                                                }else{
                                                            ?>
                                                            <div class="status-detail">
                                                                <i class="fa-solid fa-circle on"></i> <?php echo $dsTinDang['KiemDuyet'] ?>
                                                            </div>
                                                            <div class="btn-unlock">
                                                                <a href="#" onclick="boDuyetTinDang('<?php echo $dsTinDang['MaTinDang'] ?>')"><i class="fa-solid fa-xmark"></i> Bỏ duyệt</a>
                                                            </div>
                                                            <?php
                                                                }
                                                            ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="thaotac">
                                                            <div class="btn-update">
                                                                <a href="chi-tiet-tin-dang.php?id=<?php echo $dsTinDang['MaTinDang'] ?>"><i class="fas fa-eye"></i> Xem</a>
                                                            </div>
                                                            <div class="btn-delete">
                                                                <a class="color-delete" href="#" onclick="xoaTinDang('<?php echo $dsTinDang['MaTinDang'] ?>')"><i class="fa-solid fa-trash"></i> Xóa</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php require "../inc/admin/footer.php" ?>