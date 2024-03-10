<?php
	include("../../database/db.php");
    include("../../function/function.php");
    session_start();
   	
   	if(!isset($_POST['matKhauMoi']) || !isset($_POST['matKhauCu'])){
   		echo 'Vui lòng gửi đầy đủ thông tin!';
   		return;
   	}
   	if($_POST['matKhauMoi'] == '' || $_POST['matKhauCu'] == ''){
   		echo 'Vui lòng nhập đầy đủ thông tin!';
   		return;
   	}
   	if(validateMatKhau($_POST['matKhauMoi']) == false){
   		return;
   	}
   	if(mysqli_query($conn, "Select * From taikhoan Where TenTaiKhoan='".$_SESSION['ten-dang-nhap']."' and MatKhau='".$_POST['matKhauCu']."'")->num_rows<1){
   		echo 'Mật khẩu bạn nhập không chính xác!';
   		return;
   	}

   	$sql = "Update taikhoan set MatKhau='".$_POST['matKhauMoi']."' Where TenTaiKhoan='".$_SESSION['ten-dang-nhap']."'";
   	$result = $conn->query($sql);
   	echo "Đổi mật khẩu thành công!";
?>