<div class="phan-trang flex">
    <button class="back-color-white border" disabled>
        <span class="material-symbols-outlined">chevron_left</span>
    </button>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php
            for ($i=1; $i <= $soTrang; $i++) { 
                if($i == 1){
        ?>
    <button class="font-size-20 back-color-main-1 color-white border" onclick="locTinDang('<?php echo $danhMuc ?>', '<?php echo $diaDiem ?>', '<?php echo $tuKhoa ?>', <?php echo $i ?>)"><?php echo $i ?>
    </button>
        <?php
                }else{
        ?>
    <button class="font-size-20 back-color-white border" onclick="locTinDang('<?php echo $danhMuc ?>', '<?php echo $diaDiem ?>', '<?php echo $tuKhoa ?>', <?php echo $i ?>)"><?php echo $i ?>
    </button>

        <?php
                }
            }
        ?>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php
        if($soTrang == 1){
    ?>
    <button class="back-color-white border" disabled>
        <span class="material-symbols-outlined">chevron_right</span>
    </button>
    <?php
        }else{
    ?>
    <button class="back-color-white border" onclick="locTinDang('<?php echo $danhMuc ?>', '<?php echo $diaDiem ?>', '<?php echo $tuKhoa ?>', 2)">
        <span class="material-symbols-outlined">chevron_right</span>
    </button>
    <?php
        }
    ?>
</div>