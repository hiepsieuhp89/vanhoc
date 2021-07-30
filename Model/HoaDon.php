<?php
	include_once("DataProvider.php");
	class HoaDon
	{
		private $cn;

		function __construct(){
			$this->cn = new DataProvider();
		}

		function ThemHoaDon($makh, $tennn, $diachi, $sdt, $email, $tongtien,$trangthai){
			$sql = "INSERT INTO hoadon(MAKH, NGAYHD, TONGTIEN,TRANGTHAI, TENNN, DIACHI, SDT, EMAIL) VALUES('$makh', CURDATE(), $tongtien, $trangthai, '$tennn', '$diachi', '$sdt', '$email')";
			return $this->cn->ExecuteQueryInsert($sql);
		}

		function CapNhatHoaDon($mahd, $makh, $tennn, $diachi, $sdt, $email, $tongtien, $trangthai)
		{
		
			$hoadon = $this->LayHoaDonTheoMa($mahd);

			if(($hoadon['TRANGTHAI'] == 0 && $trangthai == 2) || ($hoadon['TRANGTHAI'] == 0 && $trangthai == 1)){

				$sql = "SELECT S.MASACH, S.TENSACH, CTHD.SOLUONG FROM chitiethoadon CTHD JOIN sach S ON CTHD.MASACH = S.MASACH WHERE CTHD.MAHD = $mahd";

				$chitiethoadon = $this->cn->FetchAll($sql);

				foreach($chitiethoadon as $ct){

					$masach = $ct["MASACH"];
					
					$sql = "SELECT * FROM sach WHERE MASACH = $masach";

					$sach = $this->cn->Fetch($sql);

					$conlai = $sach["CONLAI"] - $ct["SOLUONG"];

					$sql = "UPDATE sach SET CONLAI = $conlai WHERE MASACH = $masach";

					$this->cn->ExecuteQuery($sql);
				}

			}
			if(($hoadon['TRANGTHAI'] == 1 || $hoadon['TRANGTHAI'] == 2)  && ($trangthai == 0 || $trangthai == 3 || $trangthai == 4)){

				$sql = "SELECT S.MASACH, S.TENSACH, CTHD.SOLUONG FROM chitiethoadon CTHD JOIN sach S ON CTHD.MASACH = S.MASACH WHERE CTHD.MAHD = $mahd";

				$chitiethoadon = $this->cn->FetchAll($sql);

				foreach($chitiethoadon as $ct){

					$masach = $ct["MASACH"];
					
					$sql = "SELECT * FROM sach WHERE MASACH = $masach";

					$sach = $this->cn->Fetch($sql);

					$conlai = $sach["CONLAI"] + $ct["SOLUONG"];

					$sql = "UPDATE sach SET CONLAI = $conlai WHERE MASACH = $masach";

					$this->cn->ExecuteQuery($sql);
				}

			}



			$sql = "UPDATE hoadon SET MAKH = $makh, TENNN = '$tennn', DIACHI = '$diachi', SDT = '$sdt', EMAIL = '$email', TONGTIEN = $tongtien, TRANGTHAI =$trangthai WHERE MAHD = $mahd";
			return $this->cn->ExecuteQuery($sql);
		}
		function HuyHoaDon($mahd, $trangthai)
		{
			

			$sql = "SELECT TRANGTHAI FROM hoadon WHERE MAHD = $mahd";
			
			$hoadon = $this->cn->Fetch($sql);

			if($hoadon['TRANGTHAI'] != 0)
				return false;

			$sql = "UPDATE hoadon SET TRANGTHAI = $trangthai WHERE MAHD = $mahd";
			return $this->cn->ExecuteQuery($sql);
		}

		function LayHoaDon()
		{
			$sql = "SELECT * FROM hoadon HD JOIN KHACHHANG KH ON HD.MAKH = KH.MAKH";
			return $this->cn->FetchAll($sql);
		}

		function LayHoaDonTheoMa($mahd)
		{
			$sql = "SELECT HD.MAHD, KH.MAKH, KH.TENKH, HD.TENNN, HD.DIACHI, HD.SDT, HD.EMAIL, HD.NGAYHD, TONGTIEN, HD.TRANGTHAI FROM hoadon HD JOIN KHACHHANG KH ON HD.MAKH = KH.MAKH WHERE MAHD = $mahd";
			return $this->cn->Fetch($sql);
		}

		function LayHoaDonTheoMaKH($makh)
		{
			$sql = "SELECT * FROM hoadon WHERE MAKH = $makh";
			return $this->cn->FetchAll($sql);
		}

		function XoaHoaDon($mahd)
		{
			$sql = "DELETE FROM hoadon WHERE MAHD = $mahd";
			return $this->cn->ExecuteQuery($sql);
		}

		function __destruct(){
			unset($this->cn);
		}
	}
?>