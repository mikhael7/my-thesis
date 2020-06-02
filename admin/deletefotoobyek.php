<?php 
	include "includes/config.php"; 	
	if(isset($_GET["deletefotoobyek"]))
	{
		$fotoobyekKODE = $_GET['deletefotoobyek'];
		mysqli_query($connection, "DELETE FROM fotoobyekwisata WHERE fotoobyekKODE='$fotoobyekKODE'");
// 			echo 'Data untuk Kabupaten dengan kode = '.$kabupatenKODE.' berhasil dihapus';
		header("location: fotoobyekwisata.php");
	}
?>