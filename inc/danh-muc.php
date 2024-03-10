    <div class="margin-1 padding-10-2 back-color-white">
        <h4 class="border-bottom-1 padding-10-0">Danh mục phòng trọ</h4>
        <div class="ds-danh-muc row margin-1">
            <?php
				$dsQuanQuery = getDanhMuc($conn);
				while($dsQuan = $dsQuanQuery->fetch_assoc()){
			?>

            <a href="danh-muc-phong-tro.php?danh-muc=<?php echo $dsQuan['TenQuan'] ?>" class="flex col-lg-3 col-6 a color-black danh-muc">
                <span class="material-symbols-outlined">chevron_right</span>
                <h5>Phòng trọ
                    <?php echo $dsQuan['TenQuan'] ?>
                </h5>
            </a>

            <?php
				}
			?>
        </div>
    </div>