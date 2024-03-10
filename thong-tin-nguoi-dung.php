<?php
	$redirect = '';
	require "inc/head.php";
    if(empty($_GET['user']))
        header("Location: index.php");
?>

<link rel="stylesheet" type="text/css" href="css/index.css">

<?php
	require "inc/header.php";
?>

<div class="content padding-1">
	<!-- Danh muc phong tro -->
    <?php
		require "inc/danh-muc.php";
	?>
    <?php
        $taiKhoanQuery = mysqli_query($conn,"Select * From taikhoan Where TenTaiKhoan='".$_GET['user']."' and TrangThaiTaiKhoan='Đang hoạt động'");
        if($taiKhoanQuery->num_rows>0){
            while($taiKhoan = $taiKhoanQuery->fetch_assoc()){
                $hoTen = $taiKhoan['HoTen'];
                $diaChi = $taiKhoan['DiaChi'];
                $sdt = $taiKhoan['SDT'];
                $email = $taiKhoan['Email'];
            }
        }else{
    ?>
    <div class="alert alert-danger text-center">
        <h3>Tài khoản không tồn tại hoặc đang bị khóa</h3>
    </div>
    <?php
            return;
        }
    ?>
    <div class="back-color-white padding-10-2 flex">
        <div class="flex width-30">
            <img src="img/avatar.png" alt="" width="100px" height="100px">
            <div class="padding-10-2">
                <h4><?php echo empty($hoTen) ? $_GET['user'] : $hoTen ?></h4>
                <h5>@<?php echo $_GET['user'] ?></h5>
            </div>
        </div>

        <div class="margin-0-2 padding-10-2 border width-70">
            <h4><?php echo $hoTen ?></h4>
            <?php if(!empty($diaChi)){ ?>
            <div class="flex">
                <span class="material-symbols-outlined">location_on</span>
                <h5><?php echo $diaChi ?></h5>
            </div>
            <?php } ?>

            <?php if(!empty($sdt)){ ?>
            <div class="flex">
                <span class="material-symbols-outlined">call</span>
                <h5><?php echo $sdt ?></h5>
            </div>
            <?php } ?>
            
            <?php if(!empty($email)){ ?>
            <div class="flex">
                <span class="material-symbols-outlined">mail</span>
                <h5><?php echo $email ?></h5>
            </div>
            <?php } ?>
        </div>
    </div>

    <div class="margin-1 back-color-white" id="ds-tin-dang">
        <?php getData($conn, "Select * From tindang inner join khuvucquan on tindang.MaQuan=khuvucquan.MaQuan Where TenTaiKhoan='user_1' and tindang.KiemDuyet='Đã duyệt' Order By ThoiGianDang DESC", "inc/tin-dang/ds-tin-dang.php"); ?>
    </div>
</div>

<?php
	require "inc/footer.php";
?>