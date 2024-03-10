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
				<div class="border-bottom-1 flex-between">
					<h3>Tin đăng đã lưu</h3>

					<select class="select-loc-sapxep" id="loc" onchange="locTinDangDaLuu()">
						<option value="DESC">Mới hơn</option>
						<option value="ASC">Cũ hơn</option>
					</select>
				</div>
				<table class="table" style="overflow: auto;" id="ds-tin-dang-da-luu">
					<tr>
						<th>
							Tin đăng
						</th>
						<th>
							Thời gian lưu
						</th>
						<th></th>
						<th></th>
					</tr>
					<?php
						$tinDangDaLuuQuery = mysqli_query($conn, "Select tindangdaluu.MaTinDang, tindang.TieuDeTinDang, tindangdaluu.ThoiGianLuu From tindangdaluu inner join tindang On tindangdaluu.MaTinDang=tindang.MaTinDang inner join taikhoan On tindangdaluu.TenTaiKhoan=taikhoan.TenTaiKhoan Where taikhoan.TenTaiKhoan='".$_SESSION['ten-dang-nhap']."' Order By tindangdaluu.ThoiGianLuu DESC");
						if($tinDangDaLuuQuery->num_rows>0){
							while($tinDangDaLuu = $tinDangDaLuuQuery->fetch_assoc()){
					?>
					<tr>
						<td><?php echo $tinDangDaLuu['TieuDeTinDang'] ?></th>
						<td><?php echo $tinDangDaLuu['ThoiGianLuu'] ?></td>
						<td>
							<button class="button back-color-main-2 color-white" onclick="dieuHuong('../chi-tiet-tin-dang.php?id=<?php echo $tinDangDaLuu['MaTinDang'] ?>')"><span class="material-symbols-outlined">visibility</span></button>
						</td>
						<td>
							<button class="button back-color-delete color-white" onclick="if(confirm('Bạn có chắc chắn muốn xóa tin đăng này khỏi danh sách đã lưu?')) luuTinDang('<?php echo $tinDangDaLuu['MaTinDang'] ?>','Bỏ lưu', '<?php echo $redirect ?>')"><span class="material-symbols-outlined">backspace</span></button>
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