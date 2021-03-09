<?php 
//jalankan session
session_start();
//koneksi ke function
require '../functions.php';

$id = $_GET['id'];


$us = query("SELECT a.*, b.* FROM user a INNER JOIN level b ON a.id_level=b.id_level  WHERE id_user = $id")[0];
$level = query("SELECT * FROM level");

//kirim data ke function
if(isset($_POST['submit'])) {
 

 if( editus($_POST) > 0 ) {
        echo "<script>
        alert('data berhasil diubah');
        document.location.href = 'user.php'
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
    <title></title>
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
    <input type="hidden" name="id_user" value="<?= $us['id_user'];?>">
  <div class="form-group">
    <label class="ml-2"><i><b>Nama</b></i></label>
      <input type="text" name="nama_user" id="nama_user" class="form-control" value="<?= $us['nama_user']; ?>">
    </div>
    <div class="form-group">
    <label class="ml-2"><i><b>Nama</b></i></label>
      <input type="text" name="username" id="username" class="form-control" value="<?= $us['username']; ?>">
    </div>
    <div class="form-group">
    <label class="ml-2"><i><b>Nama</b></i></label>
      <input type="text" name="password" id="password" class="form-control" value="<?= $us['password']; ?>">
    </div>
    <div class="form-group">
        <label class="ml-2"><i><b>Alamat</b></i></label>
      <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $us['alamat']; ?>" >
    </div>
    <div class="form-group">
        <label class="ml-2"><i><b>no Telepon</b></i></label>
      <input type="text" name="telepon" id="telepon" class="form-control" value="<?= $us['telepon']; ?>" >
    </div>
<div class="form-group">
    <div>
      <label class="ml-2"><i><b>Level</b></i></label>
        <?php
        $query = mysqli_query($kon, "SELECT id_level, nama_level FROM level");
        ?>
        <select name="id_level" class="form-control" id="id_level">
          <?php while($d = mysqli_fetch_assoc($query)) : ?>
            <option value="<?= $d['id_level'] ?>"><?= $d['nama_level'] ?></option>
          <?php endwhile; ?>
        </select>
    </div>
</div>
    <button type="submit" class="btn btn-primary" onclick="return confirm('Data akan diubah,yakin?');" name="submit"><span class="fa fa-floppy-o"></span> Ubah</button>
    <a href="user.php" class="btn btn-danger"><span class="fa fa-arrow-circle-left"></span> Kembali</a>
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