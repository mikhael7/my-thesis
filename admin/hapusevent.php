<?php 
	include "includes/config.php"; 	
	if(isset($_GET["eventhapus"]))
	{
		$id = $_GET['eventhapus'];
		mysqli_query($connection, "DELETE FROM tableevent WHERE eventid='$id'");
// 			echo 'Data untuk obyekwisata dengan kode = '.$obyekKODE.' berhasil dihapus';
		header("location: event.php");
	}
?>