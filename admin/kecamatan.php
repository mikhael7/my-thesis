<?php
 /** Untuk menyisipkan file koneksi ke file config.php **/

include ("includes/config.php");
	
	
	session_start();
	$_SESSION['admin_KODE'];
	$_SESSION['admin_EMAIL'];
	

/** Mengecek apakah tombol simpan sudah di pilih/klik atau belum **/
     if(isset($_POST['Simpan']))
 	 {	
		$kecamatankode = $_POST['inputkecamatankode'];					
		$kecamatannama= $_POST['inputkecamatannama'];
		$kecamatanalamat= $_POST['inputkecamatanalamat'];
		$kecamatanketerangan = $_POST['inputkecamatanketerangan'];
		$kabupatenkode = $_POST['kabupatenKODE'];
		
/** Memasukkan seluruh data yang dientri ke dalam tabel kecamatan**/
     mysqli_query($connection, "INSERT INTO kecamatan VALUES ('$kecamatankode',
	 '$kecamatannama','$kecamatanalamat','$kecamatanketerangan','$kabupatenkode')"); 
     header("location:kecamatan.php");
     }
	 
	$query = mysqli_query($connection, "SELECT * FROM kecamatan");
	$query2 = mysqli_query($connection,"SELECT * FROM kabupaten");
 	
?>

<?php include("adminmenu.php") ?>

	
	<div class="templatemo-content-wrapper">
<div class="templatemo-content entri-form">
	<div class="etri-form" style="margin-top: -15px";>	
		<h1 style="text-align:center;"><b>ENTRI DATA KECAMATAN</h1><br>
	</div>	
	
	<div class="col-sm-10">
	<form method="POST" enctype="multipart/form-data" >
	  <div class="form-group row">
		<label for="kecamatankode" class="col-sm-4 col-form-label">Kode Kecamatan</label>
		<div class="col-sm-8">
		  <input type="text" class="form-control" id="kecamatankode" 
				name="inputkecamatankode" placeholder="Input Kode Kecamatan (00.00.00)" maxlength="8" required="">
		</div>
	  </div>
	  <div class="form-group row">
		<label for="kecamatannama" class="col-sm-4 col-form-label">Nama Kecamatan</label>
		<div class="col-sm-8">
		  <input type="text" class="form-control" id="kecamatannama" 
				name="inputkecamatannama" placeholder="Input Nama Kecamatan">
		</div>
	  </div>
	  <div class="form-group row">
		<label for="kecamatanalamat" class="col-sm-4 col-form-label">Alamat Kecamatan</label>
		<div class="col-sm-8">
		  <input type="text" class="form-control" id="kecamatanalamat" 
				name="inputkecamatanalamat" placeholder="Input Alamat Kecamatan">
		</div>
	  </div>
	  <div class="form-group row">
		<label for="kecamatanketerangan" class="col-sm-4 col-form-label">Keterangan Kecamatan</label>
		<div class="col-sm-8">
		  <input type="text" class="form-control" id="kecamatanketerangan" 
				name="inputkecamatanketerangan" placeholder="Input Keterangan Kecamatan">
		</div>
	  </div>


	  <!-- bikin option pada daftar kecamatan -->
	  <div class="form-group row">
		<label for="kecamatanketerangan" class="col-sm-4 col-form-label">Daftar Kabupaten</label>
		<div class ="col-sm-8">
				<select name ="kabupatenKODE" class="form-control">
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
			<input type="submit" class="btn btn-primary" value="Simpan" name="Simpan">
			<input type="reset" class="btn btn-success" value="Batal" name="Batal">
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
</div>
</div>
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

	  