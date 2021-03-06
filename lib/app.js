$(document).ready(function(){

	$('.carousel').slick({
		autoplay: true,
		dots: true
	});

	$('.multi-book').slick({
		infinite: true,
		slidesToShow: 4,
		slidesToScroll: 4
	});

	$('#btnTangDan').click(function(){
		var querystring = location.search;
		if(querystring.indexOf("sapxep=") > -1)
		{
			querystring = querystring.replace("sapxep=-1", "sapxep=1");
		}
		else
		{
			querystring += "&sapxep=1";
		}
		location.href = "trangchu.php" + querystring;
	});

	$('#btnGiamDan').click(function(){
		var querystring = location.search;
		if(querystring.indexOf("sapxep=") > -1)
		{
			querystring = querystring.replace("sapxep=1", "sapxep=-1");
		}
		else
		{
			querystring += "&sapxep=-1";
		}
		location.href = "trangchu.php" + querystring;
	});

	$('#btnXoaSX').click(function(){
		var querystring = location.search;
		if(querystring.indexOf("sapxep=") > -1)
		{
			if(querystring.indexOf("sapxep=1") > -1)
				querystring = querystring.replace("&sapxep=1", "");
			else if(querystring.indexOf("sapxep=-1") > -1)
				querystring = querystring.replace("&sapxep=-1", "");
			location.href = "trangchu.php" + querystring;
		}
	});


	$('#btnGrid').click(function(){
		var querystring = location.search;
		if(querystring.indexOf("danght=") > -1)
		{
			querystring = querystring.replace("danght=list", "danght=grid");
		}
		else
		{
			querystring += "&danght=grid";
		}
		location.href = "trangchu.php" + querystring;

		$("#danght").val("grid");
	});

	$('#btnList').click(function(){
		var querystring = location.search;
		if(querystring.indexOf("danght=") > -1)
		{
			querystring = querystring.replace("danght=grid", "danght=list");
		}
		else
		{
			querystring += "&danght=list";
		}
		location.href = "trangchu.php" + querystring;

		$("#danght").val("list");
	});

	$('#frmDangXuat').submit(function(e){
		$('#querystr').val(location.search);
	});

	$('#DangNhap').click(function(e){
		if($('#frmDangNhap').length == 0 && $('#frmDangKy').length == 0 && location.search.indexOf('act=DangKy') < 0 && location.search.indexOf('act=DonHangDaDat') < 0)
		{
			var querystr = encodeURIComponent(location.search);
			var href = $(this).attr('href');
			$(this).attr('href', href + "&querystr=" + querystr);
		}
	});

	$('.panel-sach').css('cursor', 'pointer');

	$('.panel-sach').click(function(e){
		location.href = $(this).find('form a').attr('href');
	});

	$('.panel-sach .moi').each(function(){
		var pos = $(this).parent().find('.biasach').position();
		var s = $('.multi-book').length > 0 ? 53: 0;
		$(this).css({'top': pos.top + 130, 'left': pos.left + s});
	});

	if($('.hinh .moi').length > 0)
	{
		var w_hinh = $('.hinh img').width();
		var h_hinh = $('.hinh img').height();
		var pos_hinh = $('.hinh img').position();
		$('.hinh .moi').css({'background-color': '#b71c1c', 'color': 'white', 'width': w_hinh, 'height': 25, 'line-height': '25px','text-align': 'center', 'font-weight': 'bold', 'position': 'absolute', 'left': pos_hinh.left, 'top': pos_hinh.top + h_hinh - 25});
	}

	$('.btnThem').click(function(e){
		e.stopPropagation();
		var data;
		if(e.target.parentNode.tagName.toLowerCase() == "form")
			data = $(e.target.parentNode).serialize();
		else
			data = $(e.target.parentNode.parentNode).serialize();
		$.ajax({
			url: 'Controller/GioHang/DanhSach.php',
			method: 'post',
			data: data,
			success: function(res){
				var err = JSON.parse(res);
				if(err == 0)
					$('body').append('<div class="alert alert-success alert-top fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Th??ng b??o!</strong> B???n ???? th??m s??ch v??o gi??? h??ng th??nh c??ng</div>');
				else
					$('body').append('<div class="alert alert-danger alert-top fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>L???i!</strong> B???n ???? th??m s??ch v??o gi??? h??ng kh??ng th??nh c??ng</div>');

				setTimeout(function(){
					$(".alert-top").alert("close");
				}, 5000);
			}
		})
	});

	$(".btnXoa").click(function(e){
		var tr = $(this).parent().parent();
		var masach = tr.find("[name=masach]").val();

		$.ajax({
			url: 'Controller/GioHang/DanhSach.php',
			method: 'post',
			data: {c: 'GioHang', act: 'DanhSach', btnXoa: '', masach: masach},
			success: function(res)
			{
				var err = JSON.parse(res);

				if(err == 0)
				{
					tr.remove();
					//cap nhat cot tt
					if($(".stt").length > 0)
					{
						$(".stt").each(function(index){
							$(this).text(index + 1);
						});
					}
					else
					{
						$("table").remove();
						$(".panel-footer").remove();
						$(".panel-body").html("<h5>B???n kh??ng c?? s??ch n??o trong gi???</h5><div><a href='trangchu.php'>Nh???p v??o ????y ????? xem c??c quy???n s??ch kh??c</a></div>");
					}

					$('body').append('<div class="alert alert-success alert-top fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Th??ng b??o!</strong> B???n ???? xo?? s???n ph???m</div>');
					
					setTimeout(function(){
						$(".alert-top").alert("close");
					}, 5000);
				}
			}
		});
	})

	$('.capnhat').change(function(e){
		var input = $(this);
		var soluong = input.val();

		if(soluong > 0)
		{
			var masach = $(this).parent().parent().parent().find('[name=masach]').val();
			var tonggia = $(this).parent().parent().next().next();

			$.ajax({
				url: 'Controller/GioHang/DanhSach.php',
				method: 'post',
				data: {btnCapNhat: '', masach: masach, soluong: soluong},
				success: function(res){
					var result = JSON.parse(res);

					if(result.error == 1)
					{
						tonggia.text(result.tonggia + " VN??");
						input.val(result.conlai);
						$('#tonghd').text(result.tonghd + " VN??");

						$('body').append('<div class="alert alert-warning alert-top fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Th??ng b??o!</strong> ' + result.msg + '</div>');
						setTimeout(function(){
							$(".alert-top").alert("close");
						}, 5000);
					}
					else if(result.error == 0)
					{
						tonggia.text(result.tonggia + " VN??");
						$('#tonghd').text(result.tonghd + " VN??");

						$('body').append('<div class="alert alert-success alert-top fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Th??ng b??o!</strong> B???n ???? c???p nh???t s???n ph???m</div>');
						setTimeout(function(){
							$(".alert-top").alert("close");
						}, 5000);
					}
				}
			});
		}
	});

	$('#slider-range').slider({
		range: true,
		min: 1000,
		max: 500000,
		values: [50000, 300000],
		slide: function(e, ui){
			var str = "Gi?? t???: " + ui.values[0] + " VN?? ?????n: " + ui.values[1] + " VN??";
			$('#label-slider-range').text(str);
		}
	});

	$('#frmTimKiem').submit(function(e){
		$('input[name=gia1]').val($('#slider-range').slider("values", 0));
		$('input[name=gia2]').val($('#slider-range').slider("values", 1));
	});

	if($('#frmTimKiem').length > 0)
	{
		var gia1 = $('input[name=gia1]').val();
		var gia2 = $('input[name=gia2]').val();
		if(gia1 != '' && gia2 != '')
		{
			$('#slider-range').slider("values", 0, gia1);
			$('#slider-range').slider("values", 1, gia2);
			$('#label-slider-range').text("Gi?? t???: " + gia1 + " VN?? ?????n: " + gia2 + " VN??");
		}
	}

	$('#date-picker-ngaysinh').datepicker({
		maxDate: "-18y", dateFormat: 'yy-mm-dd'
	});

	$('#frmDangKy').validate({
		rules: {
			tentk: {
				minlength: 6,
				remote: {
					url: 'Controller/KhachHang/KiemTra.php',
					type: 'post',
					data: {
						Loai: 'TenTK', tentk: function(){return $('#tentk').val();}
					}
				}
			},
			matkhau: {
				minlength: 6
			},
			r_matkhau:{
				minlength: 6,
				equalTo: '#matkhau'
			},
			sdt: {
				digits: true,
				minlength: 7
			}
		},
		messages: {
			tentk: {
				required: 'B???n ch??a nh???p t??n t??i kho???n.',
				minlength: 'B???n ph???i nh???p t??n t??i kho???n tr??n 6 k?? t???.',
				remote: 'T??n t??i kho???n b??? tr??ng. B???n h??y d??ng t??n kh??c.'
			},
			matkhau:{
				required: 'B???n ch??a nh???p m???t kh???u',
				minlength: 'B???n ph???i nh???p m???t kh???u tr??n 6 k?? t???.'
			},
			r_matkhau: {
				required: 'B???n ch??a nh???p m???t kh???u',
				equalTo: 'B???n nh???p l???i m???t kh???u ch??a tr??ng h???p',
				minlength: 'B???n ph???i nh???p m???t kh???u tr??n 6 k?? t???.'
			},
			tenkh: {
				required: 'B???n ch??a nh???p h??? v?? t??n.'
			},
			gioitinh: {
				required: 'B???n ch??a ch???n gi???i t??nh.'
			},
			ngaysinh: {
				required: 'B???n ch??a nh???p ng??y sinh.'
			},
			diachi: {
				required: 'B???n ch??a nh???p ?????a ch???.'
			},
			sdt: {
				required: 'B???n ch??a nh???p s??? ??i???n tho???i.',
				digits: 'B???n nh???p s??? ??i???n tho???i kh??ng h???p l???.',
				minlength: 'B???n nh???p s??? ??i???n tho???i kh??ng h???p l???.'
			},
			email: {
				required: 'B???n ch??a nh???p ?????a ch??? email.',
				email: 'B???n nh???p email kh??ng h???p l???'
			}
		}
	});

	$('#frmDangNhap').validate({
		rules:{
			tentk:{
				minlength: 6
			},
			matkhau:{
				minlength: 6
			}
		},
		messages: {
			tentk: {
				required: 'B???n ch??a nh???p t??n t??i kho???n',
				minlength: 'B???n ph???i nh???p t??n t??i kho???n tr??n 6 k?? t???.'
			},
			matkhau:{
				required: 'B???n ch??a nh???p m???t kh???u',
				minlength: 'B???n ph???i nh???p m???t kh???u tr??n 6 k?? t???.'
			}
		}
	});

	$('#doimatkhau').change(function(){
		$('#div-doimatkhau').toggle('fast');
	});

	$('#frmThongTin').validate({
		rules: {
			ngaysinh: {
				date: true
			},
			email: {
				email: true
			},
			sdt: {
				digits: true,
				minlength: 7
			},
			matkhau_cu: {
				required: "#doimatkhau:checked",
				minlength: 6,
				remote: {
					url: 'Controller/KhachHang/KiemTra.php',
					type: 'post',
					data: {
						Loai: 'MatKhauCu', matkhau_cu: function(){ return $('#matkhau_cu').val();}
					}
				}
			},
			matkhau: {
				required: "#doimatkhau:checked",
				minlength: 6
			},
			r_matkhau: {
				required: "#doimatkhau:checked",
				minlength: 6,
				equalTo: '#matkhau'
			}
		},
		messages: {
			hoten: {
				required: 'B???n ch??a nh???p h??? v?? t??n.'
			},
			ngaysinh: {
				required: 'B???n ch??a nh???p ng??y sinh.',
				date: 'B???n nh???p ng??y sinh ch??a h???p l???.'
			},
			email: {
				required: 'B???n ch??a nh???p ?????a ch??? email.',
				email: 'B???n nh???p ?????a ch??? email ch??a h???p l???.'
			},
			sdt: {
				required: 'B???n ch??a nh???p s??? ??i???n tho???i.',
				digits: 'B???n nh???p s??? ??i???n tho???i ch??a h???p l???.',
				minlength: 'B???n nh???p s??? ??i???n tho???i ch??a h???p l???.'
			},
			matkhau_cu: {
				required: 'B???n ch??a nh???p m???t kh???u.',
				minlength: 'M???t kh???u ph???i d??i h??n 6 k?? t???.',
				remote: 'B???n nh???p l???i m???t kh???u c?? ch??a ch??nh x??c.'
			},
			matkhau: {
				required: 'B???n ch??a nh???p m???t kh???u.',
				minlength: 'M???t kh???u ph???i d??i h??n 6 k?? t???.'
			},
			r_matkhau:{
				required: 'B???n ch??a nh???p m???t kh???u.',
				minlength: 'M???t kh???u ph???i d??i h??n 6 k?? t???.',
				equalTo: 'B???n nh???p l???i m???t kh???u ch??a ch??nh x??c.'
			}
		}
	});

	$('#frmDatHang').validate({
		rules: {
			sdt: {
				minlength: 7,
				digits: true
			},
			email: {
				email: true
			}
		},
		messages: {
			tennn: {
				required: "B???n ch??a nh???p t??n ng?????i nh???n"
			},
			diachi: {
				required: "B???n ch??a nh???p ?????a ch??? giao h??ng"
			},
			sdt: {
				required: 'B???n ch??a nh???p s??? ??i???n tho???i.',
				digits: 'B???n nh???p s??? ??i???n tho???i ch??a h???p l???.',
				minlength: 'B???n nh???p s??? ??i???n tho???i ch??a h???p l???.'
			},
			email: {
				required: 'B???n ch??a nh???p ?????a ch??? email.',
				email: 'B???n nh???p ?????a ch??? email ch??a h???p l???.'
			}
		}
	});

	$('#barrating').barrating({
		theme: 'fontawesome-stars',
		deselectable: true,
		allowEmpty: true,
		onSelect: function(value)
		{
			if(value != '')
			{
				$.ajax({
					url: "Controller/Sach/DanhGia.php",
					type: "post",
					data: { DanhGia: '', masach: $('[name=masach]').val(), makh: $('[name=makh]').val(), diem: value },
					success: function(res)
					{
						var result = JSON.parse(res);
						if(result.error == 0)
						{
							$('body').append('<div class="alert alert-success alert-top fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Th??ng b??o!</strong> B???n ???? ????nh gi?? th??nh c??ng</div>');
						}
						else
						{
							$('body').append('<div class="alert alert-danger alert-top fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Th??ng b??o!</strong> B???n c???n ????ng nh???p ????? ????nh gi??</div>');
						}

						setTimeout(function(){
							$(".alert-top").alert("close");
						}, 5000);
					}
				});
			}
			else
			{
				$.ajax({
					url: "Controller/Sach/DanhGia.php",
					type: "post",
					data: { XoaDanhGia: '', masach: $('[name=masach]').val(), makh: $('[name=makh]').val()},
					success: function(res)
					{
						var result = JSON.parse(res);
						if(result.error == 0)
						{
							$('body').append('<div class="alert alert-success alert-top fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Th??ng b??o!</strong> B???n ???? hu??? ????nh gi?? th??nh c??ng</div>');
						}
						else
						{
							$('body').append('<div class="alert alert-danger alert-top fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Th??ng b??o!</strong> B???n c???n ????ng nh???p ????? hu??? ????nh gi??</div>');
						}

						setTimeout(function(){
							$(".alert-top").alert("close");
						}, 5000);
					}
				});
			}
		}
	});

	if($('#barrating').length > 0)
	{
		var pos = $('.hinh img').position();
		var width_hinh = $('.hinh img').width();
		var width_star = $('#star').width();
		var height_star = $('#star').height();
		$('#star').css({'top': pos.top - height_star/2, 'left': pos.left + width_hinh - (width_star/2)});
	}

	$('#comments-container').comments({
		textareaPlaceholderText: "Nh???p l???i b??nh lu???n",
		newestText: "M???i",
		oldestText: "C??",
		popularText: "Ph??? bi???n",
		sendText: "G???i b??nh lu???n",
		replyText: "Tr??? l???i",
		editText: "Ch???nh s???a",
		editedText: "???? ch???nh s???a",
		youText: "B???n",
		saveText: "L??u",
		deleteText: "Xo??",
		noCommentsText: "Kh??ng c?? l???i b??nh lu???n n??o",
		enableAttachments: false,
		enableHashtags: false,
		enablePinging: false,
		postCommentOnEnter: true,
		getComments: function(success, error)
		{
			$.ajax({
				url: 'Controller/Sach/BinhLuan.php',
				type: 'get',
				data: { masach: $('[name=masach]').val() },
				success: function(res)
				{
					var result = JSON.parse(res);
					if(result.error == 0)
						success(result.list);
				}
			});
		},
		postComment: function(comment, success, error)
		{
			comment.fullname = $('[name=tentk]').val();
			$.ajax({
				url: 'Controller/Sach/BinhLuan.php',
				type: 'post',
				data: { Them: '', masach: $('[name=masach]').val(), comment: JSON.stringify(comment) },
				success: function(res)
				{
					var result = JSON.parse(res);
					if(result.error == 0)
					{
						success(comment);
					}
					else
					{
						$('body').append('<div class="alert alert-danger alert-top fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Th??ng b??o!</strong> B???n c???n ????ng nh???p ????? b??nh lu???n</div>');
						setTimeout(function(){
							$(".alert-top").alert("close");
						}, 5000);
					}
				}
			});
		},
		putComment: function(comment, success, error)
		{
			comment.modified = new Date(comment.modified);
			$.ajax({
				url: 'Controller/Sach/BinhLuan.php',
				type: 'post',
				data: { CapNhat: '', masach: $('[name=masach]').val(), comment: JSON.stringify(comment) },
				success: function(res)
				{
					var result = JSON.parse(res);
					if(result.error == 0)
					{
						success(comment);
					}
				}
			});
		},
		deleteComment: function(comment, success, error)
		{
			$.ajax({
				url: 'Controller/Sach/BinhLuan.php',
				type: 'post',
				data: { Xoa: '', masach: $('[name=masach]').val(), comment: JSON.stringify(comment) },
				success: function(res)
				{
					var result = JSON.parse(res);
					if(result.error == 0)
					{
						success();
					}
				}
			});
		},
		upvoteComment: function(comment, success, error)
		{
			$.ajax({
				url: 'Controller/Sach/BinhLuan.php',
				type: 'post',
				data: { CapNhat: '', masach: $('[name=masach]').val(), comment: JSON.stringify(comment) },
				success: function(res)
				{
					var result = JSON.parse(res);
					if(result.error == 1)
					{
						comment.upvote_count--;
						comment.user_has_upvoted = false;
						$('body').append('<div class="alert alert-danger alert-top fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Th??ng b??o!</strong> B???n c???n ????ng nh???p ????? th???c hi???n ch???c n??ng n??y</div>');
						setTimeout(function(){
							$(".alert-top").alert("close");
						}, 5000);
					}
					success(comment);
				}
			});
		}
	});
});