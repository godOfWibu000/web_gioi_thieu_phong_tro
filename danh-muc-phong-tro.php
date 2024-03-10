<?php
    $redirect = '';
	require "inc/head.php";
    if(empty($_GET['danh-muc']))
        header("Location: index.php");
?>

<link rel="stylesheet" type="text/css" href="css/index.css">

<?php
	require "inc/header.php";
    $danhMuc = $_GET['danh-muc'];
    $tuKhoa = null;
    $diaDiem = null;
    if(!empty($_GET['tu-khoa']))
        $tuKhoa = $_GET['tu-khoa'];
    if(!empty($_GET['dia-diem'])){
        $diaDiem = $_GET['dia-diem'];
    }
?>

<div class="content padding-1">
	<h3>Phòng trọ khu vực <?php echo $_GET['danh-muc'] ?></h3>
<!-- Danh muc phong tro -->
    <?php
		require "inc/danh-muc.php";
	?>

<!-- Phong tro -->
    <div>
    <!-- Loc tin dang -->
        <div class="right float-right">
            <div class="back-color-white padding-10-2" style="margin-bottom: 10px;">
                <form method="get">
                    <input type="text" name="danh-muc" value="<?php echo $danhMuc ?>" hidden>
                    <label><h5>Tìm kiếm địa điểm: </h5></label><br>
                    <input class="input input-fs-20 width-70" id="select-dia-diem" name="dia-diem" list="dia-diem" required>
                    <button class="button back-color-main-1 color-white width-20">Tìm</button>
                </form>
                <datalist id="dia-diem">
                    <?php
                        $dsDiaDiemQuery = mysqli_query($conn, "Select * From khuvuc inner join khuvucquan On khuvuc.MaQuan=khuvucquan.MaQuan Where khuvucquan.TenQuan='$danhMuc'");
                        if($dsDiaDiemQuery->num_rows>0){
                            while($dsDiaDiem = $dsDiaDiemQuery->fetch_assoc()){
                                echo '
                    <option>'.$dsDiaDiem['TenKhuVuc'].'</option>
                                ';
                            }
                        }
                    ?>
                </datalist>
            </div>
            <?php
                require "inc/tin-dang/loc-tin-dang.php";
            ?>
        </div>

    <!-- Tin dang -->
        <div class="width-70 back-color-white left float-left ds-tin-dang">
        <!-- Sap xep -->
            <div class="padding-10-2">
                <div class="flex-between padding-10-0 border-bottom-1 font-size-20">
                    <select class="select-loc-sapxep" id="sap-xep" onchange="locTinDang('<?php echo $danhMuc ?>', '<?php echo $diaDiem ?>', '<?php echo $tuKhoa ?>', 1)">
                        <option value="Mới hơn">Mới hơn</option>
                        <option value="Cũ hơn">Cũ hơn</option>
                        <option value="Giá thấp hơn">Giá thấp hơn</option>
                        <option value="Giá cao hơn">Giá cao hơn</option>
                    </select>
                </div>
            </div>

        <!-- DS tin dang -->
            <div class="margin-1" id="ds-tin-dang">
                <?php
                    if(isset($_GET['dia-diem'])){
                ?>
                <div class="flex">
                    <h4 class="padding-0-10">Phòng trọ tại '<?php echo $_GET['dia-diem'] ?>'</h4>
                    <a class="a" href="danh-muc-phong-tro.php?danh-muc=<?php echo $_GET['danh-muc'] ?>"><h4>Quay lại</h4></a>
                </div>
                <?php
                        $sqlTinDang = "Select * From khuvuctindang inner join khuvuc On khuvuctindang.MaKhuVuc=khuvuc.MaKhuVuc inner join tindang On khuvuctindang.MaTinDang=tindang.MaTinDang inner join taikhoan on tindang.TenTaiKhoan=taikhoan.TenTaiKhoan inner join khuvucquan On khuvucquan.MaQuan=tindang.MaQuan Where khuvuc.TenKhuVuc='".$_GET['dia-diem']."' and tindang.KiemDuyet='Đã duyệt' and taikhoan.TrangThaiTaiKhoan='Đang hoạt động'";
                    }else
                        $sqlTinDang = "Select * From tindang inner join khuvucquan on tindang.MaQuan=khuvucquan.MaQuan inner join taikhoan on tindang.TenTaiKhoan=taikhoan.TenTaiKhoan Where khuvucquan.TenQuan='$danhMuc' and tindang.KiemDuyet='Đã duyệt' and taikhoan.TrangThaiTaiKhoan='Đang hoạt động'";
                    if(isset($_GET['tu-khoa'])){
                ?>

                <div class="flex">
                    <h4 class="padding-0-10">Kết quả tìm kiếm cho '<?php echo $_GET['tu-khoa'] ?>'</h4>
                    <a class="a" href="danh-muc-phong-tro.php?danh-muc=<?php echo $_GET['danh-muc'] ?>"><h4>Quay lại</h4></a>
                </div>

                <?php
                        $sqlTinDang .= " and tindang.TieuDeTinDang Like '%".$_GET['tu-khoa']."%'";
                    }
                    $demTinDang = mysqli_query($conn, $sqlTinDang);
                    $soTinDang = mysqli_num_rows($demTinDang);
                    $soTrang = ceil($soTinDang / 10);

                    $sqlTinDang .= " Order By ThoiGianDang DESC Limit 0,10";
                    getData($conn, $sqlTinDang, "inc/tin-dang/ds-tin-dang.php");
                ?>

            <!-- Phan trang -->
                <?php require "inc/tin-dang/phan-trang.php"; ?>
            </div>
        </div>
    </div>
</div>

<?php
	require "inc/footer.php";
?>