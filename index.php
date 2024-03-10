<?php
    $redirect = '';
	require "inc/head.php";
?>

<link rel="stylesheet" type="text/css" href="css/index.css">

<?php
	require "inc/header.php";

    $danhMuc = null;
    $tuKhoa = null;
    $diaDiem = null;
    if(isset($_GET['tu-khoa']))
        $tuKhoa = $_GET['tu-khoa'];
?>

<div class="content padding-1">
    <h3>Cho Thuê Phòng Trọ, nhà trọ sinh viên Hà Nội</h3>
<!-- Danh muc phong tro -->
    <?php
		require "inc/danh-muc.php";
	?>

<!-- Phong tro -->
    <div>
    <!-- Loc tin dang -->
        <div class="right float-right">
        	<?php
    			require "inc/tin-dang/loc-tin-dang.php";
    		?>
        </div>

    <!-- Tin dang -->
        <div class="width-70 back-color-white float-left ds-tin-dang">
        <!-- Sap xep -->
            <div class="padding-10-2">
                <div class="flex-between padding-10-0 border-bottom-1 font-size-20">
                    <select class="select-loc-sapxep" id="sap-xep" onchange="locTinDang('', '', '<?php echo $tuKhoa ?>', 1)">
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
                	$sqlTinDang = "Select * From tindang inner join khuvucquan on tindang.MaQuan=khuvucquan.MaQuan inner join taikhoan on tindang.TenTaiKhoan=taikhoan.TenTaiKhoan Where tindang.KiemDuyet='Đã duyệt' and taikhoan.TrangThaiTaiKhoan='Đang hoạt động'";
                	if(isset($_GET['tu-khoa'])){
                ?>
                <div class="flex">
                    <h4 class="padding-0-10">Kết quả tìm kiếm cho '<?php echo $_GET['tu-khoa'] ?>'</h4>
                    <a class="a" href="index.php"><h4>Quay lại</h4></a>
                </div>
                <?php
                		$sqlTinDang .= " and TieuDeTinDang Like '%".$_GET['tu-khoa']."%'";
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