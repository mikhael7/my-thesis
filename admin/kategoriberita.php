<?php
include "includes/config.php";

if(isset($_POST["simpan"]))
{ 	$kategoriberitaKODE = $_POST['input_kode_berita'];
	$kategoriberitaNAMA = $_POST['input_nama_berita'];
	$kategoriberitaKET = $_POST['input_ket_berita'];

mysqli_query($connection, "INSERT INTO kategoriberita VALUES ('$kategoriberitaKODE', '$kategoriberitaNAMA', '$kategoriberitaKET')");
header("location:kategoriberita.php");
}
$query = mysqli_query($connection, "SELECT * FROM kategoriberita");
?>

<?php include("adminmenu.php") ?>

<head>
  <style>
    @import url('https://fonts.googleapis.com/css?family=Lato&display=swap');
    body {
  	  background-color : skyblue;
    }
  </style>
 <link href="css/bootstrap. min.css" rel="stylesheet">
</head>
<body>
<div class="col-sm-10">
<form method="POST">
  <div class="form-group row">
    <div>
      <h1 style="text-align:center; margin-bottom:20px;"><b>Kategori Berita</b></h1>
    </div>

    <label for="kategoriberitaKODE" class="col-sm-3 col-form-label">Kode Kategori Berita</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="kategoriberitaKODE" name="input_kode_berita" placeholder="Kode Kategori Berita">
    </div>
  </div>

<div class="form-group row">
    <label for="kategoriberitaNAMA" class="col-sm-3 col-form-label">Nama Berita</label>
    <div class="col-sm-9">
      <input type="text" class="form-control"   id="kategoriberitaNAMA" name="input_nama_berita" placeholder="Nama Berita">
    </div>
  </div>
  
<div class="form-group row">
    <label for="kategoriberitaKET" class="col-sm-3 col-form-label">Keterangan Berita</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="kategoriberitaKET" name="input_ket_berita" placeholder="Keterangan Berita">
    </div>
  </div>

<div class="form-group row">
 <div class="col-sm-3 col-form-label>
 </div>
 <div class="col-sm-9"> 
  <button type="submit" class="btn btn-primary" name="simpan" value="simpan">Simpan</button>
  <button type="reset" class="btn btn-secondary">Batal</button>
 </div>
</div>  
</form>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Nomor</th>
	    <th scope="col">Action</th>
      <th scope="col">Kode Kategori Berita</th>
      <th scope="col">Nama Berita</th>
      <th scope="col">Keterangan Berita</th>
    </tr>
  </thead>
  <tbody>
<?php if(mysqli_num_rows($query) > 0) {?>
   <?php $nomor = 1;
   while ($row = mysqli_fetch_array ($query)) { ?> 
      <tr>
      <td><?php echo $nomor; ?></td>
      <td>
			<a href="javascript:;"><i class="fa fa-pencil-square-o"></i>
			<a href="editkategoriberita.php?beritaubah=<?php echo $row["kategoriberitaKODE"]?>">   Update</a> |
			<a href="javascript:;"><i class="fa fa-pencil-square-o"></i>
			<a href="hapuskategoriberita.php?beritahapus=<?php echo $row["kategoriberitaKODE"]?>">   Delete</a>
	  </td>
      <td><a href="edit.php?id=<?php echo $row["kategoriberitaKODE"]?>">edit
      <td><?php echo $row["kategoriberitaKODE"]; ?></td>
      <td><?php echo $row["kategoriberitaNAMA"]; ?></td>
      <td><?php echo $row["kategoriberitaKET"]; ?></td>
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