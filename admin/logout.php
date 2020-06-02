<?php
session_start();
$_SESSION['admin_KODE'];
$_SESSION['admin_EMAIL'];

unset($_SESSION["admin_KODE"]);
unset($_SESSION["admin_EMAIL"]);

SESSION_UNSET();
SESSION_DESTROY();

header("location:index.php");
?>