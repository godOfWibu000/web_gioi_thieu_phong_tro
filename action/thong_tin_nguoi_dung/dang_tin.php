<?php
    ob_start();
	include("../../database/db.php");
    include("../../function/function.php");
    session_start();

    if(!empty($_POST)){
    	$maTinDang = 'P' . random_int(11111111, 99999999);
        $tenFile1 = $tenFile2 = $tenFile3 = '';
        
        $tenFile1 = taiFile($_FILES['anh1'], "../../img/tin-dang/");
        $tenFile2 = taiFile($_FILES['anh2'], "../../img/tin-dang/");
        $tenFile3 = taiFile($_FILES['anh3'], "../../img/tin-dang/");

        if($tenFile1 == false)
            $tenFile1 = '';
        if($tenFile2 == false)
            $tenFile2 = '';
        if($tenFile3 == false)
            $tenFile3 = '';

        $sql = "Insert Into tindang(MaTinDang, TieuDeTinDang, SDTLienHe, DiaChiThue, DienTich, GiaThue, MoTaTinDang, Img1, Img2, Img3, ThoiGianDang, TenTaiKhoan, MaQuan) Values('$maTinDang', '".$_POST['tieu-de']."', '".$_POST['sdt']."', '".$_POST['dia-chi']."', ".$_POST['dien-tich'].", ".$_POST['gia-thue'].", '".$_POST['mo-ta']."', '$tenFile1', '$tenFile2', '$tenFile3', '".$_POST['thoi-gian']."', '".$_SESSION['ten-dang-nhap']."', '".$_POST['quan']."')";
        $result1 = $conn->query($sql);

        if(!empty($_POST['dia-diem-1']))
            $result2 = $conn->query("Insert Into khuvuctindang(MaTinDang ,MaKhuVuc) Values('$maTinDang', '".$_POST['dia-diem-1']."')");
        if(!empty($_POST['dia-diem-2']))
            $result2 = $conn->query("Insert Into khuvuctindang(MaTinDang ,MaKhuVuc) Values('$maTinDang', '".$_POST['dia-diem-2']."')");
        if(!empty($_POST['dia-diem-3']))
            $result2 = $conn->query("Insert Into khuvuctindang(MaTinDang ,MaKhuVuc) Values('$maTinDang', '".$_POST['dia-diem-3']."')");
        header("Location: ../../quan-ly-tai-khoan/tin-dang.php");
    }
?>