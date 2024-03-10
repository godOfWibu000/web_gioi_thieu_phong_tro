<?php
    $redirect = '';
	require "inc/head.php";

	if(empty($_GET['id']))
		header("Location: index.php");
?>

<link rel="stylesheet" href="css/chi-tiet-phong-tro.css">

<?php
	require "inc/header.php";
?>
<div class="content padding-1">
<!-- Danh muc phong tro -->
    <?php
		require "inc/danh-muc.php";
	?>
	<?php
		$tinDangQuery = mysqli_query($conn, "Select * From tindang inner join taikhoan on tindang.TenTaiKhoan=taikhoan.TenTaiKhoan Where MaTinDang='".$_GET['id']."' and taikhoan.TrangThaiTaiKhoan='Đang hoạt động'");
		$img = array();
		if($tinDangQuery->num_rows>0){
			while($tinDang = $tinDangQuery->fetch_assoc()){
				$tieuDeTinDang = $tinDang['TieuDeTinDang'];
				$sdt = $tinDang['SDTLienHe'];
				$diaChi = $tinDang['DiaChiThue'];
				$dienTich = $tinDang['DienTich'];
				$giaThue = $tinDang['GiaThue'];
				$moTa = $tinDang['MoTaTinDang'];
				if($tinDang['Img1'] != '') array_push($img, $tinDang['Img1']);
				if($tinDang['Img2'] != '') array_push($img, $tinDang['Img2']);
				if($tinDang['Img3'] != '') array_push($img, $tinDang['Img3']);
				$thoiGian = $tinDang['ThoiGianDang'];
				$taiKhoan = $tinDang['TenTaiKhoan'];
				$sdtTK = $tinDang['SDT'];
				$maQuan = $tinDang['MaQuan'];
				$kiemDuyet = $tinDang['KiemDuyet'];
			}
		}else{
	?>
	<div class="alert alert-danger text-center">
        <h3>Tin đăng không không tồn tại</h3>
    </div>
	<?php
			return;
		}
	?>

	<?php
		if($kiemDuyet == 'Đã duyệt' || ($kiemDuyet == 'Chưa duyệt' && !empty($_SESSION['ten-dang-nhap']) && $taiKhoan == $_SESSION['ten-dang-nhap'])){
	?>
	<section id="post-content">
		<div class="all-info">
			<div class="row">
				<div class="col-lg-9 back-color-white">
					<div class="image-room">
						<div class="image-room-nav">
							<div id="carouselExampleIndicators" class="carousel slide carousel-fade">
								<div class="carousel-inner">
									<?php
										foreach ($img as $item){
									?>
									<div class="carousel-item active">
										<img src="img/tin-dang/<?php echo $item ?>" alt="...">
										<div class="image-overlay">
										</div>
									</div>
									<?php
										}
									?>
								</div>

							</div>
							<div class="combo-btn-img">
								<button class="btn btn-prev" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev"><i class="fas fa-chevron-left"></i></button>
								<button class="btn btn-next" data-bs-target="#carouselExampleIndicators" data-bs-slide="next"><i class="fas fa-chevron-right"></i></i></button>
							</div>
						</div>

						<div class="image-room-for">
							<div class="list-room-for">
								<?php
									foreach ($img as $item){
								?>
								<button class="btn" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" aria-current="true" aria-label="Slide 1">
									<img src="img/tin-dang/<?php echo $item ?>" alt="...">
								</button>
								<?php
									}
								?>
							</div>
						</div>
					</div>
					<div class="room-content">
						<div class="room-content-title">
							<h3><?php echo $tieuDeTinDang ?></h3>
							<div class="flex">
								<span class="material-symbols-outlined">location_on</span>&nbsp;
								<p><?php echo $diaChi ?></p>
							</div>
							<div class="flex">
								<span class="material-symbols-outlined">apartment</span>&nbsp;
								<div>
									<?php
										$dsKhuVucTinDangQuery = mysqli_query($conn, "Select TenKhuVuc From khuvuctindang inner join khuvuc on khuvuctindang.MaKhuVuc=khuvuc.MaKhuVuc Where MaTinDang='".$_GET['id']."'");
										if($dsKhuVucTinDangQuery->num_rows>0){
											while($dsKhuVucTinDang = $dsKhuVucTinDangQuery->fetch_assoc()){
												echo '
										<h6 style="display: inline;">Gần '.$dsKhuVucTinDang['TenKhuVuc'].',&nbsp;</h6>
												';
											}
										}
									?>
								</div>
							</div>
						</div>

						<div class="room-sub">
							<p>Mức giá: <span class="color-delete"><?php echo $giaThue ?></span> triệu/tháng</p>
							<p>Diện tích: <span class="color-delete"><?php echo $dienTich ?></span> m²</p>
							<p>Thời gian đăng: <span class="color-delete"><?php $time = strtotime($thoiGian); $thoiGianDang = date('H:i | d-m-Y',$time); echo $thoiGianDang; ?></span></p>
							<div class="room-icon">
								<?php
									if(!isset($_SESSION['ten-dang-nhap'])){
									?>
									<a href="dang-nhap.php"><i class="fas fa-flag color-delete" style="color: #d63031;"></i></a>
									<a href="dang-nhap.php" class="color-delete" title="Lưu lại" style="font-size: 20px;color: #d63031;"><i class="far fa-bookmark" style="color: #d63031;"></i></a>
									<?php
									}else{
									?>
									<i class="fas fa-flag color-delete" style="color: #d63031;" onclick="document.getElementById('overlayReport').style.display = 'flex';"></i>
									<?php
										$daLuu = mysqli_query($conn, "Select * From tindangdaluu Where MaTinDang = '".$_GET['id']."' and TenTaiKhoan='".$_SESSION['ten-dang-nhap']."'");
										if($daLuu->num_rows>0){
									?>
									<span id="<?php echo $_GET['id'] ?>" title="Bỏ lưu" onclick="luuTinDang('<?php echo $_GET['id'] ?>','Bỏ lưu', '')"><i class="fas fa-bookmark" style="color: #d63031;"></i></span>
									<?php
										}else{
									?>
									<span id="<?php echo $_GET['id'] ?>" title="Lưu lại" onclick="luuTinDang('<?php echo $_GET['id'] ?>','Lưu', '')"><i class="far fa-bookmark" style="color: #d63031;"></i></span>
									<?php
										}
									}
								?>
							</div>
						</div>

						<div class="room-detail-text">
							<h3>Thông tin mô tả</h3>
							<p><?php echo $moTa ?></p>
						</div>
						
						<div class="room-user-contact">
							<h3>Thông tin liên hệ</h3>
							<p>Địa chỉ: <span><?php echo $diaChi ?></span></p>
							<p>Số điện thoại: <span><?php echo $sdt ?></span></p>
						</div>
					</div>
					
					<div id="comments">
						<h3>Ý kiến đánh giá</n->:</h3>
						<hr>
						<?php
							if(isset($_SESSION['ten-dang-nhap'])){
								$checkDanhGia = mysqli_query($conn, "Select MaTinDang From danhgia Where MaTinDang='".$_GET['id']."' and TenTaiKhoan='".$_SESSION['ten-dang-nhap']."'");
								if($checkDanhGia->num_rows>0){
									echo '<h5>Bạn đã để lại ý kiến</h5><hr>';
								}else{
						?>
						<div class="form-comments">
							<form id="comments-form" method="post" action="action/tin_dang/danh_gia.php">
								<label>
									<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
									<textarea name="comment" rows="5" maxlength="1000" placeholder="Nhập ý kiến của bạn: " required></textarea>
									<input type="hidden" name="thoi-gian" id="thoi-gian-danh-gia">
								</label>
								<button class="submit" type="submit" onclick="document.getElementById('thoi-gian-danh-gia').value = getThoiGian()">Gửi</button>
							</form>
						</div>
						<?php
								}
							}else{
								echo '<h5><a href="dang-nhap.php">Đăng nhập</a> để viết ý kiến</h5><hr>';
							}
						?>

						<div class="comments-other">
							<?php
								$danhGiaQuery = mysqli_query($conn, "Select * From danhgia inner join taikhoan on danhgia.TenTaiKhoan=taikhoan.TenTaiKhoan Where MaTinDang='".$_GET['id']."' Order By ThoiGianDanhGia DESC");
								if($danhGiaQuery->num_rows>0){
									while($danhGia = $danhGiaQuery->fetch_assoc()){
							?>
							<div class="item-comment">
								<div class="user-comment">
									<img src="img/avatar.png" alt="">
								</div>
								<div class="content-comment">
									<i class="fas fa-caret-left"></i>
									<a href="thong-tin-nguoi-dung.php?user=<?php echo $danhGia['TenTaiKhoan'] ?>">
										<p><?php echo empty($danhGia['HoTen']) ? $danhGia['TenTaiKhoan'] : $danhGia['HoTen'] ?></p>
									</a>
									<span><?php echo $danhGia['BinhLuan'] ?></span>
									<span class="color-main-1">Vào <?php echo $danhGia['ThoiGianDanhGia'] ?></span>
								</div>
							</div>
							<?php
									}
								}
							?>
						</div>
					</div>
				</div>

				<div class="col-lg-3">
					<div class="user-content">
						<p>Đăng bởi:</p>
						<a href="thong-tin-nguoi-dung.php?user=<?php echo $taiKhoan ?>"><i class="fas fa-user-circle"></i><span><?php echo $taiKhoan ?></span></a>
						<div>
							<input type="text" value="<?php echo $sdtTK ?>" id="sdt" hidden>
							<button onclick="navigator.clipboard.writeText('<?php echo $sdtTK ?>');alert('Đã copy!')"><i class="fas fa-phone"></i> <?php echo $sdtTK ?></button>
						</div>
					</div>
					<div class="warning-content">
						<span><i class="fa-solid fa-triangle-exclamation fa-beat"></i> Lưu ý: </span>
						<p>
							</i>Không nên đặt cọc, giao dịch trước khi xem nhà và xác minh thông tin của người cho thuê.</p>
					</div>
				</div>
			</div>

			<div class="margin-1 back-color-white" id="ds-tin-dang">
				<h3 class="padding-10-2">Tin đăng liên quan</h3>
				<?php getData($conn, "Select * From tindang inner join khuvucquan on tindang.MaQuan=khuvucquan.MaQuan Where tindang.MaQuan='$maQuan' and tindang.KiemDuyet='Đã duyệt' Order By ThoiGianDang DESC Limit 0,5", "inc/tin-dang/ds-tin-dang.php"); ?>
				<a href="danh-muc-phong-tro.php?id=<?php echo $maQuan ?>"><button class="button back-color-main-1 width-100 color-white">Xem thêm</button></a>
			</div>
		</div>
	</section>

	<section id="section-popup">
		<div class="overlay" id="overlayReport">
			<div class="popup">
				<h3>Ý kiến phản hồi:</h3>
				<button class="close-btn" onclick="document.getElementById('overlayReport').style.display = 'none';"><i class="fas fa-times"></i></button>
				<form id="report-form-content" method="post" action="action/tin_dang/bao_cao.php">
					<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
					<label>
						<input type="checkbox" name="issue1" value="Phòng trọ không giống trong ảnh"> Phòng trọ không giống trong ảnh.
					</label>
					<label>
						<input type="checkbox" name="issue2" value="Trùng với tin rao khác"> Trùng với tin rao khác.
					</label>
					<label>
						<input type="checkbox" name="issue3" value="Các thông tin về: giá, diện tích, mô tả"> Các thông tin về: giá, diện tích, mô tả ....
					</label>
					<label>
						<input type="checkbox" name="issue4" value="Không liên lạc được"> Không liên lạc được.
					</label>
					<label>
						<input type="checkbox" name="issue5" value="Có dấu hiện lừa đảo"> Có dấu hiện lừa đảo.
					</label>
					<label class="textarea">Phản hồi khác:
						<textarea name="text" rows="5" cols="50" maxlength="500"></textarea>
					</label>
					<input type="hidden" name="thoi-gian" id="thoi-gian-bao-cao">
					<button class="submit" type="submit" onclick="document.getElementById('thoi-gian-bao-cao').value = getThoiGian()">Gửi</button>
				</form>
			</div>
		</div>
	</section>
	<?php
		}else{
	?>
	<div class="alert alert-danger text-center">
        <h3>Tin đăng không hiển thị với bạn</h3>
    </div>
	<?php
		}
	?>
</div>
<?php
	require "inc/footer.php";
?>