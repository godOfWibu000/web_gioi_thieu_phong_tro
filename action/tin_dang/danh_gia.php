<?php
    include("../../database/db.php");
	include("../../function/function.php");
    session_start();

    $result = $conn->query("Insert Into danhgia(TenTaiKhoan, MaTinDang, BinhLuan, ThoiGianDanhGia) Values('".$_SESSION['ten-dang-nhap']."', '".$_POST['id']."', '".$_POST['comment']."', '".$_POST['thoi-gian']."')");

    header("Location: ../../chi-tiet-tin-dang.php?id=".$_POST['id']);
?>