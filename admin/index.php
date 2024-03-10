<?php
    require "../inc/admin/header.php";
?>
<?php
    $getTrangThai = null;
    $getSapXep = null;
    $getTuKhoa = null;
    $trangThai = null;
    $sapXep = null;

    $sqlDSTK = "Select * From taikhoan Where LoaiTaiKhoan='user'";
    if(!empty($_GET['tu-khoa'])){
        $getTuKhoa = '&tu-khoa='.$_GET['tu-khoa'];
        $sqlDSTK .= " and (TenTaiKhoan Like '%".$_GET['tu-khoa']."%' Or HoTen Like '%".$_GET['tu-khoa']."%' Or SDT Like '%".$_GET['tu-khoa']."%' Or Email Like '%".$_GET['tu-khoa']."%')";
    }

    if(!empty($_GET['trang-thai'])){
        $trangThai=$_GET['trang-thai'];
        $getTrangThai='&trang-thai='.$_GET['trang-thai'];
        $sqlDSTK .= " and TrangThaiTaiKhoan='".$_GET['trang-thai']."'";
    }

    if(!empty($_GET['sap-xep'])){
        $sapXep = $_GET['sap-xep'];
        $getSapXep='&sap-xep='.$_GET['sap-xep'];
        if($_GET['sap-xep'] == 'A-Z')
            $sqlDSTK .= " Order By HoTen ASC";
        else
            $sqlDSTK .= " Order By HoTen DESC";
    }else
        $sqlDSTK .= " Order By HoTen ASC";
?>

                    <div class="tab-content">
                        <div class="user-management active" id="user">
                            <div class="qly-user">
                                <div class="qly-user-title">
                                    <h3>Danh sách tài khoản</h3>
                                </div>
                            </div>
                            <div class="qly-user-main">
                                <div class="qly-search">
                                    <div class="combobox-search">
                                        <?php
                                            if($trangThai == null){
                                        ?>
                                        <span onclick="window.location='index.php?trang=1<?php echo $getSapXep.$getTuKhoa ?>'">
                                            <input type="radio" name="loc" id="loc-tat-ca" checked>
                                            <label for="">Tất cả</label>
                                        </span>
                                        <span onclick="window.location='index.php?trang=1&trang-thai=Đang hoạt động<?php echo $getSapXep.$getTuKhoa; ?>'">
                                            <input type="radio" name="loc" id="loc-hoat-dong">
                                            <label for="loc-hoat-dong">Hoạt động</label>
                                        </span>
                                        <span onclick="window.location='index.php?trang=1&trang-thai=Đang bị khóa<?php echo $getSapXep.$getTuKhoa ?>'">
                                            <input type="radio" name="loc" id="loc-bi-khoa">
                                            <label for="loc-bi-khoa">Bị khóa</label>
                                        </span>
                                        <?php
                                            }else if($trangThai == 'Đang hoạt động'){
                                        ?>
                                        <span onclick="window.location='index.php?trang=1<?php echo $getSapXep.$getTuKhoa ?>'">
                                            <input type="radio" name="loc" id="loc-tat-ca">
                                            <label for="">Tất cả</label>
                                        </span>
                                        <span onclick="window.location='index.php?trang=1&trang-thai=Đang hoạt động<?php echo $getSapXep.$getTuKhoa ?>'">
                                            <input type="radio" name="loc" id="loc-hoat-dong" checked>
                                            <label for="loc-hoat-dong">Hoạt động</label>
                                        </span>
                                        <span onclick="window.location='index.php?trang=1&trang-thai=Đang bị khóa<?php echo $getSapXep.$getTuKhoa ?>'">
                                            <input type="radio" name="loc" id="loc-bi-khoa">
                                            <label for="loc-bi-khoa">Bị khóa</label>
                                        </span>
                                        <?php
                                            }else{
                                        ?>
                                        <span onclick="window.location='index.php?trang=1<?php echo $getSapXep.$getTuKhoa ?>'">
                                            <input type="radio" name="loc" id="loc-tat-ca">
                                            <label for="">Tất cả</label>
                                        </span>
                                        <span onclick="window.location='index.php?trang=1&trang-thai=Đang hoạt động<?php echo $getSapXep.$getTuKhoa ?>'">
                                            <input type="radio" name="loc" id="loc-hoat-dong">
                                            <label for="loc-hoat-dong">Hoạt động</label>
                                        </span>
                                        <span onclick="window.location='index.php?trang=1&trang-thai=Đang bị khóa<?php echo $getSapXep.$getTuKhoa ?>'">
                                            <input type="radio" name="loc" id="loc-bi-khoa" checked>
                                            <label for="loc-bi-khoa">Bị khóa</label>
                                        </span>
                                        <?php
                                            }
                                        ?>
                                        
                                        <?php
                                            if($sapXep == null || $sapXep == 'A-Z'){
                                        ?>
                                        <select name="type" onchange="window.location='index.php?trang=1<?php echo $getTrangThai.$getTuKhoa ?>&sap-xep='+this.value">
                                            <option value="A-Z">A-Z</option>
                                            <option value="Z-A">Z-A</option>
                                        </select>
                                        <?php
                                            }else{
                                        ?>
                                        <select name="type" onchange="window.location='index.php?trang=1<?php echo $getTrangThai.$getTuKhoa ?>&sap-xep='+this.value">
                                            <option value="Z-A">Z-A</option>
                                            <option value="A-Z">A-Z</option>
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
                                                    <th scope="col">Username</th>
                                                    <th scope="col">Họ tên</th>
                                                    <th scope="col">Số điện thoại</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Trạng thái</th>
                                                    <th scope="col">Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if(isset($_GET['tu-khoa']))
                                                        echo "<h4>Kết quả tìm kiếm cho '".$_GET['tu-khoa']."' <a href=\"index.php\">Quay lại</a></h4>";
                                                    $soTaiKhoan = mysqli_num_rows(mysqli_query($conn, $sqlDSTK));
                                                    $soTrang = ceil($soTaiKhoan / 10);

                                                    if(empty($_GET['trang']) || $_GET['trang'] == 1)
                                                        $sqlDSTK .= ' Limit 0,10';
                                                    else
                                                        $sqlDSTK .= ' Limit ' . (($_GET['trang']-1)*10) . ',10';
                                                    $dsTaiKhoanQuery = mysqli_query($conn, $sqlDSTK);

                                                    if($dsTaiKhoanQuery->num_rows>0){
                                                        while($dsTaiKhoan = $dsTaiKhoanQuery->fetch_assoc()){
                                                    ?>
                                                <tr>
                                                    <th scope="row"><?php echo $dsTaiKhoan['TenTaiKhoan'] ?></th>
                                                    <td><?php echo $dsTaiKhoan['HoTen'] ?></td>
                                                    <td><?php echo $dsTaiKhoan['SDT'] ?></td>
                                                    <td><?php echo $dsTaiKhoan['Email'] ?></td>
                                                    <td>
                                                        <div class="hoatdong">
                                                            <?php
                                                                if($dsTaiKhoan['TrangThaiTaiKhoan'] == 'Đang hoạt động'){
                                                            ?>
                                                            <div class="status-detail">
                                                                <i class="fa-solid fa-circle on"></i> <?php echo $dsTaiKhoan['TrangThaiTaiKhoan'] ?>
                                                            </div>
                                                            <div class="btn-lock">
                                                                    <a href="#" onclick="khoaTaiKhoan('<?php echo $dsTaiKhoan['TenTaiKhoan'] ?>')"><i class="fa-solid fa-lock"></i> Khóa</a>
                                                            </div>
                                                            <?php
                                                                }else{
                                                            ?>
                                                            <div class="status-detail">
                                                                <i class="fa-solid fa-circle off"></i> <?php echo $dsTaiKhoan['TrangThaiTaiKhoan'] ?>
                                                            </div>
                                                            <div class="btn-unlock">
                                                                    <a href="#" onclick="moKhoaTaiKhoan('<?php echo $dsTaiKhoan['TenTaiKhoan'] ?>')"><i class="fa-solid fa-lock-open"></i> Mở khóa</a>
                                                                </div>
                                                            <?php
                                                                }
                                                            ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="thaotac">
                                                            <div class="btn-update">
                                                                <a href="chi-tiet-tai-khoan.php?id=<?php echo $dsTaiKhoan['TenTaiKhoan'] ?>"><i class="fas fa-eye"></i> Xem</a>
                                                            </div>
                                                            <div class="btn-delete">
                                                                <a href="#" onclick="xoaTaiKhoan('<?php echo $dsTaiKhoan['TenTaiKhoan'] ?>')"><i class="fa-solid fa-trash"></i> Xóa</a>
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
                                                <a class="page-link" href="index.php?trang=<?php echo ($_GET['trang']-1).$getTrangThai.$getTuKhoa.$getSapXep ?>">Previous</a>
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
                                            <li class="page-item"><a style="background: blue;color: white;" class="page-link" href="index.php?trang=<?php echo $i.$getTrangThai.$getTuKhoa.$getSapXep ?>"><?php echo $i ?></a></li>
                                            <?php
                                                    }else{
                                            ?>
                                            <li class="page-item"><a class="page-link" href="index.php?trang=<?php echo $i.$getTrangThai.$getTuKhoa.$getSapXep ?>"><?php echo $i ?></a></li>
                                            <?php
                                                    }
                                                }
                                            ?>
                                            <?php
                                                if(empty($_GET['trang'])){
                                            ?>
                                            <li class="page-item">
                                                <a class="page-link" href="index.php?trang=2<?php $getTrangThai.$getTuKhoa.$getSapXep; ?>">Next</a>
                                            </li>
                                            <?php
                                                }else{
                                            ?>
                                            <li class="page-item <?php echo ($_GET['trang'] == $soTrang || $soTrang == 1) ? 'disabled' : '' ?>">
                                                <a class="page-link" href="index.php?trang=<?php echo ($_GET['trang']+1).$getTrangThai.$getTuKhoa.$getSapXep; ?>">Next</a>
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