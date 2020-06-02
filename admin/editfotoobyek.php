<?php
include "includes/config.php";

/** Mengecek apakah tombol simpan sudah di pilih/klik atau belum **/

if(isset($_POST["simpan"]))
   {
    $fotoobyekKODE = $_POST["foto_obyek_kode"];
    $fotoobyekNAMA = $_POST["foto_obyek_nama"];
    $obyekKODE = $_POST["input_obyek_kode"];
    $fotoobyekKET = $_POST["foto_obyek_ket"];
    $fotoobyektanggal = $_POST["inputtanggal"];
    $nama = $_FILES['foto']['name']; 
    $file_tmp = $_FILES["foto"]["tmp_name"];
    move_uploaded_file($file_tmp, 'images/'.$nama); 
	mysqli_query($connection, "UPDATE fotoobyekwisata set fotoobyekKODE='$fotoobyekKODE',
								fotoobyekNAMA='$fotoobyekNAMA',obyekKODE='$obyekKODE',
								fotoobyekKET='$fotoobyekKET',fotoobyekTGLAMBIL='$fotoobyektanggal',
								fotoobyekGAMBAR='$nama' WHERE fotoobyekKODE='$fotoobyekKODE'"); 
     header("location: fotoobyekwisata.php");
     }
		$fotoKode = $_GET["editfotoobyek"];
		$edit = mysqli_query($connection, "SELECT * FROM fotoobyekwisata WHERE fotoobyekKODE = '$fotoKode'");
		$row_edit = mysqli_fetch_array($edit); 

		$query = mysqli_query($connection, "SELECT * FROM fotoobyekwisata");
		$query2 = mysqli_query($connection, "SELECT * FROM obyekwisata");
?>  


<?php include("adminmenu.php") ?>
<div class="templatemo-content-wrapper">
    <div class="templatemo-content entri-form">
      <div class="entri-form" style="margin-top: -15px";>  
       <h1><b>FOTO OBYEK WISATA</h1><br>
      </div>
      <div class="row">
          <div class="col-sm-12">
                <form method="POST" class="form-horizontal" enctype="multipart/form-data">
                  <div class="form-group form-group-lg">
                    <label class="col-sm-3 control-label" for="fotoobyekKODE">Foto Obyek Kode</label>
                    <div class="col-sm-6">
                      <input class="form-control" type="text" id="fotoobyekKODE" name="foto_obyek_kode" value="<?php echo $row_edit["fotoobyekKODE"]?>">
                    </div>
                  </div>

                    <div class="form-group form-group-lg">
                    <label class="col-sm-3 control-label" for="fotoobyekNAMA">Foto Obyek Nama</label>
                    <div class="col-sm-6">
                      <input class="form-control" type="text" id="fotoobyekNAMA" name="foto_obyek_nama" value="<?php echo $row_edit["fotoobyekNAMA"]?>">
                    </div>
                  </div>


                  <div class="form-group form-group-lg">
                    <label class="col-sm-3 control-label" for="obyekKODE">Daftar Obyek Wisata Kode</label>
                    <div class ="col-sm-6">
                      <select name ="input_obyek_kode" class="form-control">
                          <option value="wisata">Obyek Wisata</option>

                          <?php if(mysqli_num_rows($query2) > 0 ) : ?>
                            <?php while($row = mysqli_fetch_array($query2) ) : ?>
                                <option><?= $row["obyekKODE"] ?>
                                </option>
                                

                          <?php endwhile; ?>
                          <?php endif; ?> 
                      </select> 

                    </div>
                  </div>  

                    <div class="form-group form-group-lg">
                    <label class="col-sm-3 control-label" for="fotoobyekKET">Foto Obyek Keterangan</label>
                    <div class="col-sm-6">
                      <input class="form-control" type="text" id="fotoobyekKET" name="foto_obyek_ket" value="<?php echo $row_edit["fotoobyekKET"]?>">
                    </div>
                  </div>


                      <div class="form-group form-group-lg">
                        <label for="datepicker" class="col-sm-3 control-label">Foto Obyek Tanggal Ambil</label>
                        <div class="col-sm-6">
                        <input type="date" class="form-control" id="datepicker" name="inputtanggal" placeholder="yyyy-mm-dd">
                      </div>
                      </div>


                        <div class="form-group form-group-lg">
			<label class="col-sm-3 control-label" for="foto">Foto obyek wisata</label>
			<div class="col-sm-9">
			<input type="checkbox" name="ubahfoto" value="true"> Beri tanda centang (V) jika ingin mengubah foto <br>			
			  <input type="file" id="foto" name="foto">
			  <img src="images/<?php echo $row_edit['fotoobyekGAMBAR']?>" "width:200px;height:100px">
			  <p class="help-block">Field ini digunakan untuk mengambil file gambar/foto ICON berita</p>
			</div>
		  </div>
		</div>


                        <div class="col-sm-4" style="text-align: center;">
                      <input class="btn btn-lg btn-primary" type="submit" value="simpan" name="simpan">
                      <!-- tombol diperbesar dg -lg dan berwarna biru dengan -primary -->
                      <input class="btn btn-lg btn-info" type="reset" value="Batal"> <!-- tombol berwarna hijau langit -->
                      </div>
                </form>
          </div>
     </div>  
     <br>
     <br>

     <table class="table table-hover">
    <div class="etri-form"> 
     <h1 style="text-align: center;"><b>HASIL FOTO OBYEK WISATA</h1>
    </div>
  <!-- membuat judul -->
  <tr class="info">
        <th>NO</th>
        <th>KODE FOTO</th>
        <th>NAMA FOTO</th>
        <th>KODE OBYEK WISATA</th>
        <th>KETERANGAN FOTO</th>
        <th>TANGGAL AMBIL FOTO</th>
        <th>FOTO OBYEK WISATA</th>        
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
          <td><?php echo $row['fotoobyekKODE']; ?> </td>
          <td><?php echo $row['fotoobyekNAMA']; ?> </td>
          <td><?php echo $row['obyekKODE']; ?> </td>
          <td><?php echo $row['fotoobyekKET']; ?> </td>
          <td><?php echo $row['fotoobyekTGLAMBIL'];?></td>  
          <td>
            <?php if($row['fotoobyekGAMBAR']==""){ echo "<img src='images/noimage.jpg' width='88'/>";}else{?>
            <img src="images/<?php echo $row['fotoobyekGAMBAR'] ?>" width="88" class="img-responsive" />
            <?php }?>
          </td>
          <td>
						<a href="javascript:;"><i class="fa fa-pencil-square-o"></i>
						<a href="editfotoobyek.php?editfotoobyek=<?php echo $row["fotoobyekKODE"]?>">   Update</a> |
						<a href="javascript:;"><i class="fa fa-scissors"></i>
						<a href="deletfotoobyek.php?deletfotoobyek=<?php echo $row["fotoobyekKODE"]?>">   Delete</a> 
					</td>
        </tr>
        <?php $no++; ?> 
      <?php  } ?>
  <?php  } ?>
  </table>
    

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
