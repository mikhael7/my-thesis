<?php 
	include "includes/config.php"; 	
	if(isset($_GET["obyekhapus"]))
	{
		$obyekKODE = $_GET['obyekhapus'];
		mysqli_query($connection, "DELETE FROM obyekwisata WHERE obyekKODE='$obyekKODE'");
// 			echo 'Data untuk obyekwisata dengan kode = '.$obyekKODE.' berhasil dihapus';
		header("location: namaobyekwisata.php");
	}
?>