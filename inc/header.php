<head>
<body>
	
	<?php
		// $uri = $_SERVER['REQUEST_URI'];
		// echo $uri; //Outputs: URI
		$tenDangNhap = null;
		$dieuHuongTaiKhoan = '<a class="a color-main-1" href="'.$redirect.'dang-nhap.php"><h4>Đăng nhập</h4></a>';
		if(isset($_SESSION['ten-dang-nhap'])){
			$tenDangNhap = $_SESSION['ten-dang-nhap'];
			$dieuHuongTaiKhoan = '<a class="a color-main-1" href="'.$redirect.'quan-ly-tai-khoan"><h4>'.$tenDangNhap.'</h4></a>';
			if($_SESSION['loai-tai-khoan'] == 'admin')
        		header("Location:" . $redirect . "admin");
		}
	?>
	<div class="page">
	<!-- Header -->
		<header class="back-color-main-2 color-white padding-0-2" style="position: sticky;top: 0;z-index: 2000;">
		<!-- Head -->
			<div class="flex flex-between head">
		    <!-- Logo -->
		        <div class="logo item">
		            <span class="font-size-30">Team5</span>
		        </div>

		    <!-- Menu -->
		        <nav id="menu">
		            <ul class="flex ul menu">
		                <a class="a color-white font-size-20" href="<?php echo $redirect ?>index.php">
		                    <li class="menu-item">Trang chủ</li>
		                </a>
		                <a class="a color-white font-size-20" href="<?php echo $redirect ?>quan-ly-tai-khoan/dang-tin.php">
		                    <li class="menu-item">Đăng tin</li>
		                </a>
		                <a class="a color-white font-size-20" href="<?php echo $redirect ?>gioi-thieu.php">
		                    <li class="menu-item">Giới thiệu</li>
		                </a>
		            </ul>
		        </nav>

		    <!-- Login -->
		        <div class="flex">
					<span id="menu-toggle" class="material-symbols-outlined item cursor hover-color-main-1" style="font-size: 30px;" onclick="showMenu()">menu</span>&nbsp;&nbsp;&nbsp;
		        	<a class="color-white" href="<?php echo $redirect ?>quan-ly-tai-khoan/tin-dang-da-luu.php"><span style="font-size: 30px;" class="material-symbols-outlined item cursor hover-color-main-1">bookmark</span></a>
		        	&nbsp;&nbsp;&nbsp;
		            <div class="cursor color-white hover-color-main-1" id="button-tai-khoan" style="height: 40px;" onclick="moRong('tai-khoan', 'icon-tai-khoan', 'button-tai-khoan')">
		                <span style="font-size: 30px;" class="material-symbols-outlined item">account_circle</span>
		                <span class="material-symbols-outlined" id="icon-tai-khoan">expand_more</span>
		            </div>
		            &nbsp;&nbsp;&nbsp;
		            <span style="font-size: 30px;display: none;" class="material-symbols-outlined item cursor hover-color-main-1">menu</span>
		        </div>
		    </div>

		<!-- Tim kiem -->
			<div class="margin tim-kiem">
		        <form method="get" action="<?php if(isset($_GET['danh-muc'])) echo $redirect . 'danh-muc-phong-tro.php'; else echo $redirect . 'index.php'; ?>">
	        	<?php 
	        		if(isset($_GET['danh-muc'])){
	        	?>
	        		<input type="" name="danh-muc" value="<?php echo $_GET['danh-muc'] ?>" hidden>
	        	<?php
	        		}
	        		if(isset($_GET['dia-diem'])){
	        	?>
	        	<input type="" name="dia-diem" value="<?php echo $_GET['dia-diem'] ?>" hidden>
	        	<?php
	        		}
	        	?>
		            <input class="input input-radius-12 input-fs-25" type="" name="tu-khoa" placeholder="Nhập từ khóa...">
		            <button class="button back-color-main-1 color-white"><span class="material-symbols-outlined">search</span></button>
		        </form>
		    </div>
		</header>

	<!-- Content -->
		<div class="page padding-10-2">
