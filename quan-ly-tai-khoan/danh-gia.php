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
					<h3>Đánh giá của bạn</h3>

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
                        <th>Ý kiến đánh giá</th>
						<th>
							Thời gian đánh giá
						</th>
						<th></th>
						<th></th>
					</tr>
					<?php
						$danhGiaQuery = mysqli_query($conn, "Select * From danhgia inner join tindang on danhgia.MaTinDang=tindang.MaTinDang inner join taikhoan on danhgia.TenTaiKhoan=taikhoan.TenTaiKhoan Where taikhoan.TenTaiKhoan='".$_SESSION['ten-dang-nhap']."'");
						if($danhGiaQuery->num_rows>0){
							while($danhGia = $danhGiaQuery->fetch_assoc()){
					?>
					<tr>
						<td><?php echo $danhGia['TieuDeTinDang'] ?></th>
						<td><?php echo $danhGia['BinhLuan'] ?></td>
                        <td><?php $time = strtotime($danhGia['ThoiGianDanhGia']); $thoiGianDang = date('H:i | d-m-Y',$time); echo $thoiGianDang; ?></td>
						<td>
							<button class="button back-color-main-2 color-white" onclick="dieuHuong('../chi-tiet-tin-dang.php?id=<?php echo $danhGia['MaTinDang'] ?>')"><span class="material-symbols-outlined">visibility</span></button>
						</td>
						<td>
							<button class="button back-color-delete color-white" onclick="if(confirm('Bạn có chắc chắn muốn xóa đánh giá này?')) alert('ok')"><span class="material-symbols-outlined">backspace</span></button>
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