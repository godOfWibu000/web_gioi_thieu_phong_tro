<?php
    include("../../database/db.php");
	include("../../function/function.php");
    session_start();

    print_r($_POST);

    $maBaoCao = 'R' . rand(1111111111,9999999999);
    $noiDungBaoCao = '';
    !empty($_POST['issue1']) ? $noiDungBaoCao .=  $_POST['issue1'] . '-' : false;
    !empty($_POST['issue2']) ? $noiDungBaoCao .=  $_POST['issue2'] . '-' : false; 
    !empty($_POST['issue3']) ? $noiDungBaoCao .=  $_POST['issue3'] . '-' : false;
    !empty($_POST['issue4']) ? $noiDungBaoCao .=  $_POST['issue4'] . '-' : false;
    !empty($_POST['issue5']) ? $noiDungBaoCao .=  $_POST['issue5'] . '-' : false;
    !empty($_POST['text']) ? $noiDungBaoCao .=  $_POST['text'] : false;
    $result = $conn->query("Insert Into baocao(MaBaoCao, TenTaiKhoan, MaTinDang, NoiDungBaoCao, ThoiGianBaoCao) Value('$maBaoCao', '".$_SESSION['ten-dang-nhap']."', '".$_POST['id']."', '$noiDungBaoCao', '".$_POST['thoi-gian']."')");

    header("Location: ../../chi-tiet-tin-dang.php?id=" . $_POST['id']);
?>