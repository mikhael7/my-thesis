<?php 
	include "includes/config.php"; 	
	if(isset($_GET["kategorihapus"]))
	{
		$kategoriKODE = $_GET['kategorihapus'];
		mysqli_query($connection, "DELETE FROM kategoriwisata WHERE kategoriKODE='$kategoriKODE'");
// 			echo 'Data untuk kategoriwisata dengan kode = '.$kategoriKODE.' berhasil dihapus';
		header("location: kategoriwisata.php");
	}
?>