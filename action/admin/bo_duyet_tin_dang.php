<?php
    include("../../database/db.php");
    include("../../function/function.php");

    $result = $conn->query("Update tindang Set KiemDuyet='Chưa duyệt' Where MaTinDang='".$_POST['id']."'");
    echo '';
?>