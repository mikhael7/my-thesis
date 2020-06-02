<?php
	include "includes/config.php";
	$query = mysqli_query($connection, "SELECT * FROM editfoto");
?>

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
	</table>
</body>
</html>