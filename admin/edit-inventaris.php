<?php 
//jalankan session
session_start();
//koneksi ke function
require '../functions.php';

$id = $_GET['id'];


$change = query("SELECT a.*, b.* FROM inventaris a INNER JOIN jenis b ON a.id_jenis=b.id_jenis  WHERE id_inventaris = $id")[0];
$jenis = query("SELECT * FROM jenis");

//kirim data ke function
if(isset($_POST['submit'])) {
 

 if( editinv($_POST) > 0 ) {
        echo "<script>
        alert('data berhasil diubah');
        document.location.href = 'inventaris.php'
        </script>";
    } else {
        echo "<div class='alert alert-warning'>data gagal diubah</div>";
    }
}

//cek login
if (!isset($_SESSION["username"])) {
    header('Location:../index.php');;
  exit;
}

$level=$_SESSION["id_level"];

if ($level!=1) {
    echo "Anda tidak punya akses pada halaman admin";
    exit;
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Hello World!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <div class="container">

    <div class="card mt-5">
  <div class="card-header bg-dark text-white">
    <i><b>Form Edit Data</b></i>
  </div>
  <div class="card-body">
<form action="" method="post">
    <input type="hidden" name="id_inventaris" value="<?= $change['id_inventaris'];?>">
  <div class="form-group">
    <label class="ml-2"><i><b>Nama</b></i></label>
      <input type="text" name="nama" id="nama" class="form-control" value="<?= $change['nama']; ?>" placeholder="Nama barang..." >
    </div>
    <div class="form-group">
        <label class="ml-2"><i><b>Penulis</b></i></label>
      <input type="text" name="penulis" id="penulis" class="form-control" value="<?= $change['penulis']; ?>" placeholder="Nama barang..." >
    </div>
<div class="form-group">
    <label class="ml-2"><i><b>kondisi</b></i></label>
 <select name="kondisi" class="form-control" id="kondisi ">
   <option value=""><?= $change['kondisi']; ?></option>
   <option value="ongoing">On Going</option>
   <option value="tamat">Tamat</option>
   </select>
</div>
    <div class="form-group">
        <label class="ml-2"><i><b>Ketarangan</b></i></label>
     <textarea name="keterangan" class="form-control" id="keterangan" placeholder="Tulis keterangan disini...." cols="30" rows="10" ><?= $change['keterangan'];?></textarea>
    </div>
<div class="form-group">
    <label class="ml-2"><i><b>Jumlah</b></i></label>
    <input type="number" value="<?= $change['jumlah']; ?>" name="jumlah" id="nama" class="form-control" placeholder="Jumlah Barang" >
</div>
<div class="form-group">
    <label class="ml-2"><i><b>Jenis</b></i></label>
 <select name="id_jenis" class="form-control" id="id_jenis ">
   <option value=""><?= $change['nama_jenis']; ?></option>
   <option value="edukatif">edukatif</option>
   <option value="manga">Manga</option>
   <option value="manhwa">Manhwa</option>
   </select>
</div>
   <div class="form-group">
    <label class="ml-2"><i><b>Kode Inventaris</b></i></label>
      <input type="text-area" value="<?= $change['kode_inventaris']; ?>" name="kode_inventaris" id="kode_inventaris" class="form-control" placeholder="Kode Inventaris" >
    </div>
    <button type="submit" class="btn btn-primary" onclick="return confirm('Data akan diubah,yakin?');" name="submit"><span class="fa fa-floppy-o"></span> Simpan</button>
    <a href="inventaris.php" class="btn btn-danger"><span class="fa fa-arrow-circle-left"></span> Kembali</a>
     <br>
    <p class="text-center"><?php ('Y') ?></p>
    <br>
 </form>                           
  </div>
</div>


</div>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>