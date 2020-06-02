<?php
include "includes/config.php";

if(isset($_POST["batal"]))
{
	header("location:namaobyekwisata.php");
}
if(isset($_POST["ubah"]))
{ 
	$objkode = $_POST['objk'];
	$objnama = $_POST['objn'];
	$kcmtnkode = $_POST['kcmtnk'];
	$ktgrikode = $_POST['ktgrik'];
	$objalamat = $_POST['obja'];
	$objdrjts = $_POST['objdrjts'];
	$objmnits = $_POST['objmnits'];
	$objdtiks = $_POST['objdtiks'];
	$objlatit = $_POST['objlatitude'];
	$objdrjte = $_POST['objdrjte'];
	$objmnite = $_POST['objmnite'];
	$objdtike = $_POST['objdtike'];
	$objlongi = $_POST['objlongi'];
	$objtinggi = $_POST['objtinggi'];
	$objdefin = $_POST['objdefinisi'];
	$objket = $_POST['objketerangan'];
	
	$nama = $_FILES['file']['name'];
	$file_tmp = $_FILES['file']['tmp_name'];
	move_uploaded_file($file_tmp, 'images/'.$nama);
	
mysqli_query($connection, "UPDATE obyekwisata SET obyekNAMA='$objnama',kecamatanKODE='$kcmtnkode',kategoriKODE='$ktgrikode',
												  obyekALAMAT='$objalamat',obyekDERAJAT_S='$objdrjts',obyekMENIT_S='$objmnits',
												  obyekDETIK_S='$objdtiks',obyekLATITUDE='$objlatit',obyekDERAJAT_E='$objdrjte',
												  obyekMENIT_E='$objmnite',obyekDETIK_E='$objdtike',obyekLONGITUDE='$objlongi',
												  obyekKETINGGIAN='$objtinggi',obyekDEFINISI='$objdefin',obyekKETERANGAN='$objket',
												  obyekFOTO='$nama' WHERE obyekKODE='$objkode'");
header("location:namaobyekwisata.php");
}
$obyekkode = $_GET["obyekubah"];
$edit = mysqli_query($connection, "SELECT * FROM obyekwisata WHERE obyekKODE = '$obyekkode'");
$row_edit = mysqli_fetch_array($edit); 

$query = mysqli_query($connection, "SELECT * FROM obyekwisata");
$query2 = mysqli_query($connection, "SELECT * FROM kategoriwisata");
$query3 = mysqli_query($connection, "SELECT * FROM kecamatan");
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
<div class="col-sm-10">
<form method="POST" enctype="multipart/form-data">
  
  <div class="form-group row">
    <label for="eventKODE" class="col-sm-3 col-form-label">Kode Obyek Wisata</label>
    <div class="col-sm-9">
      <input type="text" class="form-control"
	   id="objkode" name="objk" value="<?php echo $row_edit["obyekKODE"]?>">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="eventKODE" class="col-sm-3 col-form-label">Nama Obyek Wisata</label>
    <div class="col-sm-9">
      <input type="text" class="form-control"
	   id="objnama" name="objn" value="<?php echo $row_edit["obyekNAMA"]?>">
    </div>
  </div>
  
  <div class="form-group row">
		<label for="kecamatanKODE" class="col-sm-3 col-form-label">Daftar Kecamatan</label>
		<div class ="col-sm-9">
				<select name ="kcmtnk" class="form-control" value="<?php echo $row_edit["kecamatanKODE"]?>">
						<option value="kecamatan">Kecamatan</option>
						<?php if(mysqli_num_rows($query3) > 0 ) : ?>
							<?php while($row = mysqli_fetch_array($query3) ) : ?>
									<option><?= $row["kecamatanKODE"] ?>
									</option>			
						<?php endwhile; ?>
						<?php endif; ?>	
				</select>	

		</div>
  </div>	
  
  <div class="form-group row">
		<label for="kategoriKODE" class="col-sm-3 col-form-label">Daftar Kategori Wisata</label>
		<div class ="col-sm-9">
				<select name ="ktgrik" class="form-control" value="<?php echo $row_edit["kategoriKODE"]?>">
						<option value="kategori">Wisata</option>
						<?php if(mysqli_num_rows($query2) > 0 ) : ?>
							<?php while($row = mysqli_fetch_array($query2) ) : ?>
									<option><?= $row["kategoriKODE"] ?>
									</option>	
						<?php endwhile; ?>
						<?php endif; ?>	
				</select>	
		</div>
  </div>		 
  
  <div class="form-group row">
    <label for="eventKODE" class="col-sm-3 col-form-label">Alamat Obyek</label>
    <div class="col-sm-9">
      <input type="text" class="form-control"
	   id="objalamat" name="obja" value="<?php echo $row_edit["obyekALAMAT"]?>">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="eventKODE" class="col-sm-3 col-form-label">Derajat Obyek S</label>
    <div class="col-sm-9">
      <input type="text" class="form-control"
	   id="objdrjts" name="objdrjts" value="<?php echo $row_edit["obyekDERAJAT_S"]?>">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="eventKODE" class="col-sm-3 col-form-label">Menit Obyek S</label>
    <div class="col-sm-9">
      <input type="text" class="form-control"
	   id="objmnits" name="objmnits" value="<?php echo $row_edit["obyekMENIT_S"]?>">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="eventKODE" class="col-sm-3 col-form-label">Detik Obyek S</label>
    <div class="col-sm-9">
      <input type="text" class="form-control"
	   id="objdtiks" name="objdtiks" value="<?php echo $row_edit["obyekDETIK_S"]?>">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="eventKODE" class="col-sm-3 col-form-label">Latitude Obyek</label>
    <div class="col-sm-9">
      <input type="text" class="form-control"
	   id="objlatit" name="objlatitude" value="<?php echo $row_edit["obyekLATITUDE"]?>">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="eventKODE" class="col-sm-3 col-form-label">Derajat Obyek E</label>
    <div class="col-sm-9">
      <input type="text" class="form-control"
	   id="objdrjte" name="objdrjte" value="<?php echo $row_edit["obyekDERAJAT_E"]?>">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="eventKODE" class="col-sm-3 col-form-label">Menit Obyek E</label>
    <div class="col-sm-9">
      <input type="text" class="form-control"
	   id="objmnite" name="objmnite" value="<?php echo $row_edit["obyekMENIT_E"]?>">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="eventKODE" class="col-sm-3 col-form-label">Detik Obyek E</label>
    <div class="col-sm-9">
      <input type="text" class="form-control"
	   id="objdtike" name="objdtike" value="<?php echo $row_edit["obyekDETIK_E"]?>">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="eventKODE" class="col-sm-3 col-form-label">Longitude Obyek</label>
    <div class="col-sm-9">
      <input type="text" class="form-control"
	   id="objlongi" name="objlongi" value="<?php echo $row_edit["obyekLONGITUDE"]?>">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="eventKODE" class="col-sm-3 col-form-label">Ketinggian Obyek</label>
    <div class="col-sm-9">
      <input type="text" class="form-control"
	   id="objtinggi" name="objtinggi" value="<?php echo $row_edit["obyekKETINGGIAN"]?>">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="eventKODE" class="col-sm-3 col-form-label">Definisi Obyek</label>
    <div class="col-sm-9">
      <input type="text" class="form-control"
	   id="objdefin" name="objdefinisi" value="<?php echo $row_edit["obyekDEFINISI"]?>">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="eventKODE" class="col-sm-3 col-form-label">Keterangan Obyek</label>
    <div class="col-sm-9">
      <input type="text" class="form-control"
	   id="objket" name="objketerangan" value="<?php echo $row_edit["obyekKETERANGAN"]?>">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="eventPOSTER" class="col-sm-3 col-form-label">Muat File/Foto Kegiatan</label>
    <div class="col-sm-9">
      <input type="file" id="file" name="file">
	  <img src="images/<?php echo $row_edit['obyekFOTO']?>" style="width:200px;height:100px">
	  <p class="help-block">Ini untuk mengunggah file/foto</p>
    </div>
  </div>
  
  <div class="form-group row">
	<div class="col-sm-3 col-form-label">
	</div>
	<div class="col-sm-9"> 
		<button type="submit" class="btn btn-primary" name="ubah" value="ubah">Ubah</button>
		<button type="submit" class="btn btn-secondary" name="batal" value="batal">Batal</button>
		<input type="hidden" name = "objk" value = "<?php echo $row_edit["obyekKODE"]?>">
	</div>
  </div>
 
</form>

<table class="table table-dark">
  <thead>
    <tr>
	  <th scope="col">Nomor</th>
	  <th scope="col">Action</th>
	  <th scope="col">Kode Obyek Wisata</th>
      <th scope="col">Nama Obyek Wisata</th>
      <th scope="col">Kecamatan Kode</th>
      <th scope="col">Kategori Kode</th>
	  <th scope="col">Alamat Obyek Wisata</th>
	  <th scope="col">Obyek Derajat S</th>
	  <th scope="col">Obyek Menit S</th>
	  <th scope="col">Obyek Detik S</th>
	  <th scope="col">Obyek Latitude</th>
	  <th scope="col">Obyek Derajat E</th>
	  <th scope="col">Obyek Menit E</th>
	  <th scope="col">Obyek Detik E</th>
	  <th scope="col">Obyek Longitude</th>
	  <th scope="col">Obyek Ketinggian</th>
	  <th scope="col">Obyek Definisi</th>
	  <th scope="col">Obyek Keterangan</th>
	  <th scope="col">Obyek Foto</th>
    </tr>
  </thead>
  
  <tbody>
<?php if(mysqli_num_rows($query) > 0) 
{?>
   <?php $nomor = 1;
   while ($row = mysqli_fetch_array ($query)) { ?> 
    <tr>
	  <td><?php echo $nomor; ?></td>
	  <td>
			<a href="javascript:;"><i class="fa fa-pencil-square-o"></i>
			<a href="editobyekwisata.php?obyekubah=<?php echo $row["obyekKODE"]?>">   Update</a> |
			<a href="javascript:;"><i class="fa fa-pencil-square-o"></i>
			<a href="hapusobyekwisata.php?obyekhapus=<?php echo $row["obyekKODE"]?>">   Delete</a>
	  </td>
	  <td><?php echo $row["obyekKODE"];?></td>
      <td><?php echo $row["obyekNAMA"]; ?></td>
      <td><?php echo $row["kecamatanKODE"]; ?></td>
      <td><?php echo $row["kategoriKODE"]; ?></td>
	  <td><?php echo $row["obyekALAMAT"]; ?></td>
	  <td><?php echo $row["obyekDERAJAT_S"]; ?></td>
	  <td><?php echo $row["obyekMENIT_S"]; ?></td>
	  <td><?php echo $row["obyekDETIK_S"]; ?></td>
	  <td><?php echo $row["obyekLATITUDE"]; ?></td>
	  <td><?php echo $row["obyekDERAJAT_E"]; ?></td>
	  <td><?php echo $row["obyekMENIT_E"]; ?></td>
	  <td><?php echo $row["obyekDETIK_E"]; ?></td>
	  <td><?php echo $row["obyekLONGITUDE"]; ?></td>
	  <td><?php echo $row["obyekKETINGGIAN"]; ?></td>
	  <td><?php echo $row["obyekDEFINISI"]; ?></td>
	  <td><?php echo $row["obyekKETERANGAN"]; ?></td>
	  <td>
			<?php if($row['obyekFOTO']==""){ echo "<img src='images/noimage.png' width='88'/>";}else{?>
			<img src="images/<?php echo $row['obyekFOTO'] ?>" width="88" class="img-responsive" />
			<?php }?>
	  </td>
    </tr>
    <?php $nomor++; }?>
	<?php } ?>
  </tbody>
</table>
</div>
 </body>
</html>

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
