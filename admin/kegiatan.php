<?php
include "includes/config.php";

if(isset($_POST["simpan"]))
{ 	$eventKODE = $_POST['inputkodeevent'];
	$eventNAMA = $_POST['inputnamaevent'];
	$eventKET = $_POST['inputketevent'];
	$eventMULAI = date('Y-m-d', strtotime($_POST['inputeventmulai']));
	$eventSELESAI = date('Y-m-d', strtotime($_POST['inputeventselesai']));	
	$gambar = $_FILE['file']['name'];
	$file_tmp = $FILES['file']['tmp_name'];
	move_uploaded_file($file_tmp, 'gambar/'.$gambar);
	$kabupatenKODE = $_POST["kabupatenKODE"];

mysqli_query($connection, "INSERT INTO kegiatan VALUES ('$eventKODE', '$eventNAMA', '$kabupatenKODE', '$eventKET', '$eventMULAI', '$eventSELESAI', '$gambar')");
header("location:kegiatan.php");
}
$query = mysqli_query($connection, "SELECT * FROM kegiatan");
$query2 = mysqli_query($connection, "SELECT * FROM kabupaten");
?>

<?php include("adminmenu.php") ?>

<!doctype html>
<html lang="en">
 <head>
 <!-- Required meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
 <link rel="stylesheet" href="css/bootstrap.min.css"
integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 <link rel="stylesheet" href="css/bootstrap3.min.css">
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="css/customgallery.css" rel="stylesheet">
<link href="css/csscustom.css" rel="stylesheet">
 <title>PHPTI-2019</title>
 </head>

 <body>
<div class="col-sm-10" style="margin-top:20px;">
<form method="POST" enctype="multipart/form-data">
  <div class="form-group row">
    <label for="eventKODE" class="col-sm-3 col-form-label">Kode Kegiatan</label>
    <div class="col-sm-9">
      <input type="text" class="form-control"
  id="eventKODE" name="inputkodeevent" placeholder="Kode Kegiatan">
    </div>
  </div>

<div class="form-group row">
    <label for="eventNAMA" class="col-sm-3 col-form-label">Nama Kegiatan</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" 
  id="eventNAMA" name="inputnamaevent" placeholder="Nama Kegiatan">
    </div>
  </div>
  
<div class="form-group row">
    <label for="eventKET" class="col-sm-3 col-form-label">Keterangan Kegiatan</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" 
  id="eventKET" name="inputketevent" placeholder="Keterangan Kegiatan">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="eventPOSTER" class="col-sm-3 col-form-label">Muat File/Foto</label>
    <div class="col-sm-9">
      <input type="file" id="file" name="file">
	  <p class="help-block">Ini untuk mengunggah file/foto</p>
    </div>
  </div>
  
  <div class="form-group row">
    <label for="kabupatenkode" class="col-sm-3 col-form-label">Kode Kabupaten</label>
    <div class="col-sm-9">
      <select name="kabupatenKODE" class="form-control">
	  <option value="kabupaten">Kabupaten</option>
	  <?php if(mysqli_num_rows($query2) > 0) {?>
	  <?php while ($row=mysqli_fetch_array($query2)) {?>
	  <option>
	  <?php echo $row ["kabupatenKODE"]?>
	  <?php echo $row ["kabupatenNAMA"]?>
	  <?php }?>
	  <?php }?>
	  </select>
	  </div>
	  </div>
	  
<div class="form-group row">
    <label for="datepicker" class="col-sm-3 col-form-label">Tanggal</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" 
  id="datepicker" name="inputeventmulai" placeholder="dd-mm-yyyy">
    </div>
  </div>

<div class="form-group row">
    <label for="datepicker" class="col-sm-3 col-form-label">Tanggal</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" 
  id="datepicker" name="inputeventselesai" placeholder="dd-mm-yyyy">
    </div>
  </div>
  
<div class="form-group row">
 <div class="col-sm-3 col-form-label>
 </div>
 <div class="col-sm-9"> 
  <button type="submit" class="btn btn-primary" name="simpan" value="simpan">Simpan</button>
  <button type="reset" class="btn btn-secondary">Batal</button>
 </div>
</div>  
</form>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Nomor</th>
      <th scope="col">Kode Kegiatan</th>
      <th scope="col">Nama Kegiatan</th>
      <th scope="col">Kode Kabupaten</th>
      <th scope="col">Keterangan Kegiatan</th>
	  <th scope="col">Tanggal Mulai</th>
	  <th scope="col">Tanggal Selesai</th>
	<th scope="col">Foto Kegiatan</th>
    </tr>
  </thead>
  <tbody>
<?php if(mysqli_num_rows($query) > 0) 
{?>
   <?php $nomor = 1;
   while ($row = mysqli_fetch_array ($query)) { ?> 
    <tr>
      <td><?php echo $nomor; ?></td>
      <td><?php echo $row["eventKODE"]; ?></td>
      <td><?php echo $row["eventNAMA"]; ?></td>
	  <td><?php echo $row["kabupatenKODE"]; ?></td>
      <td><?php echo $row["eventKET"]; ?></td>
	  <td><?php echo $row["eventMULAI"]; ?></td>
	  <td><?php echo $row["eventSELESAI"]; ?></td>
	  <td>
	  <?php if($row['eventPOSTER']=="") {echo "<img src='images/LAMBANG UNTAR.png' width='88'/>";}
	  else {?>
	  <img src="images/<?php echo $row['eventPOSTER'] ?>"width="100"/>
	  <?php } ?>
		  </td>
    </tr>
    <?php $nomor++; }?>
<?php } ?>
  </tbody>
</table>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="js/scriptdatepicker.js"></script>
 </body>
</html>