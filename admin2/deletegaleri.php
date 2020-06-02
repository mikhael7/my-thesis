<?php
    include "./config.php";
    if (isset ($_GET["deletegaleri"]))
    {
        $galeriID = $_GET['deletegaleri'];
        mysqli_query ($connection, "DELETE FROM galeri WHERE galeri_id='$galeriID'");
        //echo 'Data untuk infoID dengan kode = '.galeriID.' berhasil dihapus';
        header("location:gallery.php");
    }
?>
