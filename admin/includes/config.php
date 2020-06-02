<?php
/** 	Koneksi ke Basis Data, dengan nama file config.php  **/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "latloginpesonajawa";

$connection = mysqli_connect($servername, $username, $password, $dbname);
if(!$connection) /** Cek Konseksi ke basis data berhasil atau tidak**/
    { die("Connection Failed : ".mysql_connect_error());
    }
?>
