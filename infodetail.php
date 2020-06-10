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
    <style>
        .img-card {
            display: block;
            margin-left: auto;
            margin-right: auto;
            box-shadow: 2px 3px 9px #aaaaaa;
            max-width:18rem;
        }
        .card-detail {
            text-align:center;
            box-shadow: 2px 3px 9px #aaaaaa;
            margin: 10px 50px;
        }
        .p-detail {
            font-size : 16pt;
            text-align:justify;
            padding : 15px 25px;
            margin:10px;
        }
        .h3-detail {
            color:grey;
        }
        .h1-detail {
            padding-top:10px;
        }
        
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengenalan</title>
    <link href="./css/bootstrap.min.css?version=1" rel="stylesheet">
    <link href="./css/info.css?version=1" rel="stylesheet">
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
                    <a class="nav-item nav-link active" href="Informasi.php">Informasi<span class="sr-only">(current)</span></a>
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
    <div class="justify-content-center">
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
                        <img class="img-card" src="./admin2/upload/info/'.$row['info_foto'].'">
                        <div class="card-detail">
                            <h1 class="h1-detail">'.$row['info_nama'].'</h1>
                            <h3 class="h3-detail"><i>'.$row['info_namalatin'].'</i></h3>
                            <p class="p-detail">'.$row['info_deskripsi'].'</p>
                        </div>
                    </div>
                    ';
                }
            }
        ?>  
    </div>
    </main>
</body>
</hmtl>
