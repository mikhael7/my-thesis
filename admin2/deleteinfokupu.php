<?php
    include "./config.php";
    if (isset ($_GET["deleteinfokupu"]))
    {
        $infokupuID = $_GET['deleteinfokupu'];
        mysqli_query ($connection, "DELETE FROM info WHERE info_id='$infokupuID'");
        //echo 'Data untuk infoID dengan kode = '.infokupuID.' berhasil dihapus';
        header("location:infokupu.php");
    }
?>
