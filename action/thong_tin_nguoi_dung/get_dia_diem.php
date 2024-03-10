<?php
	include("../../database/db.php");
    include("../../function/function.php");
    session_start();
?>
<option value="" selected>Lựa chọn</option>
<?php
	$diaDiemQuery = mysqli_query($conn, "Select * From khuvuc Where MaQuan='".$_POST['id']."'");
	if($diaDiemQuery->num_rows>0){
		while($diaDiem = $diaDiemQuery->fetch_assoc()){
?>
<option value="<?php echo $diaDiem['MaKhuVuc'] ?>"><?php echo $diaDiem['TenKhuVuc'] ?></option>
<?php
		}
	}
?>