<?php 
	ob_start();
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Bookstore</title>
	<link rel="stylesheet" href="lib/bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
	<link rel="icon" href="image/Martz90-Circle-Books.ico">
	<link rel="stylesheet" type="text/css" href="lib/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="lib/slick/slick-theme.css"/>
	<link rel="stylesheet" href="lib/jquery-ui-1.12.1.custom/jquery-ui.min.css">
	<link rel="stylesheet" href="lib/jquery-comments/css/jquery-comments.css">
	<link rel="stylesheet" href="lib/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="lib/jquery-bar-rating/fontawesome-stars.css">
	<style type="text/css">
		body{
			background: linear-gradient( rgb(0 149 10 / 20%), rgba(0, 0, 0, 0.2) ), url(image/body.jpg) fixed;
		}

		.jumbotron{
			margin-bottom: 0;
			padding-top: 25px;
			padding-bottom: 15px;
			position: relative;
			background: none;
		}

		.jumbotron::before{
			background-color: #dedede;
			background-size: cover;
			background-position: center center;
			opacity: 0.4;
			content: "";
			position: absolute;
			top: 0;
			left: 0;
			bottom: 0;
			right: 0;
		}

		.navbar {
				margin-bottom: 0;
				background-color: #ffebcd;
				z-index: 9;
		}
		.affix{
			top: 0;
			width: 100%;
		}

		.panel{
			border-radius: 0;
		}

		footer{
			padding: 10px;
			background-color: #eee;
			margin-top: 20px;
		}

		.cycle-slideshow img{
			height: auto;
			width: 100%;
		}

		.panel-sach{
			transition: box-shadow 0.5s;
		}

		.panel-sach:hover {
				background-color: #fffaf3;
				box-shadow: 0 0 15px rgb(0 0 0 / 20%);
		}

		.panel-sach .tensach{
			font-size: 18px;
			padding: 5px 0;
		}

		.panel-sach .tensach.text-ellipsis{
			width: 200px;
			white-space: nowrap;
			text-overflow: ellipsis;
			overflow: hidden;
		}

		.panel-sach .tensach a:hover{
			text-decoration: none;
		}

		.panel-sach .biasach{
			height: 150px;
			width: 100px;
		}

		.panel-sach .moi{
			width: 100px;
			height: 20px;
			background-color: #b71c1c;
			color: white;
			font-weight: bold;
			position: absolute;
		}

		.panel-sach .giaban, .panel-sach .tentg, .panel-sach .tennxb{
			padding-bottom: 5px;
			font-size: 17px;
		}

		.multi-book .panel-sach img{
			margin-left: auto;
			margin-right: auto;
		}

		.slick-prev:before{
			color: gray;
		}

		.slick-next:before{
			color: gray;
		}

		.multi-book{
			padding-left: 20px;
			padding-right: 20px;
		}

		.multi-book .slick-prev{
			left: -5px;
		}

		.multi-book .slick-next{
			right: -5px;
		}

		.alert-top{
			position: fixed;
			top: 70px;
			z-index: 9999;
			left: 50%;
			transform: translateX(-50%);
		}

		.carousel img{
			width: 100%;
		}

		.carousel{
			border: 1px solid #ddd;
			border-top: none;
		}

		.carousel .slick-dots{
			bottom: 0px;
		}

		.error{
			color: red;
			font-style: italic;
		}
		.menu-container{
			background-color: blanchedalmond;
		}
		.navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover, .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover {
				color: #555;
				background-color: #fffbdb;
		}
		.navbar-default .navbar-nav>li>a {
				font-weight: 700;
				color: #777;
		}
		.btn-danger{
			color: #fff;
			background-color: #5cb85c;
			border-color: #4cae4c;
		}
	</style>
	<script src="lib/jquery/jquery-3.1.1.min.js"></script>
	<script src="lib/slick/slick.min.js"></script>
	<script src="lib/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<script src="lib/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="lib/jquery-validation/jquery.validate.min.js"></script>
	<script src="lib/jquery-validation/additional-methods.min.js"></script>
	<script src="lib/jquery-comments/js/jquery-comments.min.js"></script>
	<script src="lib/jquery-bar-rating/jquery.barrating.min.js"></script>
</head>
<body>
  <div>
		<div class="jumbotron">
			<div class="container">
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center">
					<a href="trangchu.php">
						<img style="max-width:140px;" src="image/books-icon.png" alt="Image">
					</a>
					<div style="font-size: 20px">Văn học Việt</div>
				</div>
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 text-center">
					<form class="form-inline" role="form" style="margin-top: 45px">
						<div class="form-group">
							<label class="sr-only" for="tensach">Tìm kiếm</label>
							<input type="text" class="form-control" name="tensach" size="50" placeholder="Nhập tên sách cần tìm" required>
						</div>
						<input type="hidden" name="c" value="Sach">
						<input type="hidden" name="act" value="DanhSach">
						<button type="submit" class="btn btn-primary" name="btnTimKiem"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Tìm kiếm</button>
					</form>
					<div style="margin-top: 20px; margin-right: 118px" class="pull-right">
						<a href="trangchu.php?c=GioHang&act=DanhSach" class="btn btn-default"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Giỏ hàng</a></li>
						<?php 
							include_once("Controller/KhachHang/TaiKhoan.php");
						?>
					</div>
				</div>
			</div>
		</div>

		<nav class="navbar navbar-default" data-spy="affix" data-offset-top="175">
			<div class="container menu-container">
				<div class="navbar-header">
					<a class="navbar-brand" href="trangchu.php">Trang chủ</a>
				</div>
				<?php include_once("Controller/DanhMuc/DanhMuc.php") ?>
			</div>		
		</nav>
	</div>

<style>
	.hinh{
		height: 370px;
	}

	.hinh img{
		top: 30%;
		left: 50%;
		position: absolute;
		transform: translate(-50%, -30%);
		max-height: 250px;
	}

	.hinh .rate{
		left: 50%;
		bottom: 20px;
		position: absolute;
		transform: translateX(-50%);
	}

	#star{
		position: absolute;
	}

	#star .text{
		font-size: 26px;
	}
</style>
<?php
	
	$id = $_GET['masach'];
	include_once("Model/Sach.php");
	include_once("Model/DanhGia.php");
	$danhgia = new DanhGia();
	$sach = new Sach();
	$result = $sach->LaySachTheoMa($id);
	$list_book = $sach->LaySachTheoDanhMucLoai($_REQUEST['madms'], $_REQUEST['maloai']);

	if(isset($_SESSION['TaiKhoan']))
	{
		$r_diem = $danhgia->LayDanhGiaKH($id, $_SESSION['TaiKhoan']['MAKH']);
		$diem = isset($r_diem['DIEM']) ? $r_diem['DIEM']:0;
	}

	$r_danhgia = $danhgia->LayDanhGiaSach($id);

	if($r_danhgia['SL'] > 0)
	{
		$tongdiem = $r_danhgia['TONGDIEM'];
		$sl = $r_danhgia['SL'];
		$diemdg = round($tongdiem/$sl, 1);
	}

	if(count($list_book) < 1)
	{
		$list_book = $sach->LaySachTheoDanhMuc($_REQUEST['madms']);
	}

	$moi = '';

	$ngayxb = $result['NGAYXB'];
	
	if($ngayxb != '')
	{

		$today = date('Y-m-d');

		$diff = date_diff(date_create($today), date_create($ngayxb));

		$day = $diff->format("%a");

		if(intval($day) <= 30)
		{
			$moi = "<div class='moi'>NEW</div>";
		}
	}

	if($result['CONLAI'] > 0)
	{
		$button = '<button type="button" class="btn btn-danger btn-lg btnThem" >Đặt ngay</button>';
	}
	else
	{
		$button = '<button type="submit" class="btn btn-danger btn-lg disabled">Hết hàng</button>';
	}

	$gia = number_format($result['GIABAN']);

	$option_danhgia = '';
	for ($i=1; $i <=5; $i++) { 
		if(isset($diem) && $diem == $i)
		{
			$option_danhgia.="<option value='$i' selected>$i</option>";
		}
		else
		{
			$option_danhgia.="<option value='$i'>$i</option>";
		}
	}

	$ddg = '';
	if(isset($diem))
		$ddg = "(Bạn đã thực hiện đánh giá)";

	$tdg = '';

	if(isset($diemdg))
	{
		$tdg = <<< EOD
		<span class="fa-stack fa-3x" id="star">
			<i class="fa fa-star fa-stack-2x" aria-hidden="true" style="color: #ffeb3b"></i>
			<strong class="fa-stack-1x text">$diemdg</strong>
		</span>
EOD;
	}

	$item = <<<EOD
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 hinh">
					<img src="hinh/{$result['HINH']}">
					$moi
					$tdg
					<div class="rate text-center">
					<h5>Đánh giá sản phẩm</h5>
						<select id="barrating">
							<option value=""></option>
							$option_danhgia
						</select>
						$ddg
					</div>
				</div>
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
					<div class="tensanpham"><h3 class="text-primary">{$result['TENSACH']}</h3></div>
					<div class="thongtincoban">
						<table class="table table-hover">
							<caption><h4>Thông tin sách</h4></caption>
							<tbody>
								<tr>
									<td>Tác giả: </td><td>{$result['TENTG']}</td>
								</tr>
								<tr>
									<td>Nhà xuất bản: </td><td>{$result['TENNXB']}</td>
								</tr>
								<tr>
									<td>Kích thước: </td><td>{$result['KICHTHUOC']}</td>
								</tr>
								<tr>
									<td>Số trang: </td><td>{$result['SOTRANG']}</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="giaban"><h3 class="text-danger">Giá bán: $gia VNĐ</h3></div>
					<form method="post">
						<input type="hidden" name="masach" value="{$result['MASACH']}">
						<input type="hidden" name="btnThem">
						$button
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container" style="margin-top: 20px">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Giới thiệu về sách</h3>
			</div>
			<div class="panel-body">
				{$result['BAIGIOITHIEU']}
			</div>
		</div>
	</div>
EOD;
	echo $item;
?>

<?php 
	if(count($list_book) > 1):
?>
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Các quyển sách liên quan</h3>
		</div>
		<div class="panel-body">
			<?php
				$size = 4;
				if(count($list_book) < 4)
					$size = count($list_book);
				for ($i=0; $i < $size; $i++) {
					$row = $list_book[$i];
					if($row['MASACH'] == $id)
						continue;
					$moi = '';
					$ngayxb = $row['NGAYXB'];
					if($ngayxb != '')
					{
						$today = date('Y-m-d');

						$diff = date_diff(date_create($today), date_create($ngayxb));

						$day = $diff->format("%a");

						if(intval($day) <= 30)
						{
							$moi = '<div class="moi">NEW</div>';
						}
					}

					if($row['CONLAI'] > 0)
					{
						$button = '<button type="submit" class="btn btn-danger" name="btnThem">Mua ngay</button>';
					}
					else
					{
						$button = '<button type="button" class="btn btn-danger disabled">Hết hàng</button>';
					}

					$gia = number_format($row['GIABAN']);
					$sach = <<<EOD
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<div class="panel panel-default">
							<div class="panel-body panel-sach text-center">
								<img class="biasach" src="hinh/{$row['HINH']}">
								$moi
								<div class="tensach text-ellipsis"><a href="trangchu.php?act=xem&hienthi=chitiet&madms={$row['MADMS']}&maloai={$row['MALOAI']}&masach={$row['MASACH']}">{$row['TENSACH']}</a></div>
								<div class="giaban text-danger">Giá bán: $gia VNĐ</div>
								<form method="post">
									<input type="hidden" name="masach" value="{$row['MASACH']}">
									<div class="btn-group">
										$button
										<a href="chitietsanpham.php?madms={$row['MADMS']}&maloai={$row['MALOAI']}&masach={$row['MASACH']}" class="btn btn-primary">Chi tiết</a>
									</div>
								</form>
							</div>
						</div>
					</div>
EOD;
					echo $sach;
				}
			?>
		</div>
	</div>
</div>
<?php
	endif;
?>
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Bình luận về sách</h3>
		</div>
		<div class="panel-body">
			<div id="comments-container"></div>
		</div>
	</div>
</div>
<footer class="container-fulid text-center">
		<h5>Văn học Việt</h5>
	</footer>

	<script src="lib/app.js"></script>
</body>
</html>
<?php
	ob_flush();
?>
