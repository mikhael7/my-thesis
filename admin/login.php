<?php
ob_start();
session_start();
if(isset($_SESSION["admin_EMAIL"]));

include "includes/config.php";

/** ini digunakan untuk proses login **/
if(isset($_POST["submit"]))
{
 $namaemail = $_POST["nama_email"];
 $namapassword = $_POST["nama_password"];
 $login = mysqli_query($connection, "SELECT * FROM admin2 WHERE NAMAadmin = '$namaemail'
  AND PASSWORDadmin = '$namapassword'");
 
 if(mysqli_num_rows($login) > 0)
 {
  $row_admin = mysqli_fetch_array($login);
  $_SESSION['admin_KODE'] = $row_admin["IDadmin"];
  $_SESSION['admin_EMAIL'] = $row_admin["NAMAadmin"];
 }
 
}
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log in Administrator</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link href="css/csslogin.css" rel="Stylesheet">

<!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
    <div class="container">
        
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <!-- <img id="profile-img" class="profile-img-card" src="images/Eve.jpg" /> -->
            <span>
                <h1 id="profile-name" class="profile-name-card">
                    <b>Log in Administrator</b>
                    <img src="" alt="">
                </h1>
                <br>
            </span>
            <form class="form-signin" action="login.php" method="POST">
                <div class="">
                    <input name="nama_email" type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
                    <span id="reauth" class="reauth"></span>
                </div>
                <div>
                    <input name="nama_password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                    <span id="reauth" class="reauth"></span>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" name="submit" type="submit">Sign in</button>
            </form><!-- /form -->
            <a href="#" class="text-center forgot-password">
                Forgot password?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
<?php
mysqli_close($connection);
ob_end_flush();
?>