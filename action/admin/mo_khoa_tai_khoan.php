<?php
    include("../../database/db.php");
    include("../../function/function.php");

    $result = $conn->query("Update taikhoan Set TrangThaiTaiKhoan='Đang hoạt động' Where TenTaiKhoan='".$_POST['id']."'");
?>