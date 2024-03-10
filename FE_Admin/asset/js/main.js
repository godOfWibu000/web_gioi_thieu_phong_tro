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
// Xóa tin
function openPopupDeletePost() {
    document.getElementById('overlayDeletePost').style.display = 'flex';
}

function closePopupDeletePost(choice) {
    document.getElementById('overlayDeletePost').style.display = 'none';
    if (choice) {
        alert('Đã xóa tin đăng thành công.');
    } else {
        alert('Đã hủy thao tác.');
    }
}

// Xóa user
function openPopupDeleteUser() {
    document.getElementById('overlayDeleteUser').style.display = 'flex';
}

function closePopupDeleteUser(choice) {
    document.getElementById('overlayDeleteUser').style.display = 'none';
    if (choice) {
        alert('Đã xóa người dùng thành công.');
    } else {
        alert('Đã hủy thao tác.');
    }
}

// Khóa user
function openPopupLock() {
    document.getElementById('overlayLock').style.display = 'flex';
}

function closePopupLock(choice) {
    document.getElementById('overlayLock').style.display = 'none';
    if (choice) {
        alert('Đã khóa người dùng thành công.');
    } else {
        alert('Đã hủy thao tác.');
    }
}

// Mở Khóa user
function openPopupUnLock() {
    document.getElementById('overlayUnLock').style.display = 'flex';
}

function closePopupUnLock(choice) {
    document.getElementById('overlayUnLock').style.display = 'none';
    if (choice) {
        alert('Đã mở khóa người dùng thành công.');
    } else {
        alert('Đã hủy thao tác.');
    }
}

// Duyệt tin
function openPopupD() {
    document.getElementById('overlayD').style.display = 'flex';
}

function closePopupD(choice) {
    document.getElementById('overlayD').style.display = 'none';
    if (choice) {
        alert('Đã duyệt tin đăng thành công.');
    } else {
        alert('Đã hủy thao tác.');
    }
}

// Hủy Duyệt tin
function openPopupHD() {
    document.getElementById('overlayHD').style.display = 'flex';
}

function closePopupHD(choice) {
    document.getElementById('overlayHD').style.display = 'none';
    if (choice) {
        alert('Đã hủy duyệt tin đăng thành công.');
    } else {
        alert('Đã hủy thao tác.');
    }
}

// LOG OUT
function openPopupLogOut() {
    document.getElementById('overlayLogOut').style.display = 'flex';
}

function closePopupLogOut(choice) {
    document.getElementById('overlayLogOut').style.display = 'none';
    if (choice) {
        alert('Bạn đã đăng xuất.');
    } else {

    }
}


// btn Lưu
function clickSave() {
    alert('Lưu dữ liệu thành công.');
}