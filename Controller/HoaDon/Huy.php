<?php
	include_once("Model/HoaDon.php");
	include_once("Model/ChiTietHoaDon.php");
	include_once("Model/Sach.php");

	$hd = new HoaDon();

	$mahd = $_REQUEST['madonhang'];
	$makh = $_REQUEST['makh'];

	$trangthai = $_REQUEST['t'];

	$kq = $hd->HuyHoaDon($mahd, $trangthai);

	include_once("View/HoaDon/Huy.php");
?>