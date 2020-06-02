<?php
include "includes/config.php"; /** Untuk menyisipkan file koneksi ke file config.php **/

	 if(isset($_POST["batal"]))
	 {
		 header("location:kecamatan.php");
	 }
/** Mengecek apakah tombol simpan sudah di pilih/klik atau belum **/
     if(isset($_POST["ubah"]))
 	 {	
		$kecamatankode = $_POST['inputkecamatankode'];					
		$kecamatannama= $_POST['inputkecamatannama'];
		$kecamatanalamat= $_POST['inputkecamatanalamat'];
		$kecamatanketerangan = $_POST['inputkecamatanketerangan'];
		$kabupatenkode = $_POST['kabupatenKODE'];
		
/** Memasukkan seluruh data yang dientri ke dalam tabel kecamatan**/
     mysqli_query($connection, "UPDATE kecamatan set kecamatanNAMA='$kecamatannama',
				  kecamatanALAMAT='$kecamatanalamat',kecamatanKET='$kecamatanketerangan',
				  kabupatenKODE='$kabupatenkode' WHERE kecamatanKODE='$kecamatankode'");
	header("location:kecamatan.php"); 
     }
	 $kecamatanubahkode = $_GET["kecamatanubah"];
	 $edit = mysqli_query($connection, "SELECT * FROM kecamatan WHERE kecamatanKODE = '$kecamatanubahkode'");
	 $row_edit = mysqli_fetch_array($edit); 
	 
	$query = mysqli_query($connection, "SELECT * FROM kecamatan");
	$query2 = mysqli_query($connection,"SELECT * FROM kabupaten");
 	
?>

<?php include("adminmenu.php") ?>

	
	<div class="templatemo-content-wrapper">
<div class="templatemo-content entri-form">
	<div class="etri-form" style="margin-top: -15px";>	
		<h1><b>ENTRI DATA KECAMATAN</h1><br>
	</div>	
	
	<div class="col-sm-10">
	<form method="POST" enctype="multipart/form-data" >
	  <div class="form-group row">
		<label for="kecamatankode" class="col-sm-4 col-form-label">Kode Kecamatan</label>
		<div class="col-sm-8">
		  <input type="text" class="form-control" id="kecamatankode" 
				name="inputkecamatankode" maxlength="8" required="" value="<?php echo $row_edit["kecamatanKODE"]?>"/>
		</div>
	  </div>
	  <div class="form-group row">
		<label for="kecamatannama" class="col-sm-4 col-form-label">Nama Kecamatan</label>
		<div class="col-sm-8">
		  <input type="text" class="form-control" id="kecamatannama" 
				name="inputkecamatannama" value="<?php echo $row_edit["kecamatanNAMA"]?>">
		</div>
	  </div>
	  <div class="form-group row">
		<label for="kecamatanalamat" class="col-sm-4 col-form-label">Alamat Kecamatan</label>
		<div class="col-sm-8">
		  <input type="text" class="form-control" id="kecamatanalamat" 
				name="inputkecamatanalamat" value="<?php echo $row_edit["kecamatanALAMAT"]?>">
		</div>
	  </div>
	  <div class="form-group row">
		<label for="kecamatanketerangan" class="col-sm-4 col-form-label">Keterangan Kecamatan</label>
		<div class="col-sm-8">
		  <input type="text" class="form-control" id="kecamatanketerangan" 
				name="inputkecamatanketerangan" value="<?php echo $row_edit["kecamatanKET"]?>">
		</div>
	  </div>


	  <!-- bikin option pada daftar kecamatan -->
	  <div class="form-group row">
		<label for="kecamatanketerangan" class="col-sm-4 col-form-label">Daftar Kabupaten</label>
		<div class ="col-sm-8">
				<select name ="kabupatenKODE" class="form-control" value="<?php echo $row_edit["kabupatenKODE"]?>">
						<option value="kabupaten">Kabupaten</option>

						<?php if(mysqli_num_rows($query2) > 0 ) : ?>
							<?php while($row = mysqli_fetch_array($query2) ) : ?>
									<option><?= $row["kabupatenKODE"] ?>
									</option>
									

						<?php endwhile; ?>
						<?php endif; ?>	
				</select>	

		</div>
	  </div>	  



	  <div class="form-group row">
		<div class="col-sm-4 col-form-label">
		</div>
		<div class="col-sm-8">
			<input type="submit" class="btn btn-primary" value="ubah" name="ubah">
			<input type="reset" class="btn btn-success" value="batal" name="batal">
		</div>
	  </div>		  
	</form>
	
	<table class="table table-hover table-secondary">
	  <thead>
		<tr>
		  <th scope="col">No</th>
		  <th scope="col">Action</th>
		  <th scope="col">Kode Kecamatan</th>
		  <th scope="col">Nama Kecamatan</th>
		  <th scope="col">Alamat Kecamatan</th>
		  <th scope="col">Keterangan Kecamatan</th>
		  <th scope="col">Kode Kabupaten</th>
	    </tr>
	  </thead>
	  
	  <tbody>
	  <?php if(mysqli_num_rows($query)>0) /** memeriksa apakah data yg dipanggil tersedia **/
	  {?>
		<?php $nomor=1;
		while ($row = mysqli_fetch_array($query))
		{?>
		<tr>
		  <th scope="row"><?php echo $nomor; ?></th>
		  <td>
				<a href="javascript:;"><i class="fa fa-pencil-square-o"></i>
				<a href="editkecamatan.php?kecamatanubah=<?php echo $row["kecamatanKODE"]?>">   Update</a> |
				<a href="javascript:;"><i class="fa fa-pencil-square-o"></i>
				<a href="hapuskecamatan.php?kecamatanhapus=<?php echo $row["kecamatanKODE"]?>">   Delete</a>
		  </td>
		  <td><?php echo $row["kecamatanKODE"];?></td>
		  <td><?php echo $row["kecamatanNAMA"];?></td>
		  <td><?php echo $row["kecamatanALAMAT"];?></td>
		  <td><?php echo $row["kecamatanKET"];?></td> 
		  <td><?php echo $row["kabupatenKODE"];?></td>
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
