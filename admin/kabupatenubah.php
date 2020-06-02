<!doctype.htlm>
<?php
include "includes/config.php";

/** Mengecek apakah tombol update sudah di pilih/klik atau belum **/
     if(isset($_POST["batal"]))
 	 {	
		header("location:Kabupaten.php"); 	
	 }
     if(isset($_POST["ubah"]))
 	 {	
		$kabupatenKODE = $_POST["kabupatenKode"];
		$kabupatenNAMA = $_POST["kabupatenNama"];
		$kabupatenALAMAT= $_POST["kabupatenAlamat"];
		$kabupatenKET = $_POST["kabupatenKet"];
		$kabupatenFOTOICONKET = $_POST["kabupatenFotoIconKet"];
		
		mysqli_query($connection, "UPDATE kabupaten set kabupatenNAMA='$kabupatenNAMA', 
			kabupatenALAMAT='$kabupatenALAMAT',kabupatenKET='$kabupatenKET',
			kabupatenFOTOICONKET='$kabupatenFOTOICONKET' WHERE kabupatenKODE='$kabupatenKODE'");
		header("location:Kabupaten.php"); 	
	 }	
	 
/** menampilkan data kabupaten pada FORM **/

$kabupatenKode = $_GET["kabupatenubah"];
$edit = mysqli_query($connection, "SELECT * FROM kabupaten WHERE kabupatenKODE = '$kabupatenKode'");
$row_edit = mysqli_fetch_array($edit); 

$query = mysqli_query($connection, "SELECT * FROM kabupaten");
  
?>	

<?php include("adminmenu.php") ?>

<div class="templatemo-content-wrapper">
<div class="templatemo-content entri-form">
	<div class="etri-form" style="margin-top: -15px";>	
		<h1><b>ENTRI DATA KABUPATEN</h1><br>
	</div>	
<div class="row">
	<div class="col-sm-12">
		<form method="POST" class="form-horizontal" enctype="multipart/form-data">
		  <div class="form-group form-group-lg">
			<label class="col-sm-3 control-label" for="KabupatenKode">Kode Kabupaten</label>
			<div class="col-sm-6">
			  <input class="form-control" type="text" id="KabupatenKode" name="kabupatenKode" 
			  value="<?php echo $row_edit["kabupatenKODE"]?>"/>			
			</div>
		  </div>

		  <div class="form-group form-group-lg">
			<label class="col-sm-3 control-label" for="KabupatenNama">Nama Kabupaten</label>
			<div class="col-sm-6">
			  <input class="form-control" type="text" id="KabupatenNama" name="kabupatenNama"
			  value="<?php echo $row_edit["kabupatenNAMA"]?>"/>	
			</div>
		  </div>

		  <div class="form-group form-group-lg">
			<label class="col-sm-3 control-label" for="KabupatenAlamat">Alamat Kabupaten</label>
			<div class="col-sm-6">
			  <input class="form-control" type="text" id="KabupatenAlamat" name="kabupatenAlamat"
			  value="<?php echo $row_edit["kabupatenALAMAT"]?>"/>	
			</div>
		  </div>

		  <div class="form-group form-group-lg">
			<label class="col-sm-3 control-label" for="KabupatenKet">Keterangan Kabupaten</label>
			<div class="col-sm-6">
			  <input class="form-control" type="text" id="KabupatenKet" name="kabupatenKet" 
			  value="<?php echo $row_edit["kabupatenKET"]?>"/>	
			</div>
		  </div>
		  
		  <div class="form-group form-group">
			<label class="col-sm-3 control-label" for="foto">Icon Wisata Kabupaten</label>
			<div class="col-sm-9">
			<input type="checkbox" name="ubahfoto" value="true"> Beri tanda centang (V) jika ingin mengubah foto <br>			
			  <input type="file" id="foto" name="foto">
			  <img src="images/<?php echo $row_edit['kabupatenFOTOICON']?>" style="width:200px;height:100px">
			  <p class="help-block">Field ini digunakan untuk mengambil file gambar/foto ICON berita</p>
			</div>
		  </div>			  
		  
		  <div class="form-group form-group-lg">
			<label class="col-sm-3 control-label" for="KabupatenFotoIconKet">Keterangan Icon Kabupaten</label>
			<div class="col-sm-6">
			  <input class="form-control" type="text" id="KabupatenFotoIconKet" name="kabupatenFotoIconKet"
			  value="<?php echo $row_edit["kabupatenFOTOICONKET"]?>"/>	
			</div>
		  </div>
		  
		  <div class="col-sm-3">
		  
		  </div>
		  <div class="col-sm-4">
			<input class="btn btn-lg btn-primary" type="submit" value="ubah" name="ubah">
			<!-- tombol diperbesar dg -lg dan berwarna biru dengan -primary -->
			<input class="btn btn-lg btn-info" type="submit" value="batal" name="batal"> <!-- tombol berwarna hijau langit -->
			<input type="hidden" name = "kabupatenKode" value = "<?php echo $row_edit["kabupatenKODE"]?>"/>					
		  </div>
		</form>	
	
	<table class="table table-hover">
		<div class="etri-form">	
			<br><br><br><h1><b>HASIL ENTRI KABUPATEN</h1>
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

