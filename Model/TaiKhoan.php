<?php
	include_once("DataProvider.php");
	class TaiKhoan
	{
		private $cn;

		function __construct(){
			$this->cn = new DataProvider();
		}

		function LayTaiKhoan()
		{
			$sql = 'SELECT * FROM taikhoan';
			return $this->cn->FetchAll($sql);
		}

		function LayTaiKhoanTheoMa($matk)
		{
			$sql = "SELECT * FROM taikhoan WHERE MATK = $matk";
			return $this->cn->Fetch($sql);
		}

		function DangNhap($tentk, $matkhau)
		{
			$sql = "SELECT * FROM taikhoan WHERE TENTK = '$tentk' AND MATKHAU = md5('$matkhau')";
			$result = $this->cn->Fetch($sql);
			if(count($result) > 0)
				$_SESSION['TaiKhoan_QL'] = $result;
		}

		function DangXuat()
		{
			if(isset($_SESSION['TaiKhoan_QL']))
				unset($_SESSION['TaiKhoan_QL']);
		}

		function ThemTaiKhoan($tentk, $matkhau, $chucvu)
		{
			$sql = "INSERT INTO taikhoan(TENTK, MATKHAU, CHUCVU) VALUES('$tentk', md5('$matkhau'), '$chucvu')";
			return $this->cn->ExecuteQueryInsert($sql);
		}

		function KiemTraTenTK($tentk)
		{
			$sql = "SELECT * FROM taikhoan WHERE TENTK = '$tentk'";
			return $this->cn->NumRows($sql);
		}

		function CapNhatTaiKhoan($matk, $chucvu)
		{
			$sql = "UPDATE taikhoan SET CHUCVU = '$chucvu' WHERE MATK = $matk";
			return $this->cn->ExecuteQuery($sql);
		}

		function DoiMatKhau($matk, $matkhau)
		{
			$sql = "UPDATE taikhoan SET MATKHAU = md5('$matkhau') WHERE MATK = $matk";
			return $this->cn->ExecuteQuery($sql);
		}

		function XoaTaiKhoan($matk)
		{
			$sql = "DELETE FROM taikhoan WHERE MATK = $matk";
			return $this->cn->ExecuteQuery($sql);
		}

		function __destruct(){
			unset($this->cn);
		}
	}
?>