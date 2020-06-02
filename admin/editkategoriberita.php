<?php
include "includes/config.php";

if(isset($_POST["batal"]))
{
	header("location:kategoriberita.php");
}

if(isset($_POST["ubah"]))
{ 	$kategoriberitaKODE = $_POST['input_kode_berita'];
	$kategoriberitaNAMA = $_POST['input_nama_berita'];
	$kategoriberitaKET = $_POST['input_ket_berita'];

	mysqli_query($connection, "UPDATE kategoriberita set kategoriberitaNAMA='$kategoriberitaNAMA', 
			 kategoriberitaKET='$kategoriberitaKET' WHERE kategoriberitaKODE='$kategoriberitaKODE'");
	header("location:kategoriberita.php"); 
}
$kategoriberitakode = $_GET["beritaubah"];
$edit = mysqli_query($connection, "SELECT * FROM kategoriberita WHERE kategoriberitaKODE = '$kategoriberitakode'");
$row_edit = mysqli_fetch_array($edit); 

$query = mysqli_query($connection, "SELECT * FROM kategoriberita");
?>

<?php include("adminmenu.php") ?>

<head>
 <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<div class="col-sm-10">
<form method="POST">
  <div class="form-group row">
    <label for="kategoriberitaKODE" class="col-sm-3 col-form-label">Kode Kategori Berita</label>
    <div class="col-sm-9">
      <input type="text" class="form-control"
  id="kategoriberitaKODE" name="input_kode_berita" value="<?php echo $row_edit["kategoriberitaKODE"]?>"/>
    </div>
  </div>

<div class="form-group row">
    <label for="kategoriberitaNAMA" class="col-sm-3 col-form-label">Nama Berita</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" 
  id="kategoriberitaNAMA" name="input_nama_berita" value="<?php echo $row_edit["kategoriberitaNAMA"]?>"/>
    </div>
  </div>
  
<div class="form-group row">
    <label for="kategoriberitaKET" class="col-sm-3 col-form-label">Keterangan Berita</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" 
  id="kategoriberitaKET" name="input_ket_berita" value="<?php echo $row_edit["kategoriberitaKET"]?>"/>
    </div>
  </div>

<div class="form-group row">
 <div class="col-sm-3 col-form-label>
 </div>
 <div class="col-sm-9"> 
  <button type="submit" class="btn btn-primary" name="ubah" value="ubah">Ubah</button>
  <button type="reset" class="btn btn-secondary" name="batal" value="batal">Batal</button>
 </div>
</div>  
</form>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Nomor</th>
	<th scope="col">Action</th>
      <th scope="col">Kode Kategori Berita</th>
      <th scope="col">Nama Berita</th>
      <th scope="col">Keterangan Berita</th>
    </tr>
  </thead>
  <tbody>
<?php if(mysqli_num_rows($query) > 0) {?>
   <?php $nomor = 1;
   while ($row = mysqli_fetch_array ($query)) { ?> 
      <tr>
      <td><?php echo $nomor; ?></td>
	  <td><?php echo $row["kategoriberitaKODE"]; ?></td>
      <td>
			<a href="javascript:;"><i class="fa fa-pencil-square-o"></i>
			<a href="editkategoriberita.php?beritaubah=<?php echo $row["kategoriberitaKODE"]?>">   Update</a> |
			<a href="javascript:;"><i class="fa fa-pencil-square-o"></i>
			<a href="hapuskategoriberita.php?beritahapus=<?php echo $row["kategoriberitaKODE"]?>">   Delete</a>
	  </td>
      <td><?php echo $row["kategoriberitaNAMA"]; ?></td>
      <td><?php echo $row["kategoriberitaKET"]; ?></td>
    </tr>
    <?php $nomor++; }?>
<?php } ?>

  </tbody>
</table>

</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" 
		integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js" 
		integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="js/scriptdatepicker.js"></script>

<?php include ("adminfooter.php") ?>
