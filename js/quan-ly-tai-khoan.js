// Thong tin tai khoan
	function capNhatThongTin(){
		if(confirm('Bạn muốn cập nhật thông tin!'))
			return true;
		else
			return false;
	}

	function validateDoiMatKhau(){
		let validate1 = validateMatKhau('mat-khau-moi', 'message-mat-khau-moi');
		let validate2 = validateTrung2Truong('mat-khau-moi', 'nhap-lai-mat-khau-moi', 'message-nhap-lai-mat-khau-moi', 'Vui lòng nhập lại mật khẩu trùng với trường mật khẩu phía trên!');
		let validate3 = validateMatKhau('mat-khau', 'message-mat-khau');

		if(validate1 == false || validate2 == false || validate3 == false)
			return;
		else{
			let matKhauMoi = document.getElementById('mat-khau-moi').value;
			let matKhauCu = document.getElementById('mat-khau').value;
			$.ajax({
				url: "../action/dang_nhap_dang_xuat/doi_mat_khau.php",
				method: "POST",
				data: { matKhauMoi:matKhauMoi, matKhauCu:matKhauCu },
				success: function (data) {
					if(data == 'Đổi mật khẩu thành công!'){
						document.getElementById('message-doi-mat-khau').innerHTML = '<div class="back-color-pass color-white message"><h4 class="text-center">'+ data +'</h4></div>';
						document.getElementById('form-doi-mat-khau').reset();
					}
					else
						document.getElementById('message-doi-mat-khau').innerHTML = '<div class="back-color-delete color-white message"><h4 class="text-center">'+ data +'</h4></div>';
				}
			});
		}
	}

// Tai len file
	function layTenFIle(id){
		let tenFile = document.getElementById(id);
		const { files } = event.target;
		console.log("files", files);
		tenFile.textContent = files[0].name;
	}

	function hienAnhUpload(fileInput, id){
		if(fileInput.files && fileInput.files[0]){
			let reader = new FileReader();

			reader.onload = function (e) {
				$('#' + id).attr('src', e.target.result);
			}
			reader.readAsDataURL(fileInput.files[0]);
		}
	}

// Dang tin
	function getDiaDiem(element){
		$.ajax({
			url: "../action/thong_tin_nguoi_dung/get_dia_diem.php",
			method: "POST",
			data: { id:element.value },
			success: function (data) {
				document.getElementById('dia-diem-1').innerHTML
				= document.getElementById('dia-diem-2').innerHTML
				= document.getElementById('dia-diem-3').innerHTML
				= data;
			}
		});
	}

// Cap nhat, xoa tin
	function xoaTinDang(id){
		if(confirm('Bạn có chắc chắn muốn xóa tin này?')){
			$.ajax({
				url: "../action/thong_tin_nguoi_dung/xoa_tin.php",
				method: "POST",
				data: { id:id },
				success: function (data) {
					alert('Đã xóa thành công!');
					location.reload();
				}
			});
		}
	}

// Loc tin
	function locTinDangNguoiDung() {
		let locTheoTrangThai;
		let luaChonLocTheoTrangThai = document.querySelectorAll('#loc-theo-trang-thai input');
		for(x of luaChonLocTheoTrangThai){
			if(x.checked == true)
				locTheoTrangThai = x.value;
		}
		let locTheoThoiGian = document.getElementById('loc-theo-thoi-gian').value;
		$.ajax({
			url: "../action/thong_tin_nguoi_dung/loc_tin_dang_nguoi_dung.php",
			method: "POST",
			data: { locTheoTrangThai:locTheoTrangThai, locTheoThoiGian:locTheoThoiGian },
			success: function (data) {
				document.getElementById('ds-tin-dang-nguoi-dung').innerHTML = data;
			}
		});
	}
	function locTinDangDaLuu() {
		let loc = document.getElementById('loc').value;
		$.ajax({
			url: "../action/thong_tin_nguoi_dung/loc_tin_dang_da_luu.php",
			method: "POST",
			data: { loc:loc },
			success: function (data) {
				document.getElementById('ds-tin-dang-da-luu').innerHTML = data;
			}
		});
	}


