<?php
	include("../../database/db.php");
    include("../../function/function.php");
    session_start();
    $tenTaiKhoan = $_SESSION['ten-dang-nhap'];

    $result1 = $conn->query("Delete From baocao Where TenTaiKhoan='$tenTaiKhoan'");
    $result2 = $conn->query("Delete From danhgia Where TenTaiKhoan='$tenTaiKhoan'");
    $result3 = $conn->query("Delete From tindangdaluu Where TenTaiKhoan='$tenTaiKhoan'");
    $result4 = $conn->query("Delete From tindang Where TenTaiKhoan='$tenTaiKhoan'");
    $result5 = $conn->query("Delete From taikhoan Where TenTaiKhoan='$tenTaiKhoan'");
    $_SESSION['ten-dang-nhap'] = null;
    header('Location: ../../index.php');
?>