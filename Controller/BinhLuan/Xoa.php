<?php
	if(!empty($_GET['id']))
	{
		include_once("Model/BinhLuan.php");
		$bl = new BinhLuan();
		$kq = $bl->XoaBinhLuan($_GET['id']);
	}

	include_once("View/BinhLuan/Xoa.php");
?>