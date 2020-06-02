<?php 
	include "includes/config.php"; 	
	if(isset($_GET["hapusfoto"]))
	{
		$fotoKODE = $_GET['hapusfoto'];
		mysqli_query($connection, "DELETE FROM editfoto WHERE fotoKODE='$fotoKODE'");
// 			echo 'Data untuk editfoto dengan kode = '.$fotoKODE.' berhasil dihapus';
		header("location: editfoto.php");
	}
?>