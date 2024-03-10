    <!-- Footer -->
        <div class="back-color-white color-black border-radius border-1-grey padding-10-0 tuy-chon-tai-khoan" id="tai-khoan" style="z-index: 3000;">
            <div class="flex cursor color-main-1 padding-0-2 border-bottom-1">
                <span class="material-symbols-outlined" style="font-size: 30px">account_circle</span>&nbsp;
                <?php echo $dieuHuongTaiKhoan ?>
            </div>
            <?php
                if($tenDangNhap == null){
            ?>
            <div class="flex padding-10-2">
                <h5>Hoặc</h5>&nbsp;
                <a class="a" href="<?php echo $redirect ?>dang-ky.php"><h5>Đăng ký</h5></a>
            </div>
            <?php
                }else{
            ?>

            <div class="padding-10-0">
                <div class="cursor menu-tai-khoan">
                    <a class="a" href="<?php echo $redirect ?>quan-ly-tai-khoan">
                        <div class="flex">
                            <span class="material-symbols-outlined">chevron_right</span>
                            <h5>Quản lý tài khoản</h5>
                        </div>
                    </a>
                </div>
                <div class="cursor menu-tai-khoan">
                    <a class="a" href="<?php echo $redirect ?>quan-ly-tai-khoan/dang-tin.php">
                        <div class="flex">
                            <span class="material-symbols-outlined">chevron_right</span>
                            <h5>Đăng tin</h5>
                        </div>
                    </a>
                </div>
                <div class="cursor menu-tai-khoan">
                    <a class="a" href="<?php echo $redirect ?>quan-ly-tai-khoan/tin-dang.php">
                        <div class="flex">
                            <span class="material-symbols-outlined">chevron_right</span>
                            <h5>Quản lý tin đăng</h5>
                        </div>
                    </a>
                </div>
                <div class="cursor menu-tai-khoan">
                    <a class="a" href="<?php echo $redirect ?>quan-ly-tai-khoan/tin-dang-da-luu.php">
                        <div class="flex">
                            <span class="material-symbols-outlined">chevron_right</span>
                            <h5>Tin đăng đã lưu</h5>
                        </div>
                    </a>
                </div>
                <br>

                <div class="flex color-delete cursor padding-0-2 float-right" onclick="dangXuat('<?php echo $redirect ?>')">
                    <span class="material-symbols-outlined">logout</span>&nbsp;
                    <h5>Đăng xuất</h5>
                </div>
            </div>

            <?php
                }
            ?>
        </div>

        <div style="clear: both;height: 20px;"></div>

        <footer>
            <section id="footer">
                <div class="combo-logo">
                    <img src="<?php echo $redirect?>img/logovnua.png" alt="">
                    <img src="<?php echo $redirect?>img/logofita.png" alt="">
                </div>
                <div class="sub-text">------------------- Website được phát triển bởi Nhóm 5 - Môn học Xây dựng và phát triển phần mềm -------------------</div>
                <p><i class="far fa-copyright"></i> Copyright 2024</p>
            </section>
        </footer>
    <div>
</body>
</html>