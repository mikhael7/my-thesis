<?php
	
	include "includes/config.php";
	if(isset($_POST['Simpan']))
 	 {	
		$fotoKODE = $_POST['fotokode'];
		$kategoriKODE = $_POST['kategorikode'];
		$nama = $_FILES['file']['name']; /** untuk menampung data foto atau gambar **/ 
		$file_tmp = $_FILES["file"]["tmp_name"];
		move_uploaded_file($file_tmp, 'images/'.$nama); /** untuk upload file gambarnya **/
		$fotoNAMA = $_POST['fotonama'];
		mysqli_query($connection, "INSERT INTO editfoto VALUES ('$fotoKODE',
		'$fotoNAMA','$kategoriKODE')"); 
		header("location:editfoto2.php");
     }	
	$query = mysqli_query($connection, "SELECT * FROM editfoto");
?>
<!DOCTYPE html>
<html>
<head>
	 <link href="css/bootstrap.min.css" rel="stylesheet">
	<title></title>

</head>
<body>

<div class="col-sm-10" style="padding-top: 20px">

<form method="POST">

  <div class="form-group row">
    <label for="fotokode" class="col-sm-3 col-form-label">Foto Kode</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="fotokode" name="fotokode"  placeholder="Foto Kode">
    </div>
  </div>

 <div class="form-group row">
		<label for="fotonama" class="col-sm-4 col-form-label">Muat File/Foto</label>
		<div class="col-sm-8">
		 		
		 		<input type="file" name="file" id="file">
		 		<p class="help=block"> ini untuk mengunggah file/foto </p>
		</div>
	</div>
	  

  <div class="form-group row">
    <label for="kategorikode" class="col-sm-3 col-form-label">Kategori Kode</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="kategorikode" name="kategorikode" placeholder="Kategori Kode">
    </div>
  </div>
	  
	<div class="form-group row">
	<div class="col-sm-3 col-form-label"> 
	</div>
	<div class="col-sm-9">
<button type="submit" class="btn btn-primary" name="simpan" value="simpan">Simpan</button>
<button type="submit" class="btn btn-secondary" name="batal" value="batal">Batal</button>
	</div>
</div>

</body>
</html>

<html>
<head>
	<title>KATEGORI WISATA</title>
</head>
<body>
	<h2>MEMPERBAHARUI FOTO</h2>
	<table border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>Kode Foto</th>
				<th>Nama Foto</th>
				<th>Kategori Kode</th>
				<th>Gambar Foto</th>
				<th>Action</th>
			</tr>
		</thead>
		
		<tbody>
			<?php if(mysqli_num_rows($query)>0)
			{?>
				<?php $nomor=1;
				while ($row = mysqli_fetch_array($query))
				{?>
				<tr>
					<th scope="row"><?php echo $nomor; ?></th>
					<td><?php echo $row["fotoKODE"];?></td>
					<td><?php echo $row["fotoNAMA"];?></td>
					<td><?php echo $row["kategoriKODE"];?></td>
					<td>
						<?php if($row['fotoNAMA']==""){ echo "<img src='iconfoto/noimage.png' width='80'/>";}else{?>
						<img src="images/<?php echo $row['fotoNAMA'] ?>" width="80" class="img-responsive" />
						<?php }?>
					</td>
					<td>
							<a href="updatefoto-form3.php?kodefoto=<?php echo $row["fotoKODE"]?>">EDIT</a>
							<a href="hapusfoto2.php?kodefoto=<?php echo $row["fotoKODE"]?>">DELETE</a>
					</td>
					</tr>
				<?php $nomor++; }?>
			<?php } ?>
		</tbody>
	</table>
	
</form>
</div>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>