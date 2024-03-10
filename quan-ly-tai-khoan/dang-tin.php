<?php
    $redirect = "../";
	require "../inc/head.php";
?>

<link rel="stylesheet" type="text/css" href="../css/quan-ly-tai-khoan.css">
<script src="../js/quan-ly-tai-khoan.js"></script>

<?php
	require "../inc/header.php";
	require "../inc/quan-ly-tai-khoan/header.php";
?>
		<div class="padding-10-2 back-color-white quan-ly-tai-khoan-right float-left">
			<div class="border-bottom-1">
				<h3>Đăng tin</h3>
			</div><br>
		<!-- Form dang tin -->
			<form method="post" action="../action/thong_tin_nguoi_dung/dang_tin.php" enctype="multipart/form-data">
				<label><h5>Tiêu đề tin đăng(<span class="color-delete">*</span>):</h5></label><br>
				<textarea class="width-100 textarea" name="tieu-de" required minlength="6" maxlength="255"></textarea>

				<div class="flex">
					<div class="width-50">
						<label><h5>Diện tích(<span class="color-delete">*</span>):</h5></label><br>
						<input class="input-2 input-fs-20 input-radius-5 width-90" type="number" min="1" max="1000" name="dien-tich" required>
					</div>

					<div class="width-50">
						<label><h5>Giá thuê(triệu đ/ tháng)(<span class="color-delete">*</span>):</h5></label>
						<input class="input-2 input-fs-20 input-radius-5 width-100" type="number" min="0.1" max="1000" step="0.001" maxlength="4" name="gia-thue" required>
					</div>
				</div>

				<label><h5>Số điện thoại liên hệ(<span class="color-delete">*</span>):</h5></label>
				<input class="input-2 input-fs-20 input-radius-5 width-100" type="tel" pattern="[0]{1}[0-9]{9}" name="sdt" required>

				<label><h5>Địa chỉ thuê(<span class="color-delete">*</span>):</h5></label>
				<textarea class="width-100 textarea" name="dia-chi" required></textarea>

				<label><h5>Khu vực:</h5></label>
				<select class="width-100 select" name="quan" onchange="getDiaDiem(this)">
					<?php
						$danhMucQuery = getDanhMuc($conn);
						while($danhMuc = $danhMucQuery->fetch_assoc()){
					?>
					<option value="<?php echo $danhMuc['MaQuan'] ?>"><?php echo $danhMuc['TenQuan'] ?></option>
					<?php
						}
					?>
				</select>

				<label><h5>Địa điểm:</h5></label><br>
				<select class="width-30 select" id="dia-diem-1" name="dia-diem-1">
					
				</select>
				<select class="width-30 select margin-0-2" id="dia-diem-2" name="dia-diem-2">
					
				</select>
				<select class="width-30 select" id="dia-diem-3" name="dia-diem-3">
					
				</select><br><br>

				<label><h5>Mô tả:</h5></label>
				<textarea class="width-100 textarea" name="mo-ta" style="height: 300px;"></textarea>

				<label><h5>Tải lên hình ảnh:</h5></label><br>
			<!-- Tai len anh -->
				<div>
					<img class="border" id="hien-anh-1" src="../img/img-upload-icon.jpg" width="30%">
					<img class="border" id="hien-anh-2" src="../img/img-upload-icon.jpg" width="30%">
					<img class="border" id="hien-anh-3" src="../img/img-upload-icon.jpg" width="30%">	
				</div>

				<label class="button back-color-main-2 color-white width-30 text-center" for="anh1">
					<h5>
						<span style="font-size: 30px;" class="material-symbols-outlined">upload</span>
						<span id="ten-anh-1"></span>
					</h5>
				</label>
				<input type="file" name="anh1" id="anh1" accept=".jpg,.png" onchange="layTenFIle('ten-anh-1');hienAnhUpload(this, 'hien-anh-1')" hidden>

				<label class="button back-color-main-2 color-white text-center width-30" for="anh2">
					<h5>
						<span style="font-size: 30px;" class="material-symbols-outlined">upload</span>
						<span id="ten-anh-2"></span>
					</h5>
				</label>
				<input type="file" name="anh2" id="anh2" accept=".jpg,.png" onchange="layTenFIle('ten-anh-2');hienAnhUpload(this, 'hien-anh-2')" hidden>

				<label class="button back-color-main-2 color-white text-center width-30" for="anh3">
					<h5>
						<span style="font-size: 30px;" class="material-symbols-outlined">upload</span>
						<span id="ten-anh-3"></span>
					</h5>
				</label><br>
				<input type="file" name="anh3" id="anh3" accept=".jpg,.png" onchange="layTenFIle('ten-anh-3');hienAnhUpload(this, 'hien-anh-3')" hidden>

				<input type="" name="thoi-gian" id="thoi-gian-dang" hidden>
				<br><br>

				<button class="button back-color-main-2 color-white" onclick="document.getElementById('thoi-gian-dang').value = getThoiGian()">Lưu lại</button>
				<button class="button back-color-main-1 color-white" type="button" onclick="taiLaiTrang()">Đặt lại</button>
			</form>
		</div>

	</div>
</div>

<script type="text/javascript">

</script>

<?php
	require "../inc/footer.php";
?>