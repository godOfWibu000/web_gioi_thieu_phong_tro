// Dang nhap
	function validateDangNhap() {
		let validate1 = validateRong('ten-dang-nhap', 'message-ten-dang-nhap', 'Vui lòng nhập tên đăng nhập!');
		let validate2 = validateKyTuToiThieu('ten-dang-nhap', 6, 'message-ten-dang-nhap', 'Tên đăng nhập cần nhập tối thiểu 6 ký tự! Vui lòng kiểm tra lại!!');
		let validate3 = validateMatKhau('mat-khau', 'message-mat-khau');
		if (validate1 == false || validate2 == false || validate3 == false)
			return;
		else {
			let tenDangNhap = document.getElementById('ten-dang-nhap').value.trim();
			let matKhau = document.getElementById('mat-khau').value.trim();
			$.ajax({
				url: "action/dang_nhap_dang_xuat/dang_nhap.php",
				method: "POST",
				data: { tenDangNhap: tenDangNhap, matKhau: matKhau },
				success: function (data) {
					if(data == 'Đăng nhập thành công!'){
						document.getElementById('message-dang-nhap').innerHTML = '<div class="back-color-pass color-white message"><h4 class="text-center">'+ data +'</h4></div>';
						window.location = 'index.php';
					}
					else
						document.getElementById('message-dang-nhap').innerHTML = '<div class="back-color-delete color-white message"><h4 class="text-center">'+ data +'</h4></div>';
				}
			});
		}
	}

// Dang ky
	function validateDangKy(){
		let validate1 = validateRong('ten-dang-nhap', 'message-ten-dang-nhap', 'Vui lòng nhập tên đăng nhập!');
		let validate2 = validateKyTuToiThieu('ten-dang-nhap', 6, 'message-ten-dang-nhap', 'Tên đăng nhập cần nhập tối thiểu 6 ký tự! Vui lòng kiểm tra lại!!');
		let validate3 = validateMatKhau('mat-khau', 'message-mat-khau');
		let validate4 = validateTrung2Truong('mat-khau', 'nhap-lai-mk', 'message-nhap-lai-mk', 'Vui lòng nhập lại mật khẩu trùng với trường mật khẩu phía trên!')
		if(validate1 == false || validate2 == false || validate3 == false || validate4 == false)
			return;
		else{
			let tenDangNhap = document.getElementById('ten-dang-nhap').value;
			let matKhau = document.getElementById('mat-khau').value;
			$.ajax({
				url: "action/dang_nhap_dang_xuat/dang_ky.php",
				method: "POST",
				data: { tenDangNhap: tenDangNhap, matKhau: matKhau },
				success: function (data) {
					if(data == 'Đăng ký thành công!'){
						document.getElementById('message-dang-ky').innerHTML = '<div class="back-color-pass color-white message"><h4 class="text-center">'+ data +'</h4></div>';
						document.getElementById('message-dang-nhap').innerHTML = 'Đăng ký thành công! <a class="a" href="dang-nhap.php">Đăng nhập</a>';
						document.getElementById('dang-nhap').reset();
					}
					else
						document.getElementById('message-dang-ky').innerHTML = '<div class="back-color-delete color-white message"><h4 class="text-center">'+ data +'</h4></div>';
				}
			});
		}
	}
