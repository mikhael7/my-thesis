<!doctype.htlm>
<?php
include "includes/config.php";

/** Mengecek apakah tombol simpan sudah di pilih/klik atau belum **/
     if(isset($_POST['Simpan']))
 	 {	
		if (isset($_REQUEST["kabupatenKode"]))
			{	$kabupatenKODE = $_REQUEST["kabupatenKode"];
			} 
		if (!empty($kabupatenKODE))
			{	$kabupatenKODE = $_POST['kabupatenKode'];	
			}
		$kabupatenNAMA = $_POST['kabupatenNama'];
		$kabupatenALAMAT= $_POST['kabupatenAlamat'];
		$kabupatenKET = $_POST['kabupatenKet'];
	$nama = $_FILES['file']['name']; /** untuk menampung data foto atau gambar **/ 
	$file_tmp = $_FILES["file"]["tmp_name"];
	move_uploaded_file($file_tmp, 'images/'.$nama); /** untuk upload file gambarnya **/
		$kabupatenFOTOICONKET = $_POST['kabupatenFotoIconKet'];			
		
/** Memasukkan data fullname ke dalam tabel kabupaten**/
     mysqli_query($connection, "INSERT INTO kabupaten VALUES ('$kabupatenKODE',
	 '$kabupatenNAMA','$kabupatenALAMAT','$kabupatenKET','$nama','$kabupatenFOTOICONKET')"); 
     header("location:kabupaten.php");
     }

	 $query = mysqli_query($connection, "SELECT * FROM kabupaten");
 
?>	


<?php include("adminmenu.php") ?>

<div class="templatemo-content-wrapper">
<div class="templatemo-content entri-form">
	<div class="etri-form" style="margin-top: -15px";>	
		<h1 style="text-align:center;"><b>ENTRI DATA KABUPATEN</h1><br>
	</div>	
<div class="row">
	<div class="col-sm-12">
		<form method="POST" class="form-horizontal" enctype="multipart/form-data">
		  <div class="form-group form-group-lg">
			<label class="col-sm-3 control-label" for="KabupatenKode">Kode Kabupaten</label>
			<div class="col-sm-6">
			  <input class="form-control" type="text" id="KabupatenKode" name="kabupatenKode" placeholder="99.99 (provinsi.kabupaten)" 
			  maxlength="5" required="">
			</div>
			<a href="images/KodeKabupatenJateng.pdf" target="_blank">
			<button type="button" class="btn btn-lg btn-primary">Kode Kabupaten</button></a>	
		  </div>

		  <div class="form-group form-group-lg">
			<label class="col-sm-3 control-label" for="KabupatenNama">Nama Kabupaten</label>
			<div class="col-sm-6">
			  <input class="form-control" type="text" id="KabupatenNama" name="kabupatenNama" placeholder="Nama Kabupaten">
			</div>
		  </div>

		  <div class="form-group form-group-lg">
			<label class="col-sm-3 control-label" for="KabupatenAlamat">Alamat Kabupaten</label>
			<div class="col-sm-6">
			  <input class="form-control" type="text" id="KabupatenAlamat" name="kabupatenAlamat" placeholder="Alamat Kabupaten">
			</div>
		  </div>

		  <div class="form-group form-group-lg">
			<label class="col-sm-3 control-label" for="KabupatenKet">Keterangan Kabupaten</label>
			<div class="col-sm-6">
			  <input class="form-control" type="text" id="KabupatenKet" name="kabupatenKet" placeholder="Keterangan Kabupaten">
			</div>
		  </div>

		  <div class="form-group form-group">
			<label class="col-sm-3 control-label" for="file">Icon Wisata Kabupaten</label>
			<div class="col-sm-9">
			  <input type="file" id="file" name="file">
			  <p class="help-block">Field ini digunakan untuk mengambil file gambar/foto ICON berita</p>
			</div>
		  </div>			  
		  
		  <div class="form-group form-group-lg">
			<label class="col-sm-3 control-label" for="KabupatenFotoIconKet">Keterangan Kabupaten</label>
			<div class="col-sm-6">
			  <input class="form-control" type="text" id="KabupatenFotoIconKet" name="kabupatenFotoIconKet" placeholder="Keterangan Icon Kabupaten">
			</div>
		  </div>
		  
		  <div class="col-sm-3">
		  
		  </div>
		  <div class="col-sm-4">
			<input class="btn btn-lg btn-primary" type="submit" value="Simpan" name="Simpan">
			<!-- tombol diperbesar dg -lg dan berwarna biru dengan -primary -->
			<input class="btn btn-lg btn-info" type="reset" value="Batal"> <!-- tombol berwarna hijau langit -->
		  </div>
		</form>	
	
	<table class="table table-hover">
		<div class="etri-form">	
			<br><br><br><h1 style="text-align:center;"><b>HASIL ENTRI KABUPATEN</h1>
		</div>
	<!-- membuat judul -->
	<tr class="info">
				<th>NO</th>
				<th>KODE KABUPATEN</th>
				<th>NAMA KABUPATEN</th>
				<th>ALAMAT KANTOR KABUPATEN</th>
				<th>KETERANGAN KABUPATEN</th>
				<th>FOTO ICON</th>
				<th>KETERANGAN FOTO ICON</th>				
				<th>ACTION</th>
	</tr>
	<?php
		/** Memeriksa apakah data yang dipanggil tersebut tersedia atau tidak **/
		if(mysqli_num_rows($query)>0) 
	{?>
		<?php $no=1; ?>
		<?php while ($row = mysqli_fetch_array($query)) 
			{ ?>
				<tr class="danger" height="20px">
					<td><?php echo $no; ?></td>
					<td><?php echo $row['kabupatenKODE']; ?> </td>
					<td><?php echo $row['kabupatenNAMA']; ?> </td>
					<td><?php echo $row['kabupatenALAMAT']; ?> </td>
					<td><?php echo substr($row['kabupatenKET'],'0','180'); echo '  .... dst' ?>
					<td>
						<?php if($row['kabupatenFOTOICON']==""){ echo "<img src='images/noimage.png' width='88'/>";}else{?>
						<img src="images/<?php echo $row['kabupatenFOTOICON'] ?>" width="88" class="img-responsive" />
						<?php }?>
					</td>
					<td><?php echo $row['kabupatenFOTOICONKET'];?></td>					
					<td>
						<a href="javascript:;"><i class="fa fa-pencil-square-o"></i>
						<a href="kabupatenubah.php?kabupatenubah=<?php echo $row["kabupatenKODE"]?>">   Update</a> |
						<a href="javascript:;"><i class="fa fa-scissors"></i>
						<a href="kabupatenhapus.php?kabupatenhapus=<?php echo $row["kabupatenKODE"]?>">   Delete</a> 
					</td>
				</tr>
				<?php $no++; ?> 
			<?php  } ?>
	<?php  } ?>
	</table>
	</div>
</div>
</div>
</div>

<?php include ("adminfooter.php") ?>
