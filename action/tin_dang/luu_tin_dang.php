<?php
	include("../../database/db.php");
	include("../../function/function.php");
	session_start();

	if($_POST['trangThai'] == 'Lưu'){
		$sql = "Insert Into tindangdaluu(MaTinDang, TenTaiKhoan, ThoiGianLuu) Values('".$_POST['id']."','".$_SESSION['ten-dang-nhap']."', '".$_POST['thoiGian']."')";
		$result = $conn->query($sql);
		echo 1;
	}else{
		$sql = "Delete From tindangdaluu Where MaTinDang='".$_POST['id']."' And TenTaiKhoan='".$_SESSION['ten-dang-nhap']."'";
		$result = $conn->query($sql);
		echo 0;
	}
?>