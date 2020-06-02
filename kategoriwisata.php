<?php
    /*if(!isset($_GET['kategori'])) {
        header("location:index.php");
    }

    $kategori = $_GET['kategori'];
    include "../admin/includes/config.php";
    $kategoriKODE = mysqli_query($connection, "SELECT kategoriKODE FROM kategoriwisata WHERE kategoriNAMA = '$kategori'");
    $fetchKODE = mysqli_fetch_assoc($kategoriKODE);
    getKode = $fetchKODE['kategoriKODE']; */
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
        include "./admin2/config.php";

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
                    <a class="nav-item nav-link active" href="Beranda.php">Beranda</a>
                </li>
                <li>
                    <a class="nav-item nav-link" href="Pengenalan.php">Pengenalan</a>
                </li>
                <li>
                    <a class="nav-item nav-link" href="Informasi.php">Informasi</a>
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
     <!--content -->
    <div class="justify-content-center row">
        
        <?php
            $infokupu = mysqli_query($connection, "SELECT * FROM info LIMIT 15");
            if(mysqli_num_rows($infokupu)==0) {
                echo'
                    <div class="notfound">
                        <img src="./nodata-img/noimage.png">
                        <h3>Tidak ada data</h3>
                    </div>
                ';
            }
            while ($row=mysqli_fetch_assoc($infokupu)) {    
                echo'
                    <div class="col-sm-4 col-md-4 col-lg-4 d-flex align-items-stretch card">
                        <img class="card-img-top" src="./admin2/upload/info/'.$row['info_foto'].'" alt="'.$row['info_nama'].'">
                        <div class="card-body">
                            <h5 class="card-title">'.$row['info_nama'].'</h5>
                            <h6 class="card-subtitle mb-2 text-muted"><i>'.$row['info_namalatin'].'</i></h6>
                            ';
                            $infomindesc = substr($row['info_deskripsi'], 0, 100);
                            echo '
                            <p class="card-text">
                                '.$infomindesc.'
                                <a href="infodetail.php?infoid ='.$row['info_id'].'">Selengkapnya ...</a>
                            </p>
                        </div>
                    </div>
                
                ';
            }
        ?>
    </div>
    <!--end content-->
    </main>


    
    <?php //include "includes/footer.php"?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" 
		integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
		integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
