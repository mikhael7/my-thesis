<!doctype.htlm>
<?php
include "includes/config.php";

/** Mengecek apakah tombol simpan sudah di pilih/klik atau belum **/
     if(isset($_POST['Simpan'])) {	
		 $beritaKODE = $_POST['input_kode'];	
		 $beritaJUDUL = $_POST['input_judul_berita'];
		 $kategoriberitaKODE = $_POST['input_kode_berita'];
		 $eventKODE = $_POST['inputkodeevent'];
		 $kabupatenKODE = $_POST['kabupatenKode'];
		 $beritaISI = $_POST['input_berita_isi'];
		 $beritaISI2 = $_POST['input_berita_isi_2'];
		 $beritaSUMBER = $_POST['input_berita_sumber'];
		 $beritaPENULIS = $_POST['input_berita_penulis'];
		 $beritaTGL = date('Y-m-d', strtotime($_POST['input_tanggal_berita']));
		 $nama = $_FILES['file']['name']; /** untuk menampung data foto atau gambar **/ 
		 $file_tmp = $_FILES["file"]["tmp_name"];
 		 move_uploaded_file($file_tmp, 'images/'.$nama); /** untuk upload file gambarnya **/
		
/** Memasukkan data fullname ke dalam tabel kabupaten**/
     mysqli_query($connection, "INSERT INTO berita VALUES ('$beritaKODE',
	   '$beritaJUDUL','$kategoriberitaKODE','$eventKODE','$kabupatenKODE','$beritaISI','$beritaISI2','$beritaSUMBER','$beritaPENULIS'
	   ,'$beritaTGL','$nama')"); 
     header("location:detilberita.php");
     }

	   $query = mysqli_query($connection, "SELECT * FROM berita");
	   $query2 = mysqli_query($connection, "SELECT * FROM kategoriberita");
	   $query3 = mysqli_query($connection, "SELECT * FROM kegiatan");
	   $query4 = mysqli_query($connection, "SELECT * FROM kabupaten");
?>	


<?php 
    include("adminmenu.php") 
?>

<style>
	@import url('https://fonts.googleapis.com/css?family=Lato&display=swap');
    body {
  	  background-color : skyblue;
    }
</style>

<body>
<div class="templatemo-content-wrapper">
<div class="templatemo-content entri-form">
	<div class="etri-form" style="margin-top: 5px";>	
		<h1 style="text-align:center;"><b>Detil Berita</h1><br>
	</div>	
  <div class="row">
	<div class="col-sm-12">
		<form method="POST" class="form-horizontal" enctype="multipart/form-data">
		 <div class="form-group form-group-lg">
			<label class="col-sm-3 control-label" for="beritaKODE">Kode Berita</label>
			<div class="col-sm-6">
			  <input class="form-control" type="text" id="beritaKODE" name="input_kode_berita" placeholder="Berita Kode">
			</div>
		  </div>

		  <div class="form-group form-group-lg">
			<label class="col-sm-3 control-label" for="beritaJUDUL">Judul Berita</label>
			<div class="col-sm-6">
			  <input class="form-control" type="text" id="beritaJUDUL" name="input_judul_berita" placeholder="Judul Berita">
			</div>
		  </div>
		  
		  <div class="form-group form-group-lg">
		  <label for="kategoriberitaKODE" class="col-sm-3 control-label">Daftar Kategori Berita Kode</label>
		  <div class ="col-sm-6">
				<select name ="input_kode_berita" class="form-control">
						<option value="berita">Kategori Kode Berita</option>

						<?php if(mysqli_num_rows($query2) > 0 ) : ?>
							<?php while($row = mysqli_fetch_array($query2) ) : ?>
									<option><?= $row["kategoriberitaKODE"] ?>
									</option>
						<?php endwhile; ?>
						<?php endif; ?>	
				</select>	

		</div>
	  </div>	  
	  
	  <div class="form-group form-group-lg">
		<label for="eventKODE" class="col-sm-3 control-label">Daftar Event Kode</label>
		<div class ="col-sm-6">
				<select name ="inputkodeevent" class="form-control">
						<option value="event">Event Kode</option>
						<?php if(mysqli_num_rows($query3) > 0 ) : ?>
							<?php while($row = mysqli_fetch_array($query3) ) : ?>
									<option><?= $row["eventKODE"] ?>
									</option>
						<?php endwhile; ?>
						<?php endif; ?>	
				</select>	

		</div>
	  </div>	  
	  
	   <div class="form-group form-group-lg">
		<label for="kecamatanketerangan" class="col-sm-3 control-label">Daftar Kabupaten</label>
		<div class ="col-sm-6">
				<select name ="kabupatenKode" class="form-control">
						<option value="kabupaten">Kabupaten</option>
						<?php if(mysqli_num_rows($query4) > 0 ) : ?>
							<?php while($row = mysqli_fetch_array($query4) ) : ?>
									<option><?= $row["kabupatenKODE"] ?>
									</option>
						<?php endwhile; ?>
						<?php endif; ?>	
				</select>
			</div>
		</div>	  

		<div class="form-group form-group-lg">
		<label class="col-sm-3 control-label" for="beritaISI">Isi Berita</label>
			<div class="col-sm-6">
				<input class="form-control" type="text" id="beritaISI" name="input_berita_isi" placeholder="Isi Berita">
			</div>
		</div>
		  
		<div class="form-group form-group-lg">
			<label class="col-sm-3 control-label" for="beritaISI2">Isi Berita 2</label>
			<div class="col-sm-6">
				<input class="form-control" type="text" id="beritaISI2" name="input_berita_isi2" placeholder="Isi Berita 2">
			</div>
		</div>
		  
		<div class="form-group form-group-lg">
			<label class="col-sm-3 control-label" for="beritaSUMBER">Sumber Berita</label>
			<div class="col-sm-6">
				<input class="form-control" type="text" id="beritaSUMBER" name="input_berita_sumber" placeholder="Sumber Berita">
			</div>
		</div>
		  
		  <div class="form-group form-group-lg">
			<label class="col-sm-3 control-label" for="beritaPENULIS">Penulis Berita</label>
			<div class="col-sm-6">
			  <input class="form-control" type="text" id="beritaPENULIS" name="input_berita_penulis" placeholder="Penulis Berita">
			</div>
		  </div>

		<div class="form-group form-group-lg">
		<label for="datepicker" class="col-sm-3 control-label">Tanggal Berita</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" id="datepicker" name="input_tanggal_berita" placeholder="mm-dd-yyyy">    
		</div>
    
		</div>
		<div class="form-group form-group-lg">
			<label for="file" class="col-sm-3 control-label">Muat File/Foto Berita</label>
			<div class="col-sm-6">
				<input type="file" id="file" name="file">
				<p class="help-block">INI UNTUK MENGGUGAH FILE/FOTO</p>		  
				</div>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-sm-3 col-form-label">
				</div>
				<div class="col-sm-9"> 
					<input class="btn btn-lg btn-primary" type="submit" value="Simpan" name="Simpan">
					<!-- tombol diperbesar dg -lg dan berwarna biru dengan -primary -->
					<input class="btn btn-lg btn-info" type="reset" value="Batal"> <!-- tombol berwarna hijau langit -->
				</div>
		  	</div>
		</form>	
			
		
	<table class="table table-dark">
	<div>
		<h1 style="text-align:center; margin-top:5px;"><b>HASIL BERITA</h1>
		</div>
	  <thead>
		<!-- membuat judul -->
	  <tr class="info">
				<th>NO</th>
				<th>KODE BERITA</th>
				<th>JUDUL BERITA</th>
				<th>KATEGORI KODE BERITA</th>
				<th>KODE EVENT</th>
				<th>KODE KABUPATEN</th>
				<th>ISI BERITA</th>	
				<th>ISI BERITA 2</th>	
				<th>SUMBER BERITA</th>	
				<th>PENULIS BERITA</th>	
				<th>TANGGAL BERITA</th>	
				<th>FOTO BERITA</th>	
	  </tr>
	  </thead>
	  <tbody>
	  <?php
		/** Memeriksa apakah data yang dipanggil tersebut tersedia atau tidak **/
		if(mysqli_num_rows($query)>0) {
		?>
		<?php $no=1; ?>
		<?php while ($row = mysqli_fetch_array($query)) 
			{ ?>
				<tr class="danger" height="20px">
					<td><?php echo $no; ?></td>
					<td>
						<a href="javascript:;"><i class="fa fa-pencil-square-o"></i>
						<a href="editdetailberita.php?editdetailberita=<?php echo $row["beritaKODE"]?>">   Update</a> |
						<a href="javascript:;"><i class="fa fa-scissors"></i>
						<a href="deletedetailberita.php?deletedetailberita=<?php echo $row["beritaKODE"]?>">   Delete</a>
					</td>
					<td><?php echo $row['beritaKODE']; ?> </td>
					<td><?php echo $row['beritaJUDUL']; ?> </td>
					<td><?php echo $row['kategoriberitaKODE']; ?> </td>
					<td><?php echo $row['eventKODE']; ?> </td>
					<td><?php echo $row['kabupatenKODE'];?></td>
					<td><?php echo $row['beritaISI'];?></td>
					<td><?php echo $row['beritaISI2'];?></td>
					<td><?php echo $row['beritaSUMBER'];?></td>
					<td><?php echo $row['beritaPENULIS'];?></td>
					<td><?php echo $row['beritaTGL'];?></td>					
					<td>
						<?php if($row['beritaICONFOTO']==""){ echo "<img src='images/noimage.png' width='88'/>";}else{?>
						<img src="images/<?php echo $row['beritaICONFOTO'] ?>" width="88" class="img-responsive" />
						<?php }?>
					</td>
					
				</tr>
				<?php $no++; ?> 
			<?php  } ?>
	<?php  } ?>
	</tbody>
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

  <script type="text/javascript" src="scriptdate.js"></script>

<?php include ("adminfooter.php") ?>