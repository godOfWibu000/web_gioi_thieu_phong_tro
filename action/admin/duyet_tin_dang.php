<?php
    include("../../database/db.php");
    include("../../function/function.php");

    $result = $conn->query("Update tindang Set KiemDuyet='Đã duyệt' Where MaTinDang='".$_POST['id']."'");
?>