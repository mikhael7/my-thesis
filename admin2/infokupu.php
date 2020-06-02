
<?php
include "./config.php";
	
	if (isset($_POST["batal"]))
	{
		header("location:infokupu.php");
	}

     if(isset($_POST['Simpan']))
   {  
    $infoID = $_POST['input_infoID'];
    $infoNAMA = $_POST['input_infoNAMA'];
    $infoLATIN = $_POST['input_infoLATIN'];
    $infoDESC = $_POST['input_infoDESC'];
    $nama = $_FILES['file']['name']; /** untuk menampung data foto atau gambar **/ 
    $file_tmp = $_FILES["file"]["tmp_name"];
    move_uploaded_file($file_tmp, './upload/info/'.$nama); /** untuk upload file gambarnya **/       
    /** Memasukkan data fullname ke dalam tabel kabupaten**/
    mysqli_query($connection, "INSERT INTO info  VALUES ('$infoID','$infoNAMA','$infoLATIN','$infoDESC','$nama')"); 
    header("location:infokupu.php");
  }

	 $query = mysqli_query($connection, "SELECT * FROM info ORDER BY info_id");
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
          <h1 style="text-align:center;"><b><h1>Info Kupu-Kupu</h1><br>
        </div>
        <div class="row">
            <div class="col-sm-12">
                  <form method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group form-group-lg">
                      <label class="col-sm-3 control-label" for="infoID">Input ID</label>
                      <div class="col-sm-6">
                        <input class="form-control" type="text" id="infoID" name="input_infoID" placeholder="Info ID">
                      </div>
                    </div>

                    <div class="form-group form-group-lg">
                      <label class="col-sm-3 control-label" for="infoNAMA">Input Nama</label>
                      <div class="col-sm-6">
                        <input class="form-control" type="text" id="infoNAMA" name="input_infoNAMA" placeholder="Nama Kupu-Kupu">
                      </div>
                    </div> 
                      
                    <div class="form-group form-group-lg">
                      <label class="col-sm-3 control-label" for="infoLATIN">Input Nama Latin</label>
                      <div class="col-sm-6">
                        <input class="form-control" type="text" id="infoLATIN" name="input_infoLATIN" placeholder="Nama Latin">
                      </div>
                    </div>

                    <div class="form-group form-group-lg">
                      <label class="col-sm-3 control-label" for="infoDESC">Input Deskripsi</label>
                      <div class="col-sm-6">
                        <textarea class="form-control" rows="10" cols="30"type="text" id="infoDESC"
                        name="input_infoDESC" placeholder="Deskripsi"> </textarea>
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
                      <th>InfoID</th>
                      <th>Nama</th>
                      <th>Nama Latin</th>
                      <th>Deskripsi</th>
                      <th>Foto</th>
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
                            <a href="deleteinfokupu.php?deleteinfokupu=<?php echo $row["info_id"]?>">DELETE</a>
                          </td>
                          <td><?php echo $row['info_id'];?> </td>
                          <td><?php echo $row['info_nama'];?> </td>
                          <td><?php echo $row['info_namalatin'];?> </td>
                          <td><?php echo $row['info_deskripsi'];?> </td>
                          <td>
                            <?php if($row['info_foto']==""){echo "<img src='./nodata-img/noimage.png' width='88'/>";}else{?>
                              <img src ="./upload/info/<?php echo$row['info_foto']?>" width="88" class="img-responsive" />
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
