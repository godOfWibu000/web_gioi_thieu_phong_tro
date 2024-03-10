// $('.btn-expand-collapse').click(function(e) {
//     $('.navbar-primary').toggleClass('collapsed');
// });

$('.btn-expand-collapse').click(function(e) {
    // Toggle the 'collapsed' class on '.navbar-primary'
    $('.navbar-primary').toggleClass('collapsed');

    // Get the reference to '.admin-title'
    var adminTitle = $('.admin-title');

    // Check if '.navbar-primary' has 'collapsed' class
    if ($('.navbar-primary').hasClass('collapsed')) {
        // If collapsed, set left to 250px
        adminTitle.css('left', '106px');
    } else {
        // If not collapsed, set left to 106px
        adminTitle.css('left', '250px');
    }
});


$(document).ready(function() {
    // Xử lý sự kiện click cho các thẻ a với class "tab-link"
    $('.tab-link').on('click', function() {
        // Lấy giá trị của href
        var targetTab = $(this).attr('href');

        // Loại bỏ lớp 'active' từ tất cả các tab-pane
        $('.tab-pane').removeClass('active');

        // Thêm lớp 'active' vào tab-pane tương ứng
        $(targetTab).addClass('active');
    });
});

document.addEventListener("DOMContentLoaded", function() {
    var menuItems = document.querySelectorAll('.navbar-primary-menu li');

    menuItems.forEach(function(item) {
        item.addEventListener('click', function() {
            // Remove the focus class from all items
            menuItems.forEach(function(menuItem) {
                menuItem.classList.remove('focused-item');
            });

            // Add the focus class to the clicked item
            item.classList.add('focused-item');
        });
    });
});

// Tai khoan
function khoaTaiKhoan(id){
    if(confirm('Bạn có muốn khóa tài khoản này?')){
        $.ajax({
            url: "../action/admin/khoa_tai_khoan.php",
            method: "POST",
            data: {id:id},
            success: function (data) {
                alert('Khóa tài khoản thành công!')
                location.reload();
            }
        });
    }
}
function moKhoaTaiKhoan(id){
    if(confirm('Bạn có muốn mở khóa tài khoản này?')){
        $.ajax({
            url: "../action/admin/mo_khoa_tai_khoan.php",
            method: "POST",
            data: {id:id},
            success: function (data) {
                alert('Mở khóa tài khoản thành công!')
                location.reload();
            }
        });
    }
}
function xoaTaiKhoan(id){
    if(confirm('Bạn có muốn xóa tài khoản này?')){
        $.ajax({
            url: "../action/admin/xoa_tai_khoan.php",
            method: "POST",
            data: {id:id},
            success: function (data) {
                alert('Xóa tài khoản thành công!')
                location.reload();
            }
        });
    }
}

// Tin dang
function duyetTinDang(id){
    if(confirm('Bạn có muốn duyệt tin đăng này?')){
        $.ajax({
            url: "../action/admin/duyet_tin_dang.php",
            method: "POST",
            data: {id:id},
            success: function (data) {
                alert('Duyệt tin đăng thành công!')
                location.reload();
            }
        });
    }
}
function boDuyetTinDang(id){
    if(confirm('Bạn có muốn bỏ duyệt tin đăng này?')){
        $.ajax({
            url: "../action/admin/bo_duyet_tin_dang.php",
            method: "POST",
            data: {id:id},
            success: function (data) {
                alert('Bỏ duyệt tin đăng thành công!')
                location.reload();
            }
        });
    }
}
function xoaTinDang(id){
    if(confirm('Bạn có muốn xóa tin đăng này?')){
        $.ajax({
            url: "../action/admin/xoa_tin_dang.php",
            method: "POST",
            data: {id:id},
            success: function (data) {
                alert('Xóa tin đăng thành công!')
                location.reload();
            }
        });
    }
}