<?php
	session_start();
	include("../../database/db.php");
    include("../../function/function.php");
?>
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
	$sql = "Select MaTinDang,TieuDeTinDang,ThoiGianDang,KiemDuyet From tindang Where TenTaiKhoan='".$_SESSION['ten-dang-nhap']."'";
	if($_POST['locTheoTrangThai'] != '')
    	$sql .= " and KiemDuyet='".$_POST['locTheoTrangThai']."'";
	$sql .= " Order By ThoiGianDang ".$_POST['locTheoThoiGian'];
    $tinDangQuery = mysqli_query($conn, $sql);
    if($tinDangQuery->num_rows>0){
		while($dsTinDang = $tinDangQuery->fetch_assoc()){
?>
<tr>
	<td class="cursor"><?php echo $dsTinDang['TieuDeTinDang'] ?></td>
	<td class="cursor"><?php echo $dsTinDang['ThoiGianDang'] ?></td>
	<td class="cursor"><?php echo $dsTinDang['KiemDuyet'] ?></td>
	<td>
		<button class="button back-color-main-2 color-white"><span class="material-symbols-outlined">visibility</span></button>
	</td>
	<td>
		<button class="button back-color-main-1 color-white"><span class="material-symbols-outlined" onclick="dieuHuong('sua-tin.php?id=<?php echo $dsTinDang['MaTinDang'] ?>')">edit_square</span></button>
	</td>
	<td>
		<button class="button back-color-delete color-white"><span class="material-symbols-outlined" onclick="xoaTinDang('<?php echo $dsTinDang['MaTinDang'] ?>')">backspace</span></button>
	</td>
</tr>
<?php
		}
	}
?>