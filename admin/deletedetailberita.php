<?php 
	include "includes/config.php"; 	
	if(isset($_GET["deletedetailberita"]))
	{
		$beritaKODE = $_GET['deletedetailberita'];
		mysqli_query($connection, "DELETE FROM berita WHERE beritaKODE='$beritaKODE'");
// 			echo 'Data untuk Kabupaten dengan kode = '.$kabupatenKODE.' berhasil dihapus';
		header("location:detilberita.php");
	}
?>