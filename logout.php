<?php
//jalankan session
session_start();

$_SESSION['id_user']='';
$_SESSION['username']='';
$_SESSION['nama_petugas']='';
$_SESSION['id_level']='';

unset($_SESSION['id_user']);
unset($_SESSION['username']);
unset($_SESSION['nama_petugas']);
unset($_SESSION['id_level']);

session_unset();
session_destroy();
header('Location:index.php');

?>