<?php
	include("../../database/db.php");
    include("../../function/function.php");
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    	if($_POST['tenDangNhap'] == '' || $_POST['matKhau'] == '')
    		echo 'Vui lòng nhập đủ thông tin vào các trường bên trên!';
    	else if(strlen($_POST['tenDangNhap']) < 6)
    		echo 'Tên đăng nhập cần đủ 6 ký tự, vui lòng nhập lại!';
    	else if(!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*_]).{8,}$/", $_POST['matKhau']))
    		echo 'Mật khẩu cần ít nhất 8 ký tự, có ký tự in thường, in hoa, số và ký tự đặc biệt!';
    	else{
    		$tenDangNhap = $_POST['tenDangNhap'];
    		$taiKhoan = mysqli_query($conn, "Select TenTaiKhoan From taikhoan Where TenTaiKhoan='$tenDangNhap'");
    		if($taiKhoan->num_rows>0)
    			echo 'Tài khoản đã tồn tại, vui lòng nhập tên tài khoản khác!';
    		else{
    			$matKhau = $_POST['matKhau'];
    			$sql = "Insert Into taikhoan(TenTaiKhoan, MatKhau) Values ('$tenDangNhap', '$matKhau')";
    			$result = $conn->query($sql);

    			echo 'Đăng ký thành công!';
    		}
    	}
    }
?>