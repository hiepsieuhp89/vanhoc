<?php
	include_once("Model/BinhLuan.php");
	$bl = new BinhLuan();
	$result = $bl->LayBinhLuan();
	include_once("View/BinhLuan/QuanLy.php");
?>