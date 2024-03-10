<?php
    ob_start();
	include("../../database/db.php");
    include("../../function/function.php");
    session_start();

    if(!empty($_POST)){
        $sql = "Update tindang Set TieuDeTinDang='".$_POST['tieu-de']."',  SDTLienHe='".$_POST['sdt']."', DiaChiThue='".$_POST['dia-chi']."', DienTich=".$_POST['dien-tich'].", GiaThue=".$_POST['gia-thue'].", MoTaTinDang='".$_POST['mo-ta']."', MaQuan='".$_POST['quan']."'";
        $tenFile1 = taiFile($_FILES['anh1'], "../../img/tin-dang/");
        $tenFile2 = taiFile($_FILES['anh2'], "../../img/tin-dang/");
        $tenFile3 = taiFile($_FILES['anh3'], "../../img/tin-dang/");

        if($tenFile1 != false){
            $sql .= ", Img1='$tenFile1'";
            if($_POST['ten-anh-1-cu'] != '')
                unlink('../../img/tin-dang/'.$_POST['ten-anh-1-cu']);
        }
        if($tenFile2 != false){
            $sql .= ", Img2='$tenFile2'";
            if($_POST['ten-anh-2-cu'] != '')
                unlink('../../img/tin-dang/'.$_POST['ten-anh-2-cu']);
        }
        if($tenFile3 != false){
            $sql .= ", Img3='$tenFile3'";
            if($_POST['ten-anh-3-cu'] != '')
                unlink('../../img/tin-dang/'.$_POST['ten-anh-3-cu']);
        }
        $sql .= " Where MaTinDang='".$_POST['ma-tin-dang']."'";
        $result1 = $conn->query($sql);
        $result2 = $conn->query("Delete From khuvuctindang Where MaTinDang='".$_POST['ma-tin-dang']."'");
        if(!empty($_POST['dia-diem-1']))
            $result3 = $conn->query("Insert Into khuvuctindang(MaTinDang ,MaKhuVuc) Values('".$_POST['ma-tin-dang']."', '".$_POST['dia-diem-1']."')");
        if(!empty($_POST['dia-diem-2']))
            $result3 = $conn->query("Insert Into khuvuctindang(MaTinDang ,MaKhuVuc) Values('".$_POST['ma-tin-dang']."', '".$_POST['dia-diem-2']."')");
        if(!empty($_POST['dia-diem-3']))
            $result3 = $conn->query("Insert Into khuvuctindang(MaTinDang ,MaKhuVuc) Values('".$_POST['ma-tin-dang']."', '".$_POST['dia-diem-3']."')");
        header("Location: ../../quan-ly-tai-khoan/tin-dang.php");
    }
?>