<?php
	include("../../database/db.php");
    include("../../function/function.php");
    session_start();

    $result1 = $conn->query("Delete From tindangdaluu Where MaTinDang='".$_POST['id']."'");
    $result3 = $conn->query("Delete From khuvuctindang Where MaTinDang='".$_POST['id']."'");
    $result2 = $conn->query("Delete From tindang Where MaTinDang='".$_POST['id']."'");
?>