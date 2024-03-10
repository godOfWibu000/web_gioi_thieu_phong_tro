<?php
	$redirect = "../";
	require "../inc/head.php";
?>

<link rel="stylesheet" type="text/css" href="../css/quan-ly-tai-khoan.css">
<script src="../js/quan-ly-tai-khoan.js"></script>

<?php
	require "../inc/header.php";
	require "../inc/quan-ly-tai-khoan/header.php";
?>

<?php
	$hoTen = $diaChi = $sdt = $email = null;
	$tenTaiKhoan = $_SESSION['ten-dang-nhap'];
	$taiKhoanQuery = mysqli_query($conn, "Select * From taikhoan Where TenTaiKhoan='$tenTaiKhoan'");
	if($taiKhoanQuery->num_rows>0){
		while($taiKhoan = $taiKhoanQuery->fetch_assoc()){
			$hoTen = $taiKhoan['HoTen'];
			$diaChi = $taiKhoan['DiaChi'];
			$sdt = $taiKhoan['SDT'];
			$email = $taiKhoan['Email'];
		}
	}
?>

		<div class="padding-10-2 back-color-white quan-ly-tai-khoan-right float-left">
			<?php
				if(isset($_SESSION['messageQuanLyTTTK'])){
			?>
			<div class="<?php if($_SESSION['messageQuanLyTTTK'] != 'Cập nhật thành công!') echo 'back-color-delete'; else echo 'back-color-pass'; ?> color-white message">
				<h4 class="text-center"><?php echo $_SESSION['messageQuanLyTTTK'] ?></h4>
			</div>
			<?php
					$_SESSION['messageQuanLyTTTK'] = null;
				}
			?>
		<!-- Tuy chon tai khoan -->
			<div class="flex">
				<img class="border" src="../img/avatar.png" width="150px">
				<div style="margin: auto 10px;">
					<h4><?php echo $_SESSION['ten-dang-nhap'] ?></h4>
					<button class="button-radius-none" onclick="moCuaSo('cua-so-doi-mat-khau', 'nen-cua-so-doi-mat-khau');enterForm('doi-mat-khau', 'button-doi-mat-khau')">Đổi mật khẩu</button>
					<button class="button-radius-none" onclick="if(confirm('Bạn có chắc chắn muốn xóa tài khoản?')) window.location='../action/dang_nhap_dang_xuat/xoa_tai_khoan.php'">Xóa tài khoản</button>
				</div>
			</div>
			<br>

		<!-- Thong tin nguoi dung -->
			<form method="post" action="../action/thong_tin_nguoi_dung/cap_nhat_thong_tin_nguoi_dung.php" onsubmit="return capNhatThongTin()">
				<h5>Họ tên:</h5>
				<input class="input input-fs-20 width-100" type="text" name="ho-ten" value="<?php echo $hoTen ?>" required><br>

				<h5>Địa chỉ:</h5>
				<input class="input input-fs-20 width-100" type="text" name="dia-chi" value="<?php echo $diaChi ?>"><br>
				<h5>Số điện thoại:</h5>
				<input class="input input-fs-20 width-100" type="tel" name="sdt" value="<?php echo $sdt ?>" pattern="[0]{1}[0-9]{9}"><br>
				<h5>Email:</h5>
				<input class="input input-fs-20 width-100" type="email" name="email" value="<?php echo $email ?>"><br><br>

				<button class="button back-color-main-2 color-white">Lưu lại</button>
				<button class="button back-color-main-1 color-white" type="reset">Đặt lại</button>
			</form>

		<!-- Doi mat khau -->
			<div class="cua-so cua-so-nho padding-10-2" id="cua-so-doi-mat-khau">
				<div id="message-doi-mat-khau">
					
				</div>
				<h3>Đổi mật khẩu</h3>
				<div id="doi-mat-khau">
					<form id="form-doi-mat-khau">
						<label><h5>Nhập mật khẩu mới:</h5></label>
						<input class="input input-fs-25 input-radius-12 width-100 mat-khau" id="mat-khau-moi" type="password" name="">
						<button class="button" id="icon-an-hien-mk-moi" type="button" onclick="anHienMatKhau('mat-khau-moi', 'icon-an-hien-mk-moi')"><span class="material-symbols-outlined">visibility</span></button>
						<h5 class="color-delete" id="message-mat-khau-moi"></h5>

						<label><h5>Nhập lại mật khẩu mới:</h5></label>
						<input class="input input-fs-25 input-radius-12 width-100 mat-khau" id="nhap-lai-mat-khau-moi" type="password" name="">
						<button class="button" id="icon-an-hien-nhap-lai-mk-moi" type="button" onclick="anHienMatKhau('nhap-lai-mat-khau-moi', 'icon-an-hien-nhap-lai-mk-moi')"><span class="material-symbols-outlined">visibility</span></button>
						<h5 class="color-delete" id="message-nhap-lai-mat-khau-moi"></h5>

						<label><h5>Nhập mật khẩu cũ:</h5></label>
						<input class="input input-fs-25 input-radius-12 width-100 mat-khau" id="mat-khau" type="password" name="">
						<button class="button" id="icon-an-hien-mk" type="button" onclick="anHienMatKhau('mat-khau', 'icon-an-hien-mk')"><span class="material-symbols-outlined">visibility</span></button>
						<h5 class="color-delete" id="message-mat-khau"></h5>
						<br>

						<button type="button" class="button back-color-main-2 color-white" id="button-doi-mat-khau" onclick="validateDoiMatKhau()">Lưu lại</button>
						<button type="reset" class="button back-color-main-1 color-white">Đặt lại</button>
					</form>
				</div>
			</div>
			<div class="nen-cua-so" id="nen-cua-so-doi-mat-khau" onclick="dongCuaSo('cua-so-doi-mat-khau', 'nen-cua-so-doi-mat-khau')"></div>
		</div>
	</div>
</div>

<?php
	require "../inc/footer.php";
?>