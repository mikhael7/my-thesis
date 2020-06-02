<?php
include "includes/config.php";
	if(isset($_POST['simpan']));
	{
		$fotokode = $_POST['editkode'];
			$fotonama = $_FILES["foto"]["name"];
			$file_tmp = $_FILES["foto"]["tmp_name"];
		$kategorikode = $_POST["kategoriKODE"];
		
		move_uploaded_file($file_tmp, 'images/'.$fotonama);
		mysqli_query($connection, "UPDATE editfoto set fotoNAMA =  '$fotonama', 
			kategoriKODE='$kategorikode' WHERE fotoKODE = '$fotoKODE'");
		header("location:editfoto2.php");
	}
	
	$fotokode = $_GET["kodefoto"];
	$edit = mysqli_query($connection, "SELECT * FROM editfoto WHERE fotoKODE = '$fotokode'");
	$row_edit = mysqli_fetch_array($edit);
	
	$kategoriquery= mysqli_query($connection, "SELECT * FROM kategoriwisata");	
	
?>

<form method="POST" enctype="multipart/form-data">
	Kode Foto: <input type="text" name="editkode"
	value="<?php echo $row_edit["fotoKODE"]?>"></br>
	Nama File: <?php echo $row_edit["fotoNAMA"];?></br>
	Gambar: <input type="file" name="foto">
	<img src="images/<?php echo $row_edit['fotoNAMA']?>" style="width:80px;height:80px"><br>
	
	<select name="kategorikode">
		<option value="kategorikode"><?php echo $row_edit["kategoriKODE"]?></option>
			<?php if (mysqli_num_rows($kategoriquery) > 0) {?>
			<?php while($row=mysqli_fetch_array($kategoriquery)) {?>
				<option> <?php echo $row["kategoriKODE"] ?>
				<option> <?php echo $row["kategoriNAMA"] ?>
				</option>
			<?php }?>
			<?php }?>
	</select>
	
	<input type="submit" class="btn btn-primary" value="Simpan" name="Simpan">
	<input type="reset" class="btn btn-success" value="Batal" name="Batal">
</form>