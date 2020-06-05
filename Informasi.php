<?php
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
     <!--content -->
    <div class="justify-content-center row">
        <?php
            // dapetin halaman sekarang
            if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                $page_no = $_GET['page_no'];
            } else {
                $page_no = 1;
            }
            //set berapa banyak content yang di tampilkan perhalaman
            $total_records_per_page = 10;
            //hitung batas dan set vvariabel
            $offset = ($page_no-1) * $total_records_per_page;
            $previous_page = $page_no - 1;
            $next_page = $page_no + 1;
            $adjacents = "2";


            //dapatkan total halaman buat paganation
            $result_sql = "SELECT COUNT(*) As total_records FROM info";
            $result_count = mysqli_query ($connection, $result_sql);
            $total_records = mysqli_fetch_array($result_count);
            $total_records = $total_records['total_records'];
            $total_no_of_pages = ceil ($total_records / $total_records_per_page);
            $second_last = $total_no_of_pages - 1; //total page -1

            //fetching
            $result = mysqli_query ($connection, "SELECT * FROM info LIMIT $offset, $total_records_per_page");

            if(mysqli_num_rows($result)==0) {
                echo'
                    <div>
                        <img src="./nodata-img/noimage.png">
                        <h3>Tidak ada data</h3>
                    </div>
                ';
            }
            while ($row=mysqli_fetch_assoc($result)) {    
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
                                <a href="infodetail.php?infoid='.$row['info_id'].'">Selengkapnya ...</a>
                            </p>
                        </div>
                    </div>
                
                ';
            }
        ?>
    </div>
    <!--end content-->

    <!--paganation -->
    <!-- showing current page number -->
    <div class="text-center" style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
            <strong >Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
        <!-- paganation -->    
        <ul class="pagination justify-content-center" style="padding: 10px 5px 10px 5px">
            <li class="page-item" <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
                <a class="page-link" <?php if($page_no > 1){
                echo "href='Informasi.php?page_no=$previous_page'";
                } ?>>Previous</a>
            </li>
            
            <?php if($page_no <= 10){
                for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                    if ($counter == $page_no) {
                    echo "<li class='page-item active'><a class='page-link'>$counter</a></li>"; 
                            }else{
                        echo "<li><a class='page-link' href='Informasi.php?page_no=$counter'>$counter</a></li>";
                                }
                            }
            } ?>
            
            <li class="page-item" <?php if($page_no >= $total_no_of_pages){
                echo "class='disabled'";
                } ?>>
                <a class="page-link" <?php if($page_no < $total_no_of_pages) {
                echo "href='Informasi.php?page_no=$next_page'";
                } ?>>Next</a>
            </li>
        
            <?php if($page_no < $total_no_of_pages){
            echo "<li class='page-item' ><a class='page-link' href='Informasi.php?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
            } ?>
        </ul>
    <!-- End Paganation -->
    </div>
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
