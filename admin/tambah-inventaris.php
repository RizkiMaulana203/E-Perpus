<?php 
session_start();

require '../functions.php';

$jenis = query("SELECT * FROM jenis");


if(isset($_POST['submit'])) {

 if( inven($_POST) > 0 ) {
        echo "<script>
        alert('data berhasil disimpan');
       document.location.href = 'inventaris.php'
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
        <label class="ml-2"><i><b>Penulis</b></i></label>
        <input type="text" name="penulis" id="penulis" class="form-control" placeholder="Masukan Nama Penulis" required>
          </div>
        <div>
          <label class="ml-2"><i><b>Kondisi</b></i></label>
        <select name="kondisi" class="form-control" id="kondisi">
          <option value="">Pilih Kondisi</option>
          <option value="ongoing">On Going</option>
          <option value="tamat">Tamat</option>
        </select>
        </div>
          <div>
            <label class="ml-2"><i><b>Keterangan</b></i></label>
           <textarea name="keterangan" class="form-control" id="keterangan" placeholder="Tulis keterangan disini...." cols="30" rows="10" required></textarea>
          </div>
           <div>
            <label class="ml-2"><i><b>Jumlah</b></i></label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Masukan Jumlah Barang" required>
           </div>
              <div>
                <label class="ml-2"><i><b>Jenis</b></i></label>
                <select name="id_jenis" class="form-control" id="id_jenis">
                  <option value="">Pilih Jenis</option>
                    <?php
                    foreach($jenis as $jns) :
                    ?>
                  <option value="<?php print $jns['id_jenis'];?>" ><?php print $jns['nama_jenis']; ?></option>
                    <?php endforeach; ?>
                </select>
              </div>
              <div>
                <label class="ml-2"><i><b>Tanggal Rilis</b></i></label>
               <input type="date" name="tanggal_rilis" id="tanggal_rilis" class="form-control" placeholder="Tanggal Rilis" required>
              </div>
                  <div>
                    <label class="ml-2"><i><b>Kode Inventaris</b></i></label>
                    <input type="text" name="kode_inventaris" id="kode_inventaris" class="form-control" placeholder="Kode Inventaris" required>
                  </div>
                <div class="mt-5">
                  <button type="submit" name="submit" class=" btn btn-info text"> Tambah</button>
                  <button type="reset" name="submit" class=" btn btn-danger"> Reset</button>
                  <a href="inventaris.php" class="btn btn-success"><span class="fa fa-arrow-circle-left"></span> Kembali</a>
                </div>

        </form>
      </div>
    </div>


  </div>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>