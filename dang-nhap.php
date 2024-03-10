<?php
	$redirect = '';
	require "inc/head.php";
?>
<style type="text/css">
	
</style>
<script src="js/dang-ky-dang-nhap.js"></script>
<head>
<body onload="enterForm('dang-nhap', 'button-dang-nhap')">
	<div class="page">
		<div class="width-100 back-color-main-1">
		<!-- Form dang nhap -->
			<div class="dang-nhap" id="dang-nhap">
				<div id="message-dang-nhap">
					
				</div>
				<h2 class="text-center">Đăng nhập</h2>
				<br><br><br>
				<form>
					<label>Tên đăng nhập(*):</label><br>
					<input class="input input-fs-25 input-radius-12 width-100" id="ten-dang-nhap" type="text" name="">
					<label class="color-delete" id="message-ten-dang-nhap"></label><br>

					<label>Mật khẩu(*):</label><br>
					<input class="input input-fs-25 input-radius-12 mat-khau" id="mat-khau" type="password" name="" maxlength="50">
					<button class="button" id="icon-an-hien-mk" type="button" onclick="anHienMatKhau('mat-khau', 'icon-an-hien-mk')"><span class="material-symbols-outlined">visibility</span></button>
					<label id="message-mat-khau" class="color-delete"></label><br>

					<br>
					<button type="button" class="button width-100 color-white back-color-main-1" id="button-dang-nhap" onclick="validateDangNhap()">Đăng nhập</button>
					<h5 id="message-dang-nhap"></h5>
				</form>

				<div class="flex text-center float-right">
					<h5>hoặc</h5>&nbsp;
					<a class="a" href="dang-ky.php"><h5>Đăng ký</h5></a>
				</div>
			</div>
		</div>

<script>
	
</script>
<?php
	require "inc/footer.php";
?>