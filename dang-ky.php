<?php
	$redirect = '';
	require "inc/head.php";
?>

<script src="js/dang-ky-dang-nhap.js"></script>

<head>
<body onload="enterForm('dang-nhap', 'button-dang-nhap')">
	<div class="page">
		<div class="width-100 back-color-main-1">
			<div class="dang-nhap">
				<div id="message-dang-ky">
					
				</div>
				<h2 class="text-center">Đăng ký tài khoản</h2>
				<br><br><br>
				<form id="dang-nhap">
					<label>Tên đăng nhập(*):</label><br>
					<input class="input input-fs-25 input-radius-12 width-100" id="ten-dang-nhap" type="text" name="" maxlength="50">
					<label class="color-delete" id="message-ten-dang-nhap"></label><br>

					<label>Mật khẩu(*):</label><br>
					<input class="input input-fs-25 input-radius-12 mat-khau" id="mat-khau" type="password" name="" maxlength="50">
					<button class="button" id="icon-an-hien-mk" type="button" onclick="anHienMatKhau('mat-khau', 'icon-an-hien-mk')"><span class="material-symbols-outlined">visibility</span></button>
					<label id="message-mat-khau" class="color-delete"></label><br>

					<label>Nhập lại mật khẩu(*):</label><br>
					<input class="input input-fs-25 input-radius-12 mat-khau" id="nhap-lai-mk" type="password" name="" maxlength="50">
					<button class="button" id="icon-an-hien-nhap-lai-mk" type="button" onclick="anHienMatKhau('nhap-lai-mk', 'icon-an-hien-nhap-lai-mk')"><span class="material-symbols-outlined">visibility</span></button>
					<label id="message-nhap-lai-mk" class="color-delete"></label><br>

					<br><br>
					<button type="button" class="button width-100 color-white back-color-main-1" id="button-dang-nhap" onclick="validateDangKy()">Đăng ký</button>
					<h5 id="message-dang-nhap"></h5>
				</form>
				<div class="flex text-center float-right">
					<h5>Bạn đã có tài khoản?</h5>&nbsp;
					<a class="a" href="dang-nhap.php"><h5>Đăng nhập</h5></a>
				</div>
			</div>
		</div>