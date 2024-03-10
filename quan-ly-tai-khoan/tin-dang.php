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
			<div>
				<div class="border-bottom-1">
					<div class="flex-between">
						<h3>Tin đăng</h3>
						<a href="dang-tin.php"><button class="button back-color-main-2 color-white"><span class="material-symbols-outlined">add</span></button></a>
					</div>
					<div class="flex padding-10-0">
						<span class="material-symbols-outlined" style="font-size: 25px;">filter_alt</span>&nbsp;&nbsp;&nbsp;
						<span id="loc-theo-trang-thai">
							<input type="radio" name="loc-duyet" id="loc-tat-ca" value="" checked onclick="locTinDangNguoiDung()">
							<label for="loc-tat-ca">Tất cả</label>
							<input type="radio" name="loc-duyet" id="loc-chua-duyet" value="Chưa duyệt" onclick="locTinDangNguoiDung()">
							<label for="loc-chua-duyet">Chưa duyệt</label>
							<input type="radio" name="loc-duyet" id="loc-da-duyet" value="Đã duyệt" onclick="locTinDangNguoiDung()">
							<label for="loc-da-duyet">Đã duyệt</label>
						</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<span>
							<select class="select-loc-sapxep" id="loc-theo-thoi-gian" onchange="locTinDangNguoiDung()">
								<option value="DESC">Mới hơn</option>
								<option value="ASC">Cũ hơn</option>
							</select>
						</span>
					</div>
				</div>
				<table class="table" style="overflow: auto;" id="ds-tin-dang-nguoi-dung">
					<tr>
						<th>
							Tiêu đề
						</th>
						<th>
							Thời gian đăng
						</th>
						<th>
							Kiểm duyệt
						</th>
						<th></th>
						<th></th>
						<th></th>
					</tr>

					<?php
						$tinDangQuery = mysqli_query($conn, "Select MaTinDang,TieuDeTinDang,ThoiGianDang,KiemDuyet From tindang Where TenTaiKhoan='".$_SESSION['ten-dang-nhap']."' Order By ThoiGianDang DESC");
						if($tinDangQuery->num_rows>0){
							while($dsTinDang = $tinDangQuery->fetch_assoc()){
					?>

					<tr>
						<td class="cursor"><?php echo $dsTinDang['TieuDeTinDang'] ?></td>
						<td class="cursor"><?php $time = strtotime($dsTinDang['ThoiGianDang']); $thoiGianDang = date('H:i | d-m-Y',$time); echo $thoiGianDang; ?></td>
						<td class="cursor"><?php echo $dsTinDang['KiemDuyet'] ?></td>
						<td>
							<button class="button back-color-main-2 color-white" onclick="dieuHuong('../chi-tiet-tin-dang.php?id=<?php echo $dsTinDang['MaTinDang'] ?>')"><span class="material-symbols-outlined">visibility</span></button>
						</td>
						<td>
							<button class="button back-color-main-1 color-white" onclick="dieuHuong('sua-tin.php?id=<?php echo $dsTinDang['MaTinDang'] ?>')"><span class="material-symbols-outlined">edit_square</span></button>
						</td>
						<td>
							<button class="button back-color-delete color-white" onclick="xoaTinDang('<?php echo $dsTinDang['MaTinDang'] ?>')"><span class="material-symbols-outlined">backspace</span></button>
						</td>
					</tr>

					<?php
							}
						}
					?>
				</table>
			</div>
		</div>
		
	</div>
</div>
<?php
	require "../inc/footer.php";
?>