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
			background: url('image/body.jpg') fixed;
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
					<div style="font-size: 20px">V??n h???c Vi???t</div>
				</div>
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 text-center">
					<form class="form-inline" role="form" style="margin-top: 45px">
						<div class="form-group">
							<label class="sr-only" for="tensach">T??m ki???m</label>
							<input type="text" class="form-control" name="tensach" size="50" placeholder="Nh???p t??n s??ch c???n t??m" required>
						</div>
						<input type="hidden" name="c" value="Sach">
						<input type="hidden" name="act" value="DanhSach">
						<button type="submit" class="btn btn-primary" name="btnTimKiem"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> T??m ki???m</button>
					</form>
					<div style="margin-top: 20px; margin-right: 118px" class="pull-right">
						<a href="trangchu.php?c=GioHang&act=DanhSach" class="btn btn-default"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Gi??? h??ng</a></li>
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
					<a class="navbar-brand" href="trangchu.php">Trang ch???</a>
				</div>
				<?php include_once("Controller/DanhMuc/DanhMuc.php") ?>
			</div>		
		</nav>
	</div>

	<div class="container">
		<div class="carousel">
			<div><img style="max-height:380px;object-fit:cover;" alt="First slide" src="image/banner_website_t10-03.jpg"></div>
			<div><img style="max-height:380px;object-fit:cover;" alt="Second slide" src="image/banner_website_t10-02.jpg"></div>
		</div>
	</div>

	<?php
		if(isset($_REQUEST['c']) && isset($_REQUEST['act']))
		{
			if(($_REQUEST['c'] == 'Sach'))
				include_once("Controller/Sach/Breadcrumb.php");

			// if(($_REQUEST['c'] == 'DonHang'))
			// 	include_once("Controller/HoaDon/Breadcrumb.php");

			include_once("Controller/".$_REQUEST['c']."/".$_REQUEST['act'].".php");
		}
		else
		{
			include_once("Controller/Sach/Sach_Top.php");
		}
	?>

	<footer class="container-fulid text-center">
		<h5>V??n h???c Vi???t</h5>
	</footer>

	<script src="lib/app.js"></script>
</body>
</html>
<?php
	ob_flush();
?>
