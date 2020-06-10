<?php
    include "./admin2/config.php";
?>

<!DOCTYPE html>
<html lang="EN">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="css/bootstrap.min.css?version=1" rel="stylesheet">
        <link href="css/index.css?version=1" rel="stylesheet">
        <link href="css/galeri.css?version=1" rel="stylesheet">
        <title>Pembelajaran Kupu-Kupu</title>
    		
    </head>
    <body>
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
                            <a class="nav-item nav-link" href="Beranda.php">Beranda </a>
                        </li>
                        <li>
                            <a class="nav-item nav-link" href="Pengenalan.php">Pengenalan</a>
                        </li>
                        <li>
                            <a class="nav-item nav-link" href="Informasi.php">Informasi</a>
                        </li>
                        <li>
                            <a class="nav-item nav-link active" href="Galeri.php">Galeri<span class="sr-only">(current)</span></a>
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
            $total_records_per_page = 25;
            //hitung batas dan set vvariabel
            $offset = ($page_no-1) * $total_records_per_page;
            $previous_page = $page_no - 1;
            $next_page = $page_no + 1;
            $adjacents = "2";


            //dapatkan total halaman buat paganation
            $result_sql = "SELECT COUNT(*) As total_records FROM galeri";
            $result_count = mysqli_query ($connection, $result_sql);
            $total_records = mysqli_fetch_array($result_count);
            $total_records = $total_records['total_records'];
            $total_no_of_pages = ceil ($total_records / $total_records_per_page);
            $second_last = $total_no_of_pages - 1; //total page -1

            //fetching
            $result = mysqli_query ($connection, "SELECT * FROM galeri LIMIT $offset, $total_records_per_page");

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
                        <div>
                            <a href="./admin2/upload/galeri/'.$row['galeri_foto'].'" class="zoom" data-toggle="lightbox">
                                <img class="card-img-top" src="./admin2/upload/galeri/'.$row['galeri_foto'].'" alt="'.$row['galeri_nama'].'">
                                <span class="overlay"><i class="glyphicon glyphicon-fullscreen"></i></span>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">'.$row['galeri_nama'].'</h5>
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
            <?php if($page_no > 1){
                echo "<li class='page-item' ><a class='page-link' href='Galeri.php?page_no=1'>&lsaquo;&lsaquo; First</a></li>";
            } ?>
            
            <li class="page-item" <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
                <a class="page-link" <?php if($page_no > 1){
                    echo "href='Galeri.php?page_no=$previous_page'";
                } ?> aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            
            <?php if($page_no <= 10){
                for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                    if ($counter == $page_no) {
                    echo "<li class='page-item active'><a class='page-link'>$counter</a></li>"; 
                            }else{
                        echo "<li><a class='page-link' href='Galeri.php?page_no=$counter'>$counter</a></li>";
                                }
                            }
            } ?>
            
            <li class="page-item" <?php if($page_no >= $total_no_of_pages){
                echo "class='disabled'";
                } ?>>
                <a class="page-link" <?php if($page_no < $total_no_of_pages) {
                echo "href='Galeri.php?page_no=$next_page'";
                } ?> aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        
            <?php if($page_no < $total_no_of_pages){
                echo "<li class='page-item' ><a class='page-link' href='Galeri.php?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
            } ?>
        </ul>
    <!-- End Paganation -->
    </div>
    </main>
    </body>
</html>
