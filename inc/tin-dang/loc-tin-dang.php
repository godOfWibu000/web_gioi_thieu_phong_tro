<?php
    
?>

<div class="padding-10-2 loc" id="loc-tin-dang">
<!-- Loc theo gia -->
    <div class="margin item">
    <!-- Tieu de -->
        <div class="flex border-bottom-1 title cursor hover-color-main-1" id="button-loc-theo-gia" onclick="thuGon('loc-tin-dang-theo-gia', 'icon-loc-tin-dang-theo-gia', 'button-loc-theo-gia')">
            <h4><b>Lọc theo giá</b></h4>&nbsp;
            <span class="material-symbols-outlined" id="icon-loc-tin-dang-theo-gia">expand_less</span>
        </div>
    <!-- Noi dung -->
        <div class="padding-10-0 loc-item" id="loc-tin-dang-theo-gia">
            <div>
            	<input type="radio" id="loc-theo-gia-tat-ca" name="loc-theo-gia" value="loc-theo-gia-tat-ca" checked onclick="locTinDang('<?php echo $danhMuc ?>', '<?php echo $diaDiem ?>', '<?php echo $tuKhoa ?>', 1)">
    			<label for="loc-theo-gia-tat-ca"><h5>Tất cả</h5></label>
    			<br>
            </div>
        	<?php
        		$dsLocTheoGiaQuery = getMultiListData($conn, "Select * From loctheogia");
        		while($dsLocTheoGia = $dsLocTheoGiaQuery->fetch_assoc()){
        	?>
            <div>
            	<input type="radio" name="loc-theo-gia" id="<?php echo $dsLocTheoGia['MaLocTheoGia'] ?>" value="<?php echo $dsLocTheoGia['MaLocTheoGia'] ?>" onclick="locTinDang('<?php echo $danhMuc ?>', '<?php echo $diaDiem ?>', '<?php echo $tuKhoa ?>', 1)">
    			<label for="<?php echo $dsLocTheoGia['MaLocTheoGia'] ?>"><h5><?php echo $dsLocTheoGia['TenLocTheoGia'] ?></h5></label>
    			<br>
            </div>

        	<?php
        		}
        	?>
        </div>
    </div>

<!-- Loc theo dien tich -->
    <div class="margin item">
    <!-- Tieu de -->
        <div class="flex border-bottom-1 title cursor hover-color-main-1" id="button-loc-theo-dien-tich" onclick="thuGon('loc-tin-dang-theo-dien-tich', 'icon-loc-tin-dang-theo-dien-tich', 'button-loc-theo-dien-tich')">
            <h4><b>Lọc theo diện tích</b></h4>&nbsp;
            <span class="material-symbols-outlined" id="icon-loc-tin-dang-theo-dien-tich">expand_less</span>
        </div>
    <!-- Noi dung -->
        <div class="padding-10-0 loc-item" id="loc-tin-dang-theo-dien-tich">
        	<div>
            	<input type="radio" id="loc-theo-dien-tich-tat-ca" name="loc-theo-dien-tich" value="loc-theo-dien-tich-tat-ca" checked onclick="locTinDang('<?php echo $danhMuc ?>', '<?php echo $diaDiem ?>', '<?php echo $tuKhoa ?>', 1)">
    			<label for="loc-theo-dien-tich-tat-ca"><h5>Tất cả</h5></label>
    			<br>
            </div>
        	<?php
        		$dsLocTheoDienTichQuery = getMultiListData($conn, "Select * From loctheodientich");
        		while($dsLocTheoDienTich = $dsLocTheoDienTichQuery->fetch_assoc()){
        	?>
            <div>
            	<input type="radio" name="loc-theo-dien-tich" id="<?php echo $dsLocTheoDienTich['MaLocTheoDienTich'] ?>" value="<?php echo $dsLocTheoDienTich['MaLocTheoDienTich'] ?>" onclick="locTinDang('<?php echo $danhMuc ?>', '<?php echo $diaDiem ?>', '<?php echo $tuKhoa ?>', 1)">
    			<label for="<?php echo $dsLocTheoDienTich['MaLocTheoDienTich'] ?>"><h5><?php echo $dsLocTheoDienTich['TenLocTheoDienTich'] ?></h5></label>
    			<br>
            </div>

        	<?php
        		}
        	?>
        </div>
    </div>
</div>