<?php
	include_once("DataProvider.php");
	class ChiTietHoaDon
	{
		private $cn;

		function __construct(){
			$this->cn = new DataProvider();
		}

		function ThemChiTietHoaDon($mahd, $masach, $soluong){
			$sql = "INSERT INTO chitiethoadon VALUES('$masach', '$mahd', $soluong)";
			return $this->cn->ExecuteQueryInsert($sql);
		}

		function LayChiTietHoaDonTheoMa($mahd)
		{
			$sql = "SELECT S.MASACH, S.TENSACH, CTHD.SOLUONG FROM chitiethoadon CTHD JOIN sach S ON CTHD.MASACH = S.MASACH WHERE CTHD.MAHD = $mahd";
			return $this->cn->FetchAll($sql);
		}

		function CapNhatChiTietHoaDon($mahd, $masach, $soluong)
		{
			$sql= "UPDATE chitiethoadon SET SOLUONG = $soluong WHERE MAHD = $mahd AND MASACH = $masach";
			return $this->cn->ExecuteQuery($sql);
		}

		function XoaChiTietHoaDon($mahd, $masach)
		{
			$sql = "DELETE FROM chitiethoadon WHERE MAHD = $mahd, MASACH = $masach";
			return $this->cn->ExecuteQuery($sql);
		}

		function __destruct(){
			unset($this->cn);
		}
	}
?>