<?php
    include("../../database/db.php");
    include("../../function/function.php");

    $result = $conn->query("Delete From taikhoan Where TenTaiKhoan='".$_POST['id']."'");
?>