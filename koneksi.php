<?php
$host="localhost";
$user="root";
$password="";
$db="kelompok-4";
//koneksi ke database
$kon = mysqli_connect($host,$user,$password,$db);
if (!$kon){
	  die("Koneksi gagal:".mysqli_connect_error());
}
?>