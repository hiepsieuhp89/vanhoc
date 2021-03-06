<?php
	include_once("DataProvider.php");
	class DanhGia
	{
		private $cn;

		function __construct(){
			$this->cn = new DataProvider();
		}

		function LayDanhGiaSach($masach)
		{
			$sql = "SELECT SUM(DIEM) AS TONGDIEM, COUNT(*) AS SL FROM danhgia WHERE MASACH = $masach";
			return $this->cn->Fetch($sql);
		}

		function LayDanhGiaKH($masach, $makh)
		{
			$sql = "SELECT DIEM FROM danhgia WHERE MASACH = $masach AND MAKH = $makh";
			return $this->cn->Fetch($sql);
		}

		function ThemDanhGia($masach, $makh, $diem)
		{
			$sql = "INSERT INTO danhgia VALUES($masach, $makh, $diem)";
			return $this->cn->ExecuteQueryInsert($sql);
		}

		function CapNhatDanhGia($masach, $makh, $diem)
		{
			$sql = "UPDATE danhgia SET DIEM = $diem WHERE MASACH = $masach AND MAKH = $makh";
			return $this->cn->ExecuteQuery($sql);
		}

		function XoaDanhGia($masach, $makh)
		{
			$sql = "DELETE FROM danhgia WHERE MASACH = $masach AND MAKH = $makh";
			return $this->cn->ExecuteQuery($sql);
		}

		function __destruct(){
			unset($this->cn);
		}
	}
?>