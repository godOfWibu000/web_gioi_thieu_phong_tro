<?php
	include("../../database/db.php");
	include("../../function/function.php");

	$tuKhoa = null;
	$danhMuc = null;
	$diaDiem = null;

	$sql = "Select * From tindang inner join khuvucquan on tindang.MaQuan=khuvucquan.MaQuan inner join taikhoan on tindang.TenTaiKhoan=taikhoan.TenTaiKhoan Where tindang.KiemDuyet='Đã duyệt' and taikhoan.TrangThaiTaiKhoan='Đang hoạt động'";
// Loc
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if($_POST['diaDiem'] != ''){
			$diaDiem = $_POST['diaDiem'];
?>
<div class="flex">
    <h4 class="padding-0-10">Phòng trọ tại '<?php echo $diaDiem ?>'</h4>
    <a class="a" href="danh-muc-phong-tro.php?danh-muc=<?php echo $danhMuc ?>"><h4>Quay lại</h4></a>
</div>
<?php
			$sql = "Select * From khuvuctindang inner join khuvuc On khuvuctindang.MaKhuVuc=khuvuc.MaKhuVuc inner join tindang On khuvuctindang.MaTinDang=tindang.MaTinDang inner join taikhoan on tindang.TenTaiKhoan=taikhoan.TenTaiKhoan inner join khuvucquan On khuvucquan.MaQuan=tindang.MaQuan Where khuvuc.TenKhuVuc='$diaDiem' and tindang.KiemDuyet='Đã duyệt' and taikhoan.TrangThaiTaiKhoan='Đang hoạt động'";
		}
		if($_POST['locTheoGia'] != "loc-theo-gia-tat-ca"){
			$locTheoGia = getSingleData($conn, "Select CongThucLocTheoGia From loctheogia Where MaLocTheoGia='".$_POST['locTheoGia']."'", "CongThucLocTheoGia");
			$sql .= $locTheoGia;
		}
		if($_POST['locTheoDienTich'] != "loc-theo-dien-tich-tat-ca"){
			$locTheoDienTich = getSingleData($conn, "Select CongThucLocTheoDienTich From loctheodientich Where MaLocTheoDienTich='".$_POST['locTheoDienTich']."'", "CongThucLocTheoDienTich");
			$sql .= $locTheoDienTich;
		}

		if($_POST['danhMuc'] != ''){
			$danhMuc = $_POST['danhMuc'];
			$sql .= " and khuvucquan.TenQuan='$danhMuc'";
		}

		// Tim kiem
		if($_POST['tuKhoa'] != ''){
			$tuKhoa = $_POST['tuKhoa'];
?>

		<div class="flex">
            <h4 class="padding-0-10">Kết quả tìm kiếm cho '<?php echo $tuKhoa ?>'</h4>
            <a class="a" href="<?php if($danhMuc != '') echo "danh-muc-phong-tro.php?danh-muc=$danhMuc"; else echo 'index.php' ?>"><h4>Quay lại</h4></a>
        </div>

<?php
			$sql .= " and tindang.TieuDeTinDang Like '%$tuKhoa%'";
		}

	// Sap xep
		if($_POST['sapXep'] == "Mới hơn")
			$sql .= " Order By tindang.ThoiGianDang DESC";
		else if($_POST['sapXep'] == "Cũ hơn")
			$sql .= " Order By tindang.ThoiGianDang ASC";
		else if($_POST['sapXep'] == "Giá thấp hơn")
			$sql .= " Order By tindang.GiaThue ASC";
		else
			$sql .= " Order By tindang.GiaThue DESC";

		$demTinDang = mysqli_query($conn, $sql);
	    $soTinDang = mysqli_num_rows($demTinDang);
	    $soTrang = ceil($soTinDang / 10);

	    if($_POST['trangSo'] == '' || $_POST['trangSo'] == 1)
			$sql .= ' Limit 0,10';
		else
			$sql .= ' Limit ' . (($_POST['trangSo']-1)*2) . ',10';
		getData($conn, $sql, "../../inc/tin-dang/ds-tin-dang.php");
	}
?>

<!-- Phan trang -->
    <div class="phan-trang flex">
        <button class="back-color-white border" <?php if($_POST['trangSo'] == 1) echo 'disabled' ?> onclick="locTinDang('<?php echo $danhMuc ?>', '<?php echo $diaDiem ?>', '<?php echo $tuKhoa ?>', <?php echo $_POST['trangSo']-1 ?>)">
            <span class="material-symbols-outlined">chevron_left</span>
        </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php
			for ($i=1; $i <= $soTrang; $i++) { 
				if($i == $_POST['trangSo']){
		?>
        <button class="font-size-20 back-color-main-1 color-white border" onclick="locTinDang('<?php echo $danhMuc ?>', '<?php echo $diaDiem ?>', '<?php echo $tuKhoa ?>', <?php echo $i ?>)"><?php echo $i ?>
        </button>

		<?php
				}else{
		?>
        <button class="font-size-20 back-color-white border" onclick="locTinDang('<?php echo $danhMuc ?>', '<?php echo $diaDiem ?>', '<?php echo $tuKhoa ?>', <?php echo $i ?>)"><?php echo $i ?>
        </button>
		<?php
				}
			}
		?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php
			if($_POST['trangSo'] != $soTrang){
		?>
		<button class="back-color-white border" onclick="locTinDang('<?php echo $_POST['danhMuc'] ?>', '<?php echo $diaDiem ?>', '<?php echo $_POST['tuKhoa'] ?>', <?php echo $_POST['trangSo']+1 ?>)">
            <span class="material-symbols-outlined">chevron_right</span>
        </button>
		<?php
			}else{
		?>
		<button class="back-color-white border" disabled>
            <span class="material-symbols-outlined">chevron_right</span>
        </button>
		<?php
			}
		?>
    </div>