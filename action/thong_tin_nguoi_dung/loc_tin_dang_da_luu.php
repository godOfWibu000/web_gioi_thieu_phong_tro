<?php
	session_start();
	include("../../database/db.php");
    include("../../function/function.php");
?>
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
    $sql = "Select tindangdaluu.MaTinDang, tindang.TieuDeTinDang, tindangdaluu.ThoiGianLuu From tindangdaluu inner join tindang On tindangdaluu.MaTinDang=tindang.MaTinDang inner join taikhoan On tindangdaluu.TenTaiKhoan=taikhoan.TenTaiKhoan Where taikhoan.TenTaiKhoan='".$_SESSION['ten-dang-nhap']."' Order By tindangdaluu.ThoiGianLuu ".$_POST['loc'];
    $tinDangDaLuuQuery = mysqli_query($conn, $sql);
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