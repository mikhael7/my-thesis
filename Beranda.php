<style>
	.gallery {
		margin: 10vh auto;
	}
	article {
		margin: 2vh 0vw;
		text-align: center;
	}

	article a, article a:hover {
		color: #eeeeee;
		text-decoration: none;
	}

	.row-galeri {
		background-color : black;
  }

  
</style>

<!DOCTYPE html>
<html lang="EN">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="./css/bootstrap.min.css" rel="stylesheet">
        <link href="./css/index.css" rel="stylesheet">
       
        <link href="./css/searchcss.css" rel="stylesheet">
        <title>Pembelajaran Kupu-Kupu</title>		
    </head>
    <body style="background-color:#eeeeee;">
    <!-- Navbar-->
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top"> 
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="col-12">
                <ul id="navigationbar" class="nav navbar-nav">
                  <li>
                    <a class="nav-item nav-link active" href="Beranda.php">Beranda<span class="sr-only">(current)</span></a>
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
    <main>
    <!-- Search form 
    <div class="input-group" style="padding:10px 50px 10px 50px;">
      <input class="form-control card-search py-2" type="text" placeholder="Cari ..."
      style="text-align: left; font-size:x-large;padding-left:20px ;">
    </div>-->

    <div>
      <img src="carousel-img/1.jpg" alt="image" class="d-block card" width="100%">
    </div>

    <!-- Welcome Title-->
    
      <h1 style="text-align: center; padding: 20px 0px 0px 0px;">
      Selamat Datang</h1>
    

    <!-- Show Image Galeri -->
    <div class="container mt40 gallery">
      <section class="row row-galeri">
        <?php
          include "./admin2/config.php";
          $galeri = mysqli_query ($connection, "SELECT * FROM galeri ORDER BY rand() LIMIT 12");
          if (mysqli_num_rows($galeri)>0) {
            while($row=mysqli_fetch_assoc($galeri)) {
            echo '
              <article class="col-xs-12 col-sm-6 col-md-3">
                <div class="panel card" >
                  <div class="panel-body" style="padding: 5px 0px 10px 0px">
                    <a href="./admin2/upload/galeri/'.$row['galeri_foto'].'" data-type="image" class="zoom" data-toggle="lightbox">
                      <img height="215" width="215" src="./admin2/upload/galeri/'.$row['galeri_foto'].'" alt="Tidak Ada Gambar"/>
                      <span class="overlay"><i class="glyphicon glyphicon-fullscreen"></i></span>
                    </a>
                  </div>
                  <div class="panel-footer card" style="padding: 5px 5px 5px 5px;">
                    <h5 style="color : #000000;">'.$row['galeri_nama'].'</h5>
                  </div>
                </div>
              </article>
              ';
            }
          }
        ?>
      
      </section>
    </div>
    </main>
    </body>
</html>
