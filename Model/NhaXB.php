<?php
	include_once("DataProvider.php");
	class NhaXB
	{
		private $cn;

		function __construct(){
			$this->cn = new DataProvider();
		}

		function LayNhaXB(){
			$sql = "SELECT * FROM nhaxuatban";
			return $this->cn->FetchAll($sql);
		}

		function LayNhaXBTheoMa($id){
			$sql = "SELECT * FROM nhaxuatban WHERE MANXB = $id";
			return $this->cn->Fetch($sql);
		}

		function ThemNhaXB($tennxb, $diachi)
		{
			$sql = "INSERT INTO nhaxuatban(TENNXB, DIACHI) VALUES('$tennxb', '$diachi')";
			return $this->cn->ExecuteQueryInsert($sql);
		}

		function CapNhatNhaXB($manxb, $tennxb, $diachi)
		{
			$sql = "UPDATE nhaxuatban SET TENNXB = '$tennxb', DIACHI = '$diachi' WHERE MANXB = $manxb";
			return $this->cn->ExecuteQuery($sql);
		}

		function XoaNhaXB($manxb)
		{
			$sql = "DELETE FROM nhaxuatban WHERE MANXB = $manxb";
			return $this->cn->ExecuteQuery($sql);
		}

		function __destruct(){
			unset($this->cn);
		}
	}
?>