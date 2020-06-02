<?php 
	include "includes/config.php"; 	
	if(isset($_GET["beritahapus"]))
	{
		$kategoriberitaKODE = $_GET['beritahapus'];
		mysqli_query($connection, "DELETE FROM kategoriberita WHERE kategoriberitaKODE='$kategoriberitaKODE'");
// 			echo 'Data untuk obyekwisata dengan kode = '.$obyekKODE.' berhasil dihapus';
		header("location: kategoriberita.php");
	}
?>