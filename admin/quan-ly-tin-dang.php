<?php require "../inc/admin/header.php"; ?>
<?php
    $getTrangThai = null;
    $getSapXep = null;
    $getTuKhoa = null;
    $trangThai = null;
    $sapXep = null;

    $sqlDSTD = "Select * From tindang inner join taikhoan on tindang.TenTaiKhoan=taikhoan.TentaiKhoan Where taikhoan.TrangThaiTaiKhoan='Đang hoạt động'";
    if(!empty($_GET['tu-khoa'])){
        $getTuKhoa = '&tu-khoa='.$_GET['tu-khoa'];
        $sqlDSTD .= " and (TieuDeTinDang Like '%".$_GET['tu-khoa']."%' Or taikhoan.TenTaiKhoan Like '%".$_GET['tu-khoa']."%' Or SDTLienHe Like '%".$_GET['tu-khoa']."%' Or DiaChiThue Like '%".$_GET['tu-khoa']."%')";
    }

    if(!empty($_GET['trang-thai'])){
        $trangThai=$_GET['trang-thai'];
        $getTrangThai='&trang-thai='.$_GET['trang-thai'];
        $sqlDSTD .= " and KiemDuyet='".$_GET['trang-thai']."'";
    }

    if(!empty($_GET['sap-xep'])){
        $sapXep = $_GET['sap-xep'];
        $getSapXep='&sap-xep='.$_GET['sap-xep'];
        if($_GET['sap-xep'] == 'Mới hơn')
            $sqlDSTD .= " Order By ThoiGianDang DESC";
        else
            $sqlDSTD .= " Order By ThoiGianDang ASC";
    }else
        $sqlDSTD .= " Order By ThoiGianDang DESC";
?>
                    <div class="tab-content">
                        <div class="post-management" id="post">
                            <div class="qly-user">
                                <div class="qly-user-title">
                                    <h3>Danh sách bài đăng</h3>
                                </div>
                            </div>
                            <div class="qly-user-main">
                                <div class="qly-search">
                                    <div class="combobox-search">
                                        <?php
                                            if($trangThai == null){
                                        ?>
                                        <span onclick="window.location='quan-ly-tin-dang.php?trang=1<?php echo $getSapXep.$getTuKhoa ?>'">
                                            <input type="radio" name="loc" id="loc-tat-ca" checked>
                                            <label for="">Tất cả</label>
                                        </span>
                                        <span onclick="window.location='quan-ly-tin-dang.php?trang=1&trang-thai=Đã duyệt<?php echo $getSapXep.$getTuKhoa; ?>'">
                                            <input type="radio" name="loc" id="loc-hoat-dong">
                                            <label for="loc-hoat-dong">Đã duyệt</label>
                                        </span>
                                        <span onclick="window.location='quan-ly-tin-dang.php?trang=1&trang-thai=Chưa duyệt<?php echo $getSapXep.$getTuKhoa ?>'">
                                            <input type="radio" name="loc" id="loc-bi-khoa">
                                            <label for="loc-bi-khoa">Chưa duyệt</label>
                                        </span>
                                        <?php
                                            }else if($trangThai == 'Đã duyệt'){
                                        ?>
                                        <span onclick="window.location='quan-ly-tin-dang.php?trang=1<?php echo $getSapXep.$getTuKhoa ?>'">
                                            <input type="radio" name="loc" id="loc-tat-ca">
                                            <label for="">Tất cả</label>
                                        </span>
                                        <span onclick="window.location='quan-ly-tin-dang.php?trang=1&trang-thai=Đã duyệt<?php echo $getSapXep.$getTuKhoa; ?>'">
                                            <input type="radio" name="loc" id="loc-hoat-dong" checked>
                                            <label for="loc-hoat-dong">Đã duyệt</label>
                                        </span>
                                        <span onclick="window.location='quan-ly-tin-dang.php?trang=1&trang-thai=Chưa duyệt<?php echo $getSapXep.$getTuKhoa ?>'">
                                            <input type="radio" name="loc" id="loc-bi-khoa">
                                            <label for="loc-bi-khoa">Chưa duyệt</label>
                                        </span>
                                        <?php
                                            }else{
                                        ?>
                                        <span onclick="window.location='quan-ly-tin-dang.php?trang=1<?php echo $getSapXep.$getTuKhoa ?>'">
                                            <input type="radio" name="loc" id="loc-tat-ca">
                                            <label for="">Tất cả</label>
                                        </span>
                                        <span onclick="window.location='quan-ly-tin-dang.php?trang=1&trang-thai=Đã duyệt<?php echo $getSapXep.$getTuKhoa; ?>'">
                                            <input type="radio" name="loc" id="loc-hoat-dong">
                                            <label for="loc-hoat-dong">Đã duyệt</label>
                                        </span>
                                        <span onclick="window.location='quan-ly-tin-dang.php?trang=1&trang-thai=Chưa duyệt<?php echo $getSapXep.$getTuKhoa ?>'">
                                            <input type="radio" name="loc" id="loc-bi-khoa" checked>
                                            <label for="loc-bi-khoa">Chưa duyệt</label>
                                        </span>
                                        <?php
                                            }
                                        ?>
                                        
                                        <?php
                                            if($sapXep == null || $sapXep == 'Mới hơn'){
                                        ?>
                                        <select name="type" onchange="window.location='quan-ly-tin-dang.php?trang=1<?php echo $getTrangThai.$getTuKhoa ?>&sap-xep='+this.value">
                                            <option value="Mới hơn">Mới hơn</option>
                                            <option value="Cũ hơn">Cũ hơn</option>
                                        </select>
                                        <?php
                                            }else{
                                        ?>
                                        <select name="type" onchange="window.location='quan-ly-tin-dang.php?trang=1<?php echo $getTrangThai.$getTuKhoa ?>&sap-xep='+this.value">
                                            <option value="Cũ hơn">Cũ hơn</option>
                                            <option value="Mới hơn">Mới hơn</option>
                                        </select>
                                        <?php
                                            }
                                        ?>
                                        
                                    </div>
                                    <form method="get" action="" style="display: flex;">
                                        <input class="form-control" type="search" name="tu-khoa">
                                        <button class="form-control"><i class="fa-solid fa-magnifying-glass"></i> Tìm kiếm </a></button>
                                    </form>
                                </div>

                                <div class="qly-content">
                                    <div class="row list-user">
                                        <table class="table">
                                            <thead class="head-table">
                                                <tr>
                                                    <th scope="col">Mã tin đăng</th>
                                                    <th scope="col">Tiêu đề</th>
                                                    <th scope="col">Người đăng</th>
                                                    <th scope="col">Số điện thoại</th>
                                                    <th scope="col">Địa chỉ</th>
                                                    <th scope="col">Thời gian đăng</th>
                                                    <th scope="col">Trạng thái</th>
                                                    <th scope="col">Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if(isset($_GET['tu-khoa']))
                                                        echo "<h4>Kết quả tìm kiếm cho '".$_GET['tu-khoa']."' <a href=\"quan-ly-tin-dang.php\">Quay lại</a></h4>";
                                                    $soTinDang = mysqli_num_rows(mysqli_query($conn, $sqlDSTD));
                                                    $soTrang = ceil($soTinDang / 10);

                                                    if(empty($_GET['trang']) || $_GET['trang'] == 1)
                                                        $sqlDSTD .= ' Limit 0,10';
                                                    else
                                                        $sqlDSTD .= ' Limit ' . (($_GET['trang']-1)*10) . ',10';
                                                    $dsTinDangQuery = mysqli_query($conn, $sqlDSTD);
                                                    if($dsTinDangQuery->num_rows>0){
                                                        while($dsTinDang = $dsTinDangQuery->fetch_assoc()){
                                                ?>
                                                <tr>
                                                    <th><?php echo $dsTinDang['MaTinDang'] ?></th>
                                                    <td><?php echo $dsTinDang['TieuDeTinDang'] ?></td>
                                                    <td><?php echo $dsTinDang['TenTaiKhoan'] ?></td>
                                                    <td><?php echo $dsTinDang['SDTLienHe'] ?></td>
                                                    <td><?php echo $dsTinDang['DiaChiThue'] ?></td>
                                                    <td><?php $time = strtotime($dsTinDang['ThoiGianDang']); $thoiGianDang = date('H:i | d-m-Y',$time); echo $thoiGianDang; ?></td>
                                                    <td>
                                                        <div class="hoatdong">
                                                            <?php
                                                                if($dsTinDang['KiemDuyet'] == 'Chưa duyệt'){
                                                            ?>
                                                            <div class="status-detail">
                                                                <i class="fa-solid fa-circle off"></i> <?php echo $dsTinDang['KiemDuyet'] ?>
                                                            </div>
                                                            <div class="btn-lock">
                                                                <a href="#" onclick="duyetTinDang('<?php echo $dsTinDang['MaTinDang'] ?>')"><i class="fa-solid fa-check"></i> Duyệt</a>
                                                            </div>
                                                            <?php
                                                                }else{
                                                            ?>
                                                            <div class="status-detail">
                                                                <i class="fa-solid fa-circle on"></i> <?php echo $dsTinDang['KiemDuyet'] ?>
                                                            </div>
                                                            <div class="btn-unlock">
                                                                <a href="#" onclick="boDuyetTinDang('<?php echo $dsTinDang['MaTinDang'] ?>')"><i class="fa-solid fa-xmark"></i> Bỏ duyệt</a>
                                                            </div>
                                                            <?php
                                                                }
                                                            ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="thaotac">
                                                            <div class="btn-update">
                                                                <a href="chi-tiet-tin-dang.php?id=<?php echo $dsTinDang['MaTinDang'] ?>"><i class="fas fa-eye"></i> Xem</a>
                                                            </div>
                                                            <div class="btn-delete">
                                                                <a class="color-delete" href="#" onclick="xoaTinDang('<?php echo $dsTinDang['MaTinDang'] ?>')"><i class="fa-solid fa-trash"></i> Xóa</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="combo-page">
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination">
                                        <?php
                                                if(!empty($_GET['trang']) && $_GET['trang'] != 1){
                                            ?>
                                            <li class="page-item">
                                                <a class="page-link" href="quan-ly-tin-dang.php?trang=<?php echo ($_GET['trang']-1).$getTrangThai.$getTuKhoa.$getSapXep ?>">Previous</a>
                                            </li>
                                            <?php }else{
                                            ?>
                                            <li class="page-item disabled">
                                                <a class="page-link" href="">Previous</a>
                                            </li>
                                            <?php
                                            } ?>
                                            <?php
                                                for($i=1; $i<=$soTrang; $i++){
                                                    if((empty($_GET['trang']) && $i == 1) || (!empty($_GET['trang']) && $i == $_GET['trang'])){
                                            ?>
                                            <li class="page-item"><a style="background: blue;color: white;" class="page-link" href="quan-ly-tin-dang.php?trang=<?php echo $i.$getTrangThai.$getTuKhoa.$getSapXep ?>"><?php echo $i ?></a></li>
                                            <?php
                                                    }else{
                                            ?>
                                            <li class="page-item"><a class="page-link" href="quan-ly-tin-dang.php?trang=<?php echo $i.$getTrangThai.$getTuKhoa.$getSapXep ?>"><?php echo $i ?></a></li>
                                            <?php
                                                    }
                                                }
                                            ?>
                                            <?php
                                                if(empty($_GET['trang'])){
                                            ?>
                                            <li class="page-item">
                                                <a class="page-link" href="quan-ly-tin-dang.php?trang=2<?php $getTrangThai.$getTuKhoa.$getSapXep; ?>">Next</a>
                                            </li>
                                            <?php
                                                }else{
                                            ?>
                                            <li class="page-item <?php echo ($_GET['trang'] == $soTrang || $soTrang == 1) ? 'disabled' : '' ?>">
                                                <a class="page-link" href="quan-ly-tin-dang.php?trang=<?php echo ($_GET['trang']+1).$getTrangThai.$getTuKhoa.$getSapXep; ?>">Next</a>
                                            </li>
                                            <?php
                                                }
                                            ?>
                                        </ul>
                                    </nav>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php require "../inc/admin/footer.php" ?>