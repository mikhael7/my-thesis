<?php
ob_start();
session_start();
if(isset($_SESSION["nama_admin"]))
	header("location:editfoto2.php");
include "includes/config.php";

/** ini digunakan untuk proses login **/
if(isset($_POST["submit"]))
{
	$namaemail = $_POST["nama_email"];
	$namapassword = $_POST["nama_password"];
	$login = mysqli_query($connection, "SELECT * FROM admin2 WHERE NAMAadmin = '$namaemail'
		AND PASSWORDadmin = '$namapassword'");
	$logins = mysqli_query($connection, "SELECT * FROM anggota WHERE anggotaEMAIL = '$namaemail'
		AND anggotaPASSWORD = '$namapassword'");
	
	if(mysqli_num_rows($login) > 0) {
	$row_admin = mysqli_fetch_array($login);
		$_SESSION['admin_KODE'] = $row_admin["IDadmin"];
		$_SESSION['admin_EMAIL'] = $row_admin["NAMAadmin"];
		header("location:adminindex.php");
	}
	else if (mysqli_num_rows($logins) > 0) {
	$row_admin = mysqli_fetch_array($login);
		header("location:editfoto.php");
	}
	else{
		echo "<script>alert('Login Gagal!');history.go(-1);</script>";
	}
	
}
?>

<style>
    body{
        background : url("images/bg-img.jpg") ;
        
        /* Control the height of the image */
        height : 50%;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    .logo-admin {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 80%;
    }
</style>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link href="css/csslogin.css" rel="stylesheet">
<!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
<head>
    <title>Log in Administrator</title>
</head>
<body>    
    <div class="bg-img">
        <div class="card card-container">
            <img class="logo-admin"  src="../template/foto/logo.png"/>
            <p id="profile-name" class="profile-name-card">Log in Administrator</p> <br>
            <form class="form-signin" action="index.php" method="POST">
                <span id="reauth-email" class="reauth-email"></span>
                <input name="nama_email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <input name="nama_password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" name="submit" type="submit">Sign in</button>
                <a href="../template/index.php" class="btn btn-primary btn-block" role="button" type="button">Back to main page</a>
            </form><!-- /form -->
            <?php
            mysqli_close($connection);
            ob_end_flush();
            ?>
            <div class="footer-copyright text-center py-3">
                <p>Copyright &copy; 2019 by Mikhael</p>
            </div>
        </div><!-- /card-container -->
    </div><!-- /container -->
</body>
    