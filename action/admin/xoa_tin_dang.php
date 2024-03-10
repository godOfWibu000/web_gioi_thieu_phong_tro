<?php
    include("../../database/db.php");
    include("../../function/function.php");

    $result = $conn->query("Delete From tindang Where MaTinDang='".$_POST['id']."'");
?>