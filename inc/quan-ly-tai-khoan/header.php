<?php
	if(!isset($_SESSION['ten-dang-nhap'])){
?>
<script>
	window.location = "../dang-nhap.php";
</script>
<?php
	}
?>
<div class="content">
	<div>
		<div class="padding-10-2 back-color-white quan-ly-tai-khoan-left float-left">
			<div class="flex-between">
				<div class="flex">
					<img src="../img/user.png" width="100px">

					<div class="padding-0-10">
						<h4><?php echo !empty($_SESSION['ten-nguoi-dung']) ? $_SESSION['ten-nguoi-dung'] : $_SESSION['ten-dang-nhap'] ?></h4>
						<h5>@<?php echo $_SESSION['ten-dang-nhap'] ?></h5>
					</div>
				</div>
				<div class="cursor" id="thu-gon-menu-tai-khoan" onclick="thuGon('menu-tai-khoan', 'icon-thu-gon-menu-tai-khoan', 'thu-gon-menu-tai-khoan')">
					<span class="material-symbols-outlined cursor hover-color-main-1" id="icon-thu-gon-menu-tai-khoan" style="font-size: 30px;">expand_less</span>
				</div>
			</div>

			<div class="padding-10-0" id="menu-tai-khoan">
				<div class="cursor menu-tai-khoan">
					<a class="a flex" href="../quan-ly-tai-khoan">
						<span class="material-symbols-outlined">chevron_right</span>
						<h4>Thông tin tài khoản</h4>
					</a>
				</div>
				<div class="cursor menu-tai-khoan">
					<a class="a flex" href="tin-dang.php">
						<span class="material-symbols-outlined">chevron_right</span>
						<h4>Tin đăng</h4>
					</a>
				</div>
				<div class="cursor menu-tai-khoan">
					<a class="a flex" href="tin-dang-da-luu.php">
						<span class="material-symbols-outlined">chevron_right</span>
						<h4>Đã lưu</h4>
					</a>
				</div>
				<div class="cursor menu-tai-khoan">
					<a class="a flex" href="danh-gia.php">
						<span class="material-symbols-outlined">chevron_right</span>
						<h4>Đánh giá</h4>
					</a>
				</div>
			</div>

			<div class="flex color-delete padding-10-2 cursor" onclick="dangXuat('<?php echo $redirect ?>')">
				<span class="material-symbols-outlined">logout</span>
				<h4>Đăng xuất</h4>
			</div>
		</div>