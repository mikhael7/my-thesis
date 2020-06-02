<?php 
	include "includes/config.php"; 	
	if(isset($_GET["kegiatanhapus"]))
	{
		$eventKODE = $_GET['kegiatanhapus'];
		mysqli_query($connection, "DELETE FROM kegiatan WHERE eventKODE='$eventKODE'");
// 			echo 'Data untuk kategoriwisata dengan kode = '.$kategoriKODE.' berhasil dihapus';
		header("location: kegiatan.php");
	}
?>