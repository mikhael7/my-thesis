<?php
include "includes/config.php";

if(isset($_POST["simpan"]))
{ 	$obyekKODE = $_POST['input_obyek_kode'];
	$obyekNAMA = $_POST['input_obyek_nama'];
	$obyekALAMAT = $_POST['input_obyek_alamat'];
	$kecamatanKODE = $_POST['input_kode_kecamatan'];
	$kategoriKODE = $_POST['input_kode_kategori'];
	$obyekDERAJAT_S = $_POST['input_obyek_derajats'];
	$obyekMENIT_S = $_POST['input_obyek_menits'];
	$obyekDETIK_S = $_POST['input_obyek_detiks'];
	$obyekLATITUDE = $_POST['input_obyek_latitude'];
	$obyekDERAJAT_E = $_POST['input_obyek_derajate'];
	$obyekMENIT_E = $_POST['input_obyek_menite'];
	$obyekDETIK_E = $_POST['input_obyek_detike'];
	$obyekLONGITUDE = $_POST['input_obyek_longitude'];
	$obyekKETINGGIAN = $_POST['input_obyek_ketinggian'];
	$obyekDEFINISI = $_POST['input_obyek_definisi'];
	$obyekKETERANGAN = $_POST['input_obyek_keterangan'];
	$nama = $_FILES['file']['name']; /** untuk menampung data foto atau gambar **/ 
	$file_tmp = $_FILES["file"]["tmp_name"];
	move_uploaded_file($file_tmp, 'images/'.$nama); /** untuk upload file gambarnya **/

mysqli_query($connection, "INSERT INTO obyekwisata VALUES ('$obyekKODE', '$obyekNAMA','$kecamatanKODE', '$kategoriKODE', '$obyekALAMAT',
				'$obyekDERAJAT_S','$obyekMENIT_S','$obyekDETIK_S','$obyekLATITUDE',
				'$obyekDERAJAT_E','$obyekMENIT_E','$obyekDETIK_E','$obyekLONGITUDE',
				'$obyekKETINGGIAN','$obyekDEFINISI','$obyekKETERANGAN','$nama')");
header("location:namaobyekwisata.php");
}
$query = mysqli_query($connection, "SELECT * FROM obyekwisata");
$query2 = mysqli_query($connection, "SELECT * FROM kategoriwisata");
$query3 = mysqli_query($connection, "SELECT * FROM kecamatan");
?>

<?php include("adminmenu.php")?>

<!doctype html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
 <style>
  body {
	  background-color : skyblue;
  }
  @import url('https://fonts.googleapis.com/css?family=Lato&display=swap');
  </style>
</head>
  <body>
  <div class="col-sm-10" >
    <h1 style="text-align:center;"><b>Nama Obyek Wisata</b></h1>
  <form method="POST"style="margin-top:30px;">
    <div class="form-group row">
      <label for="obyekKODE" class="col-sm-3 col-form-label">Obyek Kode</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="obyekKODE" name="input_obyek_kode" placeholder="Kode Obyek Wisata">
      </div>
    </div>

  <div class="form-group row">
      <label for="obyekNAMA" class="col-sm-3 col-form-label">Nama Obyek</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="ObyekNAMA" name="input_obyek_nama" placeholder="Nama Obyek Wisata">
      </div>
    </div>
    

  <div class="form-group row">
      <label for="kecamatanKODE" class="col-sm-3 col-form-label">Daftar Kecamatan</label>
      <div class ="col-sm-9">
          <select name ="input_kode_kecamatan" class="form-control">
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
          <select name ="input_kode_kategori" class="form-control">
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
      <label for="obyekALAMAT" class="col-sm-3 col-form-label">Alamat Obyek</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" 
    id="obyekALAMAT" name="input_obyek_alamat" placeholder="Alamat Obyek Wisata">
      </div>
    </div>
    
  <div class="form-group row">
      <label for="obyekDERAJAT_S" class="col-sm-3 col-form-label">Obyek Derajat S</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" 
    id="obyekDERAJAT_S" name="input_obyek_derajats" placeholder="Obyek Derajat S">
      </div>
    </div>
    
  <div class="form-group row">
      <label for="obyekMENIT_S" class="col-sm-3 col-form-label">Obyek Menit S</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" 
    id="obyekMENIT_S" name="input_obyek_menits" placeholder="Obyek Menit S">
      </div>
    </div>

  <div class="form-group row">
      <label for="obyekDETIK_S" class="col-sm-3 col-form-label">Obyek Detik S</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" 
    id="obyekDETIK_S" name="input_obyek_detiks" placeholder="Obyek Detik S">
      </div>
    </div>

  <div class="form-group row">
      <label for="obyekLATITUDE" class="col-sm-3 col-form-label">Obyek Latitude</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" 
    id="obyekLATITUDE" name="input_obyek_latitude" placeholder="Obyek Latitude">
      </div>
    </div>  
    
  <div class="form-group row">
      <label for="obyekDERAJAT_E" class="col-sm-3 col-form-label">Obyek Derajat E</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" 
    id="obyekDERAJAT_E" name="input_obyek_derajate" placeholder="Obyek Derajat E">
      </div>
    </div>  
    
  <div class="form-group row">
      <label for="obyekMENIT_E" class="col-sm-3 col-form-label">Obyek Menit E</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" 
    id="obyekMENIT_E" name="input_obyek_menite" placeholder="Obyek Menit E">
      </div>
    </div>  

  <div class="form-group row">
      <label for="obyekDETIK_E" class="col-sm-3 col-form-label">Obyek Detik E</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" 
    id="obyekDETIK_E" name="input_obyek_detike" placeholder="Obyek Detik E">
      </div>
    </div>  

  <div class="form-group row">
      <label for="obyekLONGITUDE" class="col-sm-3 col-form-label">Obyek Longitude</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" 
    id="obyekLONGITUDE" name="input_obyek_longitude" placeholder="Obyek Longitude">
      </div>
    </div>  
    
  <div class="form-group row">
      <label for="obyekKETINGGIAN" class="col-sm-3 col-form-label">Obyek Ketinggian</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" 
    id="obyekKETINGGIAN" name="input_obyek_ketinggian" placeholder="Obyek Ketinggian">
      </div>
    </div>  
    
  <div class="form-group row">
      <label for="obyekDEFINISI" class="col-sm-3 col-form-label">Obyek Definisi</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" 
    id="obyekDEFINISI" name="input_obyek_definisi" placeholder="Obyek Definisi">
      </div>
    </div>  
    
  <div class="form-group row">
      <label for="obyekKETERANGAN" class="col-sm-3 col-form-label">Obyek Keterangan</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" 
    id="obyekKETERANGAN" name="input_obyek_keterangan" placeholder="Obyek Keterangan">
      </div>
    </div>  

  <div class="form-group row">
        <label for="file" class="col-sm-3 col-form-label">Muat File/Foto Obyek Wisata</label>
        <div class="col-sm-9">
        <input type="file" id="file" name="file">
        <p class="help-block">INI UNTUK MENGGUGAH FILE/FOTO</p>		  

        </div>
      </div>

  <div class="form-group row">
  <div class="col-sm-3 col-form-label">
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
  <?php if(mysqli_num_rows($query) > 0) {?>
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
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>