<?php require "../inc/admin/header.php"; ?>
<?php
    if(empty($_GET['id']))
        header("Location: quan-ly-tin-dang.php");

    $tinDangQuery = mysqli_query($conn, "Select * From tindang inner join khuvucquan on tindang.MaQuan=khuvucquan.MaQuan Where MaTinDang='".$_GET['id']."'");
    $img = array();
    if($tinDangQuery->num_rows>0){
        while($tinDang = $tinDangQuery->fetch_assoc()){
            $tieuDe = $tinDang['TieuDeTinDang'];
            $sdt = $tinDang['SDTLienHe'];
            $diaChi = $tinDang['DiaChiThue'];
            $dienTich = $tinDang['DienTich'];
            $giaThue = $tinDang['GiaThue'];
            $moTa = $tinDang['MoTaTinDang'];
            if($tinDang['Img1'] != '') array_push($img, $tinDang['Img1']);
            if($tinDang['Img2'] != '') array_push($img, $tinDang['Img2']);
            if($tinDang['Img3'] != '') array_push($img, $tinDang['Img3']);
            $img1 = $tinDang['Img1'];
            $img2 = $tinDang['Img2'];
            $img3 = $tinDang['Img3'];
            $thoiGianDang = $tinDang['ThoiGianDang'];
            $trangThai = $tinDang['KiemDuyet'];
            $nguoiDang = $tinDang['TenTaiKhoan'];
            $khuVuc = $tinDang['TenQuan'];
        }
        
    }
?>
                    <div class="tab-content">
                        <div class="user-management active" id="user">
                            <div class="qly-user">
                                <div class="qly-user-title">
                                    <h3>Chi tiết tin đăng - <?php echo $_GET['id'] ?></h3>
                                </div>
                            </div>
                            <div class="qly-user-main">
                                <div class="qly-content">
                                    <div class="flex">
                                        <div class="btn-lock">
                                            <?php
                                                if($trangThai == 'Đã duyệt')
                                                    echo '<a href="#" onclick="boDuyetTinDang(\''.$_GET['id'].'\')"><i class="fa-solid fa-xmark"></i> Bỏ duyệt</a>';
                                                else
                                                    echo '<a href="#" onclick="duyetTinDang(\''.$_GET['id'].'\')"><i class="fa-solid fa-check"></i> Duyệt</a>';
                                            ?>
                                        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <div>
                                            <a class="color-delete" href="#" onclick="xoaTinDang('P54250862')"><i class="fa-solid fa-trash"></i> Xóa</a>
                                        </div>
                                    </div><hr>
                                    
                                    <table class="table">
                                        <tr>
                                            <th>Người đăng</th>
                                            <th><a href="#"><?php echo $nguoiDang ?></a></th>
                                        </tr>
                                        <tr>
                                            <th>Tiêu đề</th>
                                            <th><?php echo $tieuDe ?></th>
                                        </tr>
                                        <tr>
                                            <th>Khu vực</th>
                                            <th><?php echo $khuVuc ?></th>
                                        </tr>
                                        <tr>
                                            <th>Địa chỉ</th>
                                            <th><?php echo $diaChi ?></th>
                                        </tr>
                                        <tr>
                                            <th>Diện tích</th>
                                            <th><?php echo $dienTich ?> m2</th>
                                        </tr>
                                        <tr>
                                            <th>Giá thuê</th>
                                            <th><?php echo $giaThue ?> triệu đ/tháng</th>
                                        </tr>
                                        <tr>
                                            <th>Số điện thoại liên hệ</th>
                                            <th><?php echo $sdt ?></th>
                                        </tr>
                                        <tr>
                                            <th>Mô tả</th>
                                            <th><?php echo $moTa ?></th>
                                        </tr>
                                        <tr>
                                            <th>Trạng thái</th>
                                            <th><?php echo $trangThai ?></th>
                                        </tr>
                                    </table>
                                    <h5>Ảnh tin đăng</h5>
                                    <div class="flex">
                                        <?php
                                            foreach ($img as $item) {
                                        ?>
                                        <div class="width-30 border padding-10-2">
                                            <img src="../img/tin-dang/<?php echo $item ?>" alt="" width="100%">
                                        </div>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    <hr>
                                    <h4>Đánh giá:</h4>
                                    <div>
                                        <hr>
                                        <?php
                                            $danhGiaQuery = mysqli_query($conn, "Select * From danhgia inner join taikhoan on danhgia.TenTaiKhoan=taikhoan.TenTaiKhoan Where MaTinDang='".$_GET['id']."'");
                                            if($danhGiaQuery->num_rows>0){
                                                while($danhGia = $danhGiaQuery->fetch_assoc()){
                                        ?>
                                        <div>
                                            <div class="flex">
                                                <h5><span><i class="fas fa-user-circle"></i></span> <?php echo $danhGia['TenTaiKhoan'] ?></h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <h6><i class="far fa-clock"></i>&nbsp;<?php $time = strtotime($danhGia['ThoiGianDanhGia']); $thoiGianDanhGia = date('H:i | d-m-Y',$time); echo $thoiGianDanhGia; ?></h6>
                                            </div>
                                            <h5><?php echo $danhGia['BinhLuan'] ?></h5>
                                        </div><hr>
                                        <?php
                                                }
                                            }
                                        ?>
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