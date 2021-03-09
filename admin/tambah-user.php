<?php 
session_start();

require '../functions.php';




if(isset($_POST['submit'])) {

 if( user($_POST) > 0 ) {
        echo "<script>
        alert('data berhasil disimpan');
       document.location.href = 'user.php'
        </script>";
        echo "cek";

    } else {
        echo "<div class='alert alert-warning'>data gagal ditambah</div>";
    }
}

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
    <title>Tambah Data Inventaris!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <div class="container">

    <div class="card mt-5">
  <div class="card-header bg-dark text-white">
    <i><b>Form Input Data Buku</b></i>
  </div>
<div class="card-body">
  <form action="" method="post">
    <div>
      <label class="ml-2"><i><b>Nama</b></i></label>
      <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Buku" required>
        </div>
        <div>
        <label class="ml-2"><i><b>Username</b></i></label>
        <input type="text" name="username" id="username" class="form-control" placeholder="Masukan Nama username" required>
          </div>
           <div>
            <label class="ml-2"><i><b>Password</b></i></label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Masukan password" required>
           </div>
           <div>
            <label class="ml-2"><i><b>Alamat</b></i></label>
            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukan alamat" required>
           </div>
           <div>
            <label class="ml-2"><i><b>No Telepon</b></i></label>
            <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Masukan No Telepon" required>
           </div>
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
                <div class="mt-5">
                  <button type="submit" name="submit" class=" btn btn-info text"> Tambah</button>
                  <button type="reset" name="submit" class=" btn btn-danger"> Reset</button>
                  <a href="user.php" class="btn btn-success"><span class="fa fa-arrow-circle-left"></span> Kembali</a>
                </div>

        </form>
      </div>
    </div>


  </div>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>