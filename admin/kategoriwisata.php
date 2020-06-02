<?php
include "includes/config.php";

if(isset($_POST["simpan"]))
{ 
  $kategoriKODE = $_POST['input_kode_kategori'];
	$kategoriNAMA = $_POST['input_kategori_nama'];
	$kategoriKET = $_POST['input_kategori_ket'];
	$kategoriREFERENCE = $_POST['input_kategori_ref'];

mysqli_query($connection, "INSERT INTO kategoriwisata VALUES ('$kategoriKODE', '$kategoriNAMA', '$kategoriKET', '$kategoriREFERENCE')");
header("location:kategoriwisata.php");
}
$query = mysqli_query($connection, "SELECT * FROM kategoriwisata");
?>

<?php include("adminmenu.php") ?>

<head>
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <style>
  @import url('https://fonts.googleapis.com/css?family=Lato&display=swap');
  </style>
</head>
  <body style="background-color : skyblue;">
  <div class="row">
    <h1 style="text-align:center;"><b>Kategori Wisata</b></h1>
  </div>

  <div class="col-sm-10" style=" margin-top: 30px;">
    <form method="POST">
      <div class="form-group row">
        <label for="kategoriKODE" class="col-sm-3 col-form-label">Kode Kategori Wisata</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="kategoriKODE" name="input_kode_kategori" placeholder="Kode Kategori Wisata">
        </div>
      </div>

      <div class="form-group row">
          <label for="kategoriNAMA" class="col-sm-3 col-form-label">Nama Kategori</label>
          <div class="col-sm-9">
            <input type="text" class="form-control"  id="kategoriNAMA" name="input_kategori_nama" placeholder="Nama Kategori Wisata">
          </div>
      </div>
      
      <div class="form-group row">
          <label for="kategoriKET" class="col-sm-3 col-form-label">Keterangan Kategori</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="kategoriKET" name="input_kategori_ket" placeholder="Keterangan Kategori Wisata">
          </div>
      </div>
      
      <div class="form-group row">
          <label for="kategoriREFERENCE" class="col-sm-3 col-form-label">Referensi Kategori</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="kategoriREFERENCE" name="input_kategori_ref" placeholder="Referensi Kategori">
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

  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nomor</th>
        <th scope="col">Action</th>
        <th scope="col">Kode Kategori</th>
        <th scope="col">Nama Kategori</th>
        <th scope="col">Keterangan Kategori</th>
        <th scope="col">Referensi Kategori</th>
      </tr>
    </thead>
    <tbody class="thead-light">
    <?php if(mysqli_num_rows($query) > 0) {?>
      <?php $nomor = 1;
      while ($row = mysqli_fetch_array ($query)) { ?> 
          <tr>
          <td><?php echo $nomor; ?></td>
          <td>
						<a href="javascript:;"><i class="fa fa-pencil-square-o"></i>
						<a href="editkategoriwisata.php?kategoriubah=<?php echo $row["kategoriKODE"]?>">   Update</a> |
						<a href="javascript:;"><i class="fa fa-scissors"></i>
						<a href="hapuskategoriwisata.php?kategorihapus=<?php echo $row["kategoriKODE"]?>">   Delete</a>
					</td>
          <td><?php echo $row["kategoriKODE"]; ?></td>
          <td><?php echo $row["kategoriNAMA"]; ?></td>
          <td><?php echo $row["kategoriKET"]; ?></td>
          <td><?php echo $row["kategoriREFERENCE"]; ?></td>
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