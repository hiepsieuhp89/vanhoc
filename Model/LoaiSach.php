<?php
	include_once("DataProvider.php");
	class LoaiSach
	{
		private $cn;

		function __construct(){
			$this->cn = new DataProvider();
		}

		function LayLoaiSach(){
			$sql = "select * from loaisach";
			return $this->cn->FetchAll($sql);
		}

		function LayLoaiSachTheoMa($id){
			$sql = "select * from loaisach where MALOAI = $id";
			return $this->cn->Fetch($sql);
		}

		function LayLoaiSachTheoDanhMuc($madms)
		{
			$sql = "SELECT * FROM loaisach WHERE MALOAI IN (SELECT MALOAI FROM sach WHERE MADMS = $madms)";
			return $this->cn->FetchAll($sql);
		}

		function ThemLoaiSach($tenloai)
		{
			$sql = "INSERT INTO loaisach(TENLOAI) VALUES('$tenloai')";
			return $this->cn->ExecuteQueryInsert($sql);
		}

		function CapNhatLoaiSach($maloai, $tenloai)
		{
			$sql = "UPDATE loaisach SET TENLOAI = '$tenloai' WHERE MALOAI = $maloai";
			return $this->cn->ExecuteQuery($sql);
		}

		function XoaLoaiSach($maloai)
		{
			$sql = "DELETE FROM loaisach WHERE MALOAI = $maloai";
			return $this->cn->ExecuteQuery($sql);
		}

		function __destruct(){
			unset($this->cn);
		}
	}
?>