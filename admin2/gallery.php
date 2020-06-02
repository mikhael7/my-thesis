<?php
include "./config.php";
	
	if (isset($_POST["batal"]))
	{
		header("location:gallery.php");
	}

     if(isset($_POST['Simpan']))
   {  
    $galeriID = $_POST['input_galeri_id'];
    $galeriNAMA = $_POST['input_galeri_nama'];
    $nama = $_FILES['file']['name']; /** untuk menampung data foto atau gambar **/ 
    $file_tmp = $_FILES["file"]["tmp_name"];
    move_uploaded_file($file_tmp, './upload/galeri/'.$nama); /** untuk upload file gambarnya **/       
    /** Memasukkan data fullname ke dalam tabel kabupaten**/
    mysqli_query($connection, "INSERT INTO galeri  VALUES ('$galeriID','$galeriNAMA','$nama')"); 
    header("location:gallery.php");
  }

	 $query = mysqli_query($connection, "SELECT * FROM galeri");
?>		


<?php include("adminmenu.php") ?>

<head>
  <style>
    @import url('https://fonts.googleapis.com/css?family=Lato&display=swap');
    body {
  	  background-color : skyblue;
    }
  </style>
 <link href="css/bootstrap. min.css" rel="stylesheet">
</head>

<body>
<!--form-->
  <div class="templatemo-content-wrapper">
      <div class="templatemo-content entri-form">
        <div class="entri-form" style="margin-top: -15px";>  
          <h1 style="text-align:center;"><b><h1>Input Galeri</h1><br>
        </div>
        <div class="row">
            <div class="col-sm-12">
                  <form method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group form-group-lg">
                      <label class="col-sm-3 control-label" for="galeriID">Input Galeri ID</label>
                      <div class="col-sm-6">
                        <input class="form-control" type="text" id="galeriID" name="input_galeri_id" placeholder="Galeri ID">
                      </div>
                    </div>

                    <div class="form-group form-group-lg">
                      <label class="col-sm-3 control-label" for="galeriNAMA">Galeri Nama</label>
                      <div class="col-sm-6">
                        <input class="form-control" type="text" id="galeriNAMA" name="input_galeri_nama" placeholder="Galeri Nama">
                      </div>
                    </div> 

                    <div class="form-group form-group-lg">
                      <label class="col-sm-3 control-label" for="file">Muat File/Foto Kupu-Kupu</label>
                        <div class="col-sm-6">
                          <input type="file" id="file" name="file">
                          <p class="help-block">INI UNTUK MENGGUGAH FILE/FOTO</p>     
                        </div>
                    </div>
                    
                    <div class="col-md-8" style="text-align: center;">
                      <input class="btn btn-lg btn-primary" type="submit" value="Simpan" name="Simpan">
                      <!-- tombol diperbesar dg -lg dan berwarna biru dengan -primary -->
                      <input class="btn btn-lg btn-info" type="reset" value="Batal"> <!-- tombol berwarna hijau langit -->
                    </div>
                  </form>

<!-- Tabel -->
                  <table class="table table-hover">
                    <div class="etri-form">
                      <h1 style="padding-top: 100px ; text-align:center">List Info Kupu-kupu</h1>
                    </div>
                    <!-- judul -->
                    <tr class="info">
                      <th>No</th>
                      <th>Action</th>
                      <th>galeri_id</th>
                      <th>galeri_nama</th>
                      <th>galeri_foto</th>
                    </tr>

                    <?php
                      /** Memeriksa apakah data yang dipanggil tersebut tersedia atau tidak **/
		                  if(mysqli_num_rows($query)>0) 
                    {?>
                    <?php
                      $no=1; ?>
                      <?php while ($row = mysqli_fetch_array($query))
                      { ?>
                        <tr class="danger" height="20px">
                          <td><?php echo $no; ?></td>
                          <td>
                            <a href="javascript:;"><i class="fa fa-pencil-square-o"></i></a>
                            <a href="deletegaleri.php?deletegaleri=<?php echo $row["galeri_id"]?>">DELETE</a>
                          </td>
                          <td><?php echo $row['galeri_id'];?> </td>
                          <td><?php echo $row['galeri_nama'];?> </td>
                          <td>
                            <?php if($row['galeri_foto']==""){echo "<img src='./nodata-img/noimage.png' width='88'/>";}else{?>
                              <img src ="./upload/galeri/<?php echo$row['galeri_foto']?>" width="88" class="img-responsive" />
                            <?php }?>
                          </td>
                        </tr>
                      <?php $no++; ?>
                      <?php } ?>
                    <?php } ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
                
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" 
		integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js" 
		integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="js/scriptdatepicker.js"></script>
