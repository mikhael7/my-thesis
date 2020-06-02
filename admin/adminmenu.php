<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesona Jawa Tengah</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">	
	  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/menuvertical.css" rel="stylesheet" type="text/css">
</head>

<style>
  body {
	  background-color : skyblue;
  }
  @import url('https://fonts.googleapis.com/css?family=Lato&display=swap');
</style>

<body>
<div class="row affix-row">
<div class="col-sm-3 col-md-2 affix-sidebar">
<div class="sidebar-nav">
	<div class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <span class="visible-xs navbar-brand">Sidebar menu</span>
    </div>
    <div class="navbar-collapse collapse sidebar-navbar-collapse">
      <ul class="nav navbar-nav" id="sidenav01">
        <li>
          <a href="adminindex.php">
          <span class="glyphicon glyphicon-cloud" style="margin-right:5px;"></span> Home
          </a>
        </li>

        <li>
          <a href="#" data-toggle="collapse" data-target="#toggleDemo" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-envelope"></span> Obyek Wisata <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a href="kategoriwisata.php">Kategori Obyek</a></li>
              <li><a href="namaobyekwisata.php">Nama Obyek Wisata</a></li>
              <li><a href="fotoobyekwisata.php">Foto Obyek Wisata</a></li>
            </ul>
          </div>
        </li>

        <li>
          <a href="#" data-toggle="collapse" data-target="#toggleDemo2" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-envelope"></span> Berita <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo2" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a href="kategoriberita.php">Kategori Berita</a></li>
              <li><a href="detilberita.php">Detil Berita</a></li>
              <li><a href="event.php">Event</a></li>
            </ul>
          </div>
        </li>

        <li>
          <a href="#" data-toggle="collapse" data-target="#toggleDemo3" data-parent="#sidenav01" class="collapsed">
          <span class="glyphicon glyphicon-envelope"></span> Pemerintahan <span class="caret pull-right"></span>
          </a>
          <div class="collapse" id="toggleDemo3" style="height: 0px;">
            <ul class="nav nav-list">
              <li><a href="kecamatan.php">Kecamatan</a></li>
              <li><a href="Kabupaten.php">Input Kabupaten</a></li>
              <li><a href="kegiatan.php">Kegiatan</a></li>
            </ul>
          </div>
        </li>
        
        <li><a href="logout.php"><span class="glyphicon glyphicon-pencil"></span> Logout</a>
        </li>
      </ul>
    </div><!-- petnutup nav-collapse -->
  </div>
</div>
</div>

<div class="col-sm-9 col-md-10 affix-content">


