<!-- ADMIN index -->
<?php 
	include ("includes/config.php");
	include ("adminmenu.php");

	session_start();
	$_SESSION['admin_KODE'];
	$_SESSION['admin_EMAIL'];
	
	if(isset($_SESSION["admin_KODE"]) == null){
		echo "<script>alert('Kamu belum Login!');location.href='index.php';</script>";
	}
	else{
		echo "<script>alert('Selamat Datang Di Halaman ADMINSTRATOR');</script>";
	}
?>

<style>
body {
	background-color : skyblue;
}

.logo-admin {
	display: block;
	margin-left: auto;
	margin-right: auto;
	width: 40%;
}

@import url('https://fonts.googleapis.com/css?family=Lato&display=swap');
</style>

<body>	
	<div class="jumbotron" style="background-color:white;">
		<div style="background-color:#eee; margin-left:50px; margin-right:50px; height:100%;">
			<img class="logo-admin" src="../template/foto/logo.png"/>
			<h2 class="text-center"> <b>HALAMAN ADMINSTRATOR</b></h2> <br>
			<p class="text-justify" style="margin-left:50px; margin-right:50px;">
			Sejak abad VII, banyak terdapat pemerintahan kerajaan yang berdiri di Jawa Tengah 
			(Central Java), yaitu: Kerajaan Budha Kalingga, Jepara yang diperintah oleh Ratu Sima 
			pada tahun 674. Menurut naskah/prasasti Canggah tahun 732, kerajaan Hindu lahir di Medang 
			Kamulan, Jawa Tengah dengan nama Raja Sanjaya atau Rakai Mataram. Dibawah pemerintahan Rakai 
			Pikatan dari Dinasti Sanjaya, ia membangun Candi Rorojonggrang atau Candi Prambanan. Kerajaan 
			Mataram Budha yang juga lahir di Jawa Tengah selama era pemerintahan Dinasti Syailendra, mereka 
			membangun candi-candi seperi Candi Borobudur, Candi Sewu, Candi Kalasan dll.</p> <br>
			<p>
				
			</p>
		</div>
	</div>	<!-- Akhir dari Jumbotron -->
</body>
<?php include ("adminfooter.php") ?>