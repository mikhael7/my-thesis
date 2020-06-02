<?php 
	include "includes/config.php"; 	
	if(isset($_GET["kecamatanhapus"]))
	{
		$kecamatanKODE = $_GET['kecamatanhapus'];
		mysqli_query($connection, "DELETE FROM kecamatan WHERE kecamatanKODE='$kecamatanKODE'");
// 			echo 'Data untuk kategoriwisata dengan kode = '.$kategoriKODE.' berhasil dihapus';
		header("location: kecamatan.php");
	}
?>