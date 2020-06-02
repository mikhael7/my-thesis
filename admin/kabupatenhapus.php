<?php 
	include "includes/config.php"; 	
	if(isset($_GET["kabupatenhapus"]))
	{
		$kabupatenKODE = $_GET['kabupatenhapus'];
		mysqli_query($connection, "DELETE FROM kabupaten WHERE kabupatenKODE='$kabupatenKODE'");
// 			echo 'Data untuk Kabupaten dengan kode = '.$kabupatenKODE.' berhasil dihapus';
		header("location: Kabupaten.php");
	}
?>