// Show hidden menu
	function showMenu(){
		document.getElementById('menu').style.display = 'block';
		document.getElementById('menu-toggle').onclick = function () { hiddenMenu() };
	}
	function hiddenMenu(){
		document.getElementById('menu').style.display = 'none';
		document.getElementById('menu-toggle').onclick = function () { showMenu() };
	}

// Dieu huong trang
	function dieuHuong(link) {
		window.location = link;
	}
	function taiLaiTrang(){
		location.reload();
	}
	
// Mo dong cua so
	function moCuaSo(idCuaSo, idNenCuaSo){
		document.getElementById(idCuaSo).style.display = 'block';
		document.getElementById(idNenCuaSo).style.display = 'block';
	}
	function dongCuaSo(idCuaSo, idNenCuaSo){
		document.getElementById(idCuaSo).style.display = 'none';
		document.getElementById(idNenCuaSo).style.display = 'none';
	}

// Loc tin dang
	function locTinDang(danhMuc, diaDiem, tuKhoa, trangSo) {
		let sapXep = document.getElementById('sap-xep').value;

		let locTheoGia = document.querySelectorAll('#loc-tin-dang-theo-gia input');
		let locTheoDienTich = document.querySelectorAll('#loc-tin-dang-theo-dien-tich input');
		let loc1; let loc2;
		for (key of locTheoGia) {
			if (key.checked) {
				loc1 = key.value;
			}
		}
		for (key of locTheoDienTich) {
			if (key.checked) {
				loc2 = key.value;
			}
		}

		$.ajax({
			url: "action/tin_dang/loc_tin_dang.php",
			method: "POST",
			data: { locTheoGia: loc1, locTheoDienTich: loc2, sapXep: sapXep, trangSo: trangSo, danhMuc: danhMuc, diaDiem: diaDiem, tuKhoa: tuKhoa },
			success: function (data) {
				document.getElementById('ds-tin-dang').innerHTML = data;
			}
		});
	}

// Thu gon, mo rong
	function moRong(idElement, idIcon, idButton) {
		document.getElementById(idElement).style.display = 'block';
		document.getElementById(idIcon).innerHTML = 'expand_less';
		document.getElementById(idButton).onclick = function () { thuGon(idElement, idIcon, idButton) };
	}
	function thuGon(idElement, idIcon, idButton) {
		document.getElementById(idElement).style.display = 'none';
		document.getElementById(idIcon).innerHTML = 'expand_more';
		document.getElementById(idButton).onclick = function () { moRong(idElement, idIcon, idButton) };
	}

// Validate
	function validateFail(input, message1, message) {
		input.focus();
		input.style.border = '1px solid red';
		message1.textContent = message;
	}
	function validatePass(input, message1) {
		input.style.border = '1px solid grey';
		message1.textContent = '';
	}
	function validateRong(idInput, idMessage, message) {
		let input = document.getElementById(idInput);
		let message1 = document.getElementById(idMessage);
		if (input.value.trim() == '') {
			validateFail(input, message1, message);
			return false;
		} else {
			validatePass(input, message1);
			return true;
		}
	}
	function validateKyTuToiThieu(idInput, soKyTu, idMessage, message) {
		let input = document.getElementById(idInput);
		let message1 = document.getElementById(idMessage);

		if (input.value.trim().length > 0 && input.value.trim().length < soKyTu) {
			validateFail(input, message1, message);
			return false;
		} else if (input.value.length >= soKyTu) {
			validatePass(input, message1);
			return true;
		}
	}
	function validateTrung2Truong(idTruong1, idTruong2, idMessage, message){
		let truong1 = document.getElementById(idTruong1);
		let truong2 = document.getElementById(idTruong2);
		let message1 = document.getElementById(idMessage);

		if(truong1.value != truong2.value){
			validateFail(truong2, message1, message);
			return false;
		}else{
			validatePass(truong2, message1);
			return true;
		}
	}
	function validateMatKhau(idInput, idMessage) {
		let input = document.getElementById(idInput);
		let message1 = document.getElementById(idMessage);

		if (input.value.trim() == '') {
			validateFail(input, message1, 'Vui lòng nhập mật khẩu!');
			return false;
		} else if (input.value.trim().match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&_])[A-Za-z\d@$!%*?&_]{8,}$/)) {
			validatePass(input, message1);
			return true;
		} else {
			validateFail(input, message1, 'Mật khẩu cần chứa ít nhất 8 ký tự, chứa ký tự in hoa, in thường, số và ký tự đặc biệt(@$!%*?&_)!');
			return false;
		}
	}

// Dang xuat
	function dangXuat(redirect){
		if(confirm('Bạn có chắc chắn muốn đăng xuất?')){
			$.ajax({
				url: redirect + "action/dang_nhap_dang_xuat/dang_xuat.php",
				method: "POST",
				data: {},
				success: function (data) {
					window.location = redirect + 'index.php';
				}
			});
		}
	}

function enterForm(idSelectorInput, idButton){
	let inputDangNhap = document.querySelectorAll('#' + idSelectorInput + ' input');
	for(x of inputDangNhap){
		x.addEventListener("keypress", function (event) {
			if (event.key === "Enter") {
				document.getElementById(idButton).click();
			}
		});
	}
}

function anHienMatKhau(idInput, idIcon) {
	let input = document.getElementById(idInput);
	let icon = document.getElementById(idIcon);
	if (input.type == 'password') {
		input.type = 'text';
		icon.innerHTML = '<span class="material-symbols-outlined">visibility_off</span>';
	} else {
		input.type = 'password';
		icon.innerHTML = '<span class="material-symbols-outlined">visibility</span>';
	}
}

function luuTinDang(id, trangThai, redirect){
	let thoiGian = getThoiGian();
	$.ajax({
		url: redirect + "action/tin_dang/luu_tin_dang.php",
		method: "POST",
		data: { id:id, trangThai:trangThai, thoiGian:thoiGian },
		success: function (data) {
			let element = document.getElementById(id);
			if(data == 1){
				element.innerHTML = '<i class="fas fa-bookmark" style="color: #d63031;"></i>';
				element.onclick = function () { luuTinDang(id, 'Bỏ lưu', redirect) }
				element.title = 'Bỏ lưu';
			}else{
				if(element != null){
					element.innerHTML = '<i class="far fa-bookmark" style="color: #d63031;"></i>';
					element.onclick = function () { luuTinDang(id, 'Lưu', redirect) }
					element.title = 'Lưu lại';
				}else
					location.reload();
			}
		}
	});
}

// Get thoi gian
	function getThoiGian(){
        let d = new Date;
        let thoiGian = d.getFullYear();
        let thang = d.getMonth()+1;
        if(thang<10)
            thang = '0' + thang;
        let ngay = d.getDate();
        if(ngay<10)
            ngay = '0' + ngay;
        let gio = d.getHours();
        if(gio<10)
            gio = '0' + gio;
        let phut = d.getMinutes();
        if(phut<10)
            phut = '0' + phut;
        let giay = d.getSeconds();
        if(giay<10)
            giay = '0' + giay;
        thoiGian += ('-' + thang + '-' + ngay + ' ' + gio + ':' + phut + ':' + giay);

        return thoiGian;
    }

    function getNgayThang(){
        let d = new Date;
        let thoiGian = d.getFullYear();
        let thang = d.getMonth()+1;
        if(thang<10)
            thang = '0' + thang;
        let ngay = d.getDate();
        if(ngay<10)
            ngay = '0' + ngay;
        thoiGian += ('-' + thang + '-' + ngay);

        return thoiGian;
    } 