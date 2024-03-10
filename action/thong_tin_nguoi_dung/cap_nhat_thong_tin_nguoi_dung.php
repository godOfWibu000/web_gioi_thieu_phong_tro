<?php
	include("../../database/db.php");
    include("../../function/function.php");
    session_start();

// Kiem tra du lieu
    if(!isset($_POST['ho-ten']) || !isset($_POST['dia-chi']) || !isset($_POST['sdt']) || !isset($_POST['email'])){
        $_SESSION['messageQuanLyTTTK'] = 'Bạn cần gửi đầy đủ dữ liệu!';
        header('Location: ../../quan-ly-tai-khoan');
        return;
    }
    if($_POST['ho-ten'] == ''){
        $_SESSION['messageQuanLyTTTK'] = 'Dữ liệu không hợp lệ, vui lòng kiểm tra lại!';
        header('Location: ../../quan-ly-tai-khoan');
        return;
    }
    if($_POST['sdt'] != '' && (!preg_match("/^(?=.*?[0-9]).{10}$/", $_POST['sdt']) || $_POST['sdt'][0] != '0')){
        $_SESSION['messageQuanLyTTTK'] = 'Dữ liệu không hợp lệ, vui lòng kiểm tra lại!';
        header('Location: ../../quan-ly-tai-khoan');
        return;
    }

    if($_POST['email'] != '' && !strpos($_POST['email'],'@') > 0){
        $_SESSION['messageQuanLyTTTK'] = 'Dữ liệu không hợp lệ, vui lòng kiểm tra lại!';
        header('Location: ../../quan-ly-tai-khoan');
        return;
    }

// Tao bien du lieu
    $hoTen = $_POST['ho-ten'];
    $diaChi = $_POST['dia-chi'];
    $sdtCu = getSingleData($conn, "Select SDT From taikhoan Where TenTaiKhoan='".$_SESSION['ten-dang-nhap']."'", "SDT");
    $emailCu = getSingleData($conn, "Select Email From taikhoan Where TenTaiKhoan='".$_SESSION['ten-dang-nhap']."'", "Email");
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];

// Kiem tra trung lap email, sdt
    $kTraSDT = mysqli_query($conn, "Select SDT From taikhoan Where SDT='$sdt'");
    $kTraEmail = mysqli_query($conn, "Select Email From taikhoan Where Email='$email'");
    if($kTraSDT->num_rows>0 && $sdt != $sdtCu && $sdt != ''){
        $sdt = $sdtCu;
        $sql = "Update taikhoan Set Email='$email', SDT='$sdt', HoTen='$hoTen', DiaChi='$diaChi' Where TenTaiKhoan='".$_SESSION['ten-dang-nhap']."'";
        $result = $conn->query($sql);
        $_SESSION['messageQuanLyTTTK'] = 'Số điện thoại đã được sử dụng, vui lòng nhập lại!';
        header('Location: ../../quan-ly-tai-khoan');
        return;
    }
    if($kTraEmail->num_rows>0 && $email != $emailCu && $email != ''){
        $email = $emailCu;
        $sql = "Update taikhoan Set Email='$email', SDT='$sdt', HoTen='$hoTen', DiaChi='$diaChi' Where TenTaiKhoan='".$_SESSION['ten-dang-nhap']."'";
        $result = $conn->query($sql);
        $_SESSION['messageQuanLyTTTK'] = 'Email đã được sử dụng, vui lòng nhập lại!';
        header('Location: ../../quan-ly-tai-khoan');
        return;
    }
    $sql = "Update taikhoan Set Email='$email', SDT='$sdt', HoTen='$hoTen', DiaChi='$diaChi' Where TenTaiKhoan='".$_SESSION['ten-dang-nhap']."'";
    $result = $conn->query($sql);
    $_SESSION['messageQuanLyTTTK'] = 'Cập nhật thành công!';
    $_SESSION['ten-nguoi-dung'] = $hoTen;
    header('Location: ../../quan-ly-tai-khoan');
?>