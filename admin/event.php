<!doctype.htlm>
<?php
include "includes/config.php";

/** Mengecek apakah tombol simpan sudah di pilih/klik atau belum **/
     if(isset($_POST['Simpan'])) {	
		 $id = $_POST['eventid'];	
		 $title = $_POST['eventtitle'];
         $desc = $_POST['eventdesc'];
         
		 $nama = $_FILES['file']['name']; /** untuk menampung data foto atau gambar **/ 
		 $file_tmp = $_FILES["file"]["tmp_name"];
 		 move_uploaded_file($file_tmp, 'eventimage/'.$nama); /** untuk upload file gambarnya **/
		
/** Memasukkan data fullname ke dalam tabel kabupaten**/
     mysqli_query($connection, "INSERT INTO tableevent VALUES ('$id','$title','$desc','$nama')"); 
     header("location:event.php");
     }

	$query = mysqli_query($connection, "SELECT * FROM tableevent");
?>	


<?php 
    include("adminmenu.php") 
?>

<style>
    @import url('https://fonts.googleapis.com/css?family=Lato&display=swap');
    label{
        font-size : 14px;
        margin-left: 50px;
        margin-right: 50px;        
    }

    .row-input {
        background-color: #eee;
    }
</style>

<div class="templatemo-content-wrapper">
<div class="templatemo-content entri-form">
    <div class="row row-input">
        <div class="etri-form" style="text-align:center; margin-top:50px;";>	
            <h1><b>EVENT</h1><br>
        </div>
        <div class="col-sm-12">
            <form method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group form-group-lg">
                    <label class="control-label" for="eventid">Event ID</label>
                        <input class="form-control" type="text" id="eventid" name="eventid" placeholder="event id" style="width:1000px; margin-left: 50px; margin-right: 50px;">
                </div>

                <div class="form-group form-group-lg">
                    <label class="control-label" for="eventtitle">Event Title</label>
                        <input class="form-control" type="text" id="eventtitle" name="eventtitle" placeholder="event title" style="width:1000px; margin-left: 50px; margin-right: 50px;">
                </div>

                <div class="form-group form-group-lg">
                    <label class="control-label" for="eventdesc">Event Description</label>
                        <textarea class="form-control" name="eventdesc" rows="10" cols="30" id="eventdesc" name="eventdesc" placeholder="event desc" style="width:1000px; margin-left: 50px; margin-right: 50px;"></textarea>
                </div>

                <div class="form-group form-group-lg">
                    <label class="control-label">Upload file foto/gambar</label>
                        <input type="file" id="file" name="file" style="margin-left: 50px; margin-right: 50px;">
                        <p class="help-block" style="margin-left: 50px; margin-right: 50px;">Upload file foto/gambar</p>	
                </div>

                <div  style="margin-left: 30px; margin-right: 50px;">
                    <input class="btn btn-lg btn-primary" type="submit" value="Simpan" name="Simpan">
                    <!-- tombol diperbesar dg -lg dan berwarna biru dengan -primary -->
                    <input class="btn btn-lg btn-info" type="reset" value="Batal"> <!-- tombol berwarna hijau langit -->
                </div>
            </form>
        </div>
    </div>

	<div class="row">		
        <table class="table table-hover">
            <div class="etri-form">	
                <h1 style="text-align:center;"><b>Hasil Event</h1>
            </div>
        
            <!-- membuat judul -->
        <thead>
        <tr class="info">
            <th>NO</th>
            <th>Event ID</th>
            <th>Event Title</th>
            <th>Event Description</th>
            <th>Event Image</th>
        </tr>
        </thead>
        <tbody>
        <?php
            /** Memeriksa apakah data yang dipanggil tersebut tersedia atau tidak **/
            if(mysqli_num_rows($query)>0) {
            $no=1;
            while ($row = mysqli_fetch_array($query)) 
                { ?>
                    <tr class="danger" height="20px">
                        <td><?php echo $no; ?></td>
                        <td>
                            <a href="javascript:;"><i class="fa fa-pencil-square-o"></i>
                            <a href="editevent.php?ubahevent=<?php echo $row["eventid"]?>">   Update</a> |
                            <a href="javascript:;"><i class="fa fa-scissors"></i>
                            <a href="hapusevent.php?eventhapus=<?php echo $row["eventid"]?>">   Delete</a> 
                        </td>  
                        <td><?php echo $row['eventid']; ?> </td>
                        <td><?php echo $row['eventtitle']; ?> </td>
                        <td><?php echo substr($row['eventdesc'], 0, 200); ?> </td>
                        <td>
                            <?php if($row['eventimg']==""){ echo "<img src='images/noimage.png' width='100'/>";}else{?>
                            <img src="eventimage/<?php echo $row['eventimg'] ?>" width="100" class="img-responsive" />
                            <?php }?>
                        </td>                        
                    </tr>
                    <?php $no++; ?> 
                <?php  } ?>
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

  <script type="text/javascript" src="scriptdate.js"></script>

<?php include ("adminfooter.php") ?>