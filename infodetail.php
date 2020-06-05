<?php
    if (!isset ($_GET['infoid'])) {
        header("location: Informasi.php");
    }
    $infoid = $_GET['infoid'];
    include "./admin2/config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengenalan</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/info.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
    <?php 

      //  include "includes/menu.php";
    ?>

    <!--navbar -->
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top"> 
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="col-12">
                <ul id="navigationbar" class="nav navbar-nav">
                <li>
                    <a class="nav-item nav-link" href="Beranda.php">Beranda</a>
                </li>
                <li>
                    <a class="nav-item nav-link" href="Pengenalan.php">Pengenalan</a>
                </li>
                <li>
                    <a class="nav-item nav-link Active" href="Informasi.php">Informasi<span class="sr-only">(current)</span></a>
                </li>
                <li>
                    <a class="nav-item nav-link" href="Galeri.php">Galeri</a>
                </li>
                <li>
                    <a class="nav-item nav-link" href="Bantuan.php">Bantuan</a>
                </li>
                </ul>
            </div>
            </div>
        </nav>
    </div>
    <!-- --> 

    <main>
        <?php
            $info_detail_sql = mysqli_query ($connection, "SELECT * FROM info WHERE info_id = '$infoid'");
            if (mysqli_num_rows($info_detail_sql) == 0 ) {
                echo '
                //image not found
                <div>
                    <img src="./nodata-img/noimage.png">
                    <h3>Data tidak ditemukan</h3>
                </div>
                ';
            }
            else {
                while($row = mysqli_fetch_assoc ($info_detail_sql)) {
                    echo '
                    <div class="info-detail-content">
                        <img src="./admin2/upload/info/'.$row['info_foto'].'">
                        <h1>'.$row['info_nama'].'</h1>
                        <h3><i>'.$row['info_namalatin'].'</i></h3>
                        <p>'.$row['info_deskripsi'].'</p>
                    </div>
                    ';
                }
            }
        ?>  
    
    </main>
</body>
</hmtl>
