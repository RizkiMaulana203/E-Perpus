<?php 
session_start();

require '../functions.php';

$inventaris = query("SELECT * FROM inventaris WHERE id_jenis = 5");
$user = query("SELECT * FROM user");


if(isset($_POST['submit'])) {

 if( pinjam($_POST) > 0 ) {
  echo "<script>
  alert('buku berhasil disimpan');
 document.location.href = 'peminjaman.php';
  </script>";
  echo "cek";

} else {
  echo "<div class='alert alert-warning'>buku gagal ditambah</div>";
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
    <i><b>Form Input Pinjam Buku</b></i>
  </div>
<div class="card-body">
  <form action="" method="post">
    <div>
      <label class="ml-2"><i><b>Pilih Buku</b></i></label>
        <select name="id_inventaris" class="form-control" id="id_inventaris">
           <option value="">Pilih Buku</option>
            <?php
            foreach($inventaris as $inven) :
                    ?>
            <option value="<?php print $inven['id_inventaris'];?>" ><?php print $inven['nama']; ?></option>
            <?php endforeach; ?>
          </select>
       </div>
      <div>
        <label class="ml-2"><i><b>Tanggal Pinjam</b></i></label>
        <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" placeholder="Masukan  Tanggal Pinjam" required>
          </div>
        <div>
          <label class="ml-2"><i><b>Status Peminjaman</b></i></label>
        <select name="status_peminjaman" class="form-control" id="status_peminjaman">
          <option value="">Pilih Kondisi</option>
          <option value="sudah dikembalikan">Sudah Dikembalikan</option>
          <option value="belum dikembalikan">Belum Dikembalikan</option>
        </select>
        </div>
             <div>
              <label class="ml-2"><i><b>Pilih User</b></i></label>
                <select name="id_user" class="form-control" id="id_user">
                   <option value="">Pilih User</option>
                    <?php
                    foreach($user as $us) :
                            ?>
                    <option value="<?php print $us['id_user'];?>" ><?php print $us['nama_user']; ?></option>
                    <?php endforeach; ?>
                  </select>
               </div>
              <div>
                <label class="ml-2"><i><b>Jumlah</b></i></label>
                <input type="text" name="jumlah" id="jumlah" class="form-control" placeholder="Masukan Jumlah Pinjaman" required>
                  </div>
                <div class="mt-5">
                  <button type="submit" name="submit" class=" btn btn-info text"> Tambah</button>
                  <button type="reset" name="submit" class=" btn btn-danger"> Reset</button>
                  <a href="peminjaman.php" class="btn btn-success"><span class="fa fa-arrow-circle-left"></span> Kembali</a>
                </div>

        </form>
      </div>
    </div>


  </div>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>