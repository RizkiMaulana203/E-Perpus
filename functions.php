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
//menampilkan data 
function query($query) {
    global $kon;
    $result = mysqli_query($kon,$query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
//function tambah data

function user($user) {
    global $kon;

    $nama_user = htmlspecialchars($user['nama']); 
    $username = strtolower(stripslashes($user["username"]));
    $password = mysqli_real_escape_string($kon, $user["password"]);
    $alamat = htmlspecialchars($user['alamat']);
    $telepon = htmlspecialchars($user['telepon']); 
    $id_level =  $user['id_level'];



        //enkripsi password
        $password = md5($password);


        // tambahkan user baru kedatabase
     mysqli_query($kon, "INSERT INTO user VALUES('', '$nama_user', '$username', '$password', '$alamat', '$telepon', '$id_level')");

      return mysqli_affected_rows($kon);

}

function inven($inven) {
    global $kon;

    $nama = htmlspecialchars($inven['nama']); 
    $penulis = $inven['penulis'];
    $kondisi = $inven['kondisi'];
    $keterangan =  htmlspecialchars($inven['keterangan']);
    $jumlah = htmlspecialchars($inven['jumlah']);
    $id_jenis = $inven['id_jenis'];
    $tanggal_rilis = $inven['tanggal_rilis'];
    $kode_inventaris = htmlspecialchars($inven['kode_inventaris']);
    
    $query = "INSERT INTO inventaris VALUES(NULL,'$nama','$penulis','$kondisi','$keterangan','$jumlah','$id_jenis','$tanggal_rilis','$kode_inventaris')";
    
    mysqli_query($kon, $query);

return mysqli_affected_rows($kon);
}

function pinjam($pinjam) {
    global $kon;
    
    $id_inventaris = $pinjam['id_inventaris'];
    $tanggal_pinjam = $pinjam['tanggal_pinjam']; 
    $status_peminjaman = $pinjam['status_peminjaman'];
    $id_user = $pinjam['id_user'];
    $jumlah = htmlspecialchars($pinjam['jumlah']);
    
    $query = "INSERT INTO peminjaman VALUES(NULL,'$id_inventaris','$tanggal_pinjam','$status_peminjaman','$id_user','$jumlah')";
    
    mysqli_query($kon, $query);

return mysqli_affected_rows($kon);
}


//akhir function tambah



//function edit
 
function editus($us) {
    global $kon;

    $id = $us["id_user"];
    $nama_user = htmlspecialchars($us['nama_user']);
    $username = htmlspecialchars($us['username']);
    $password = htmlspecialchars($us['password']);
    $alamat =  htmlspecialchars($us['alamat']);
    $telepon =  htmlspecialchars($us['telepon']);
    $id_level =  $us['id_level'];

    $query = "UPDATE user SET
                nama_user = '$nama_user',
                username = '$username',
                password = '$password',
                alamat = '$alamat',
                telepon = '$telepon',
                id_level = '$id_level'
                WHERE id_user = $id
    ";

mysqli_query($kon,$query);

return mysqli_affected_rows($kon);
}

function editinv($change) {
    global $kon;

    $id = $change['id_inventaris'];
    $nama = htmlspecialchars($change['nama']); 
    $penulis = htmlspecialchars($change['penulis']); 
    $kondisi = $change['kondisi'];
    $keterangan =  htmlspecialchars($change['keterangan']);
    $jumlah = htmlspecialchars($change['jumlah']);
    $kode = htmlspecialchars($change['kode_inventaris']);


   $query = "UPDATE inventaris SET
               nama = '$nama',
               penulis = '$penulis',
                kondisi = '$kondisi',
                Keterangan = '$keterangan',
                jumlah = '$jumlah',
               kode_inventaris = '$kode'
               WHERE id_inventaris = $id
    ";

mysqli_query($kon,$query);

return mysqli_affected_rows($kon);
}



function editpinjam($ubah) {
    global $kon;

    $id = $ubah["id_peminjaman"];
    $id_inventaris = $ubah['id_inventaris'];
    $tanggal_pinjam = $ubah['tanggal_pinjam']; 
    $status_peminjaman = $ubah['status_peminjaman'];
    $id_user = $ubah['id_user'];
    $jumlah = htmlspecialchars($ubah['jumlah']);
    


   $query = "UPDATE peminjaman SET
               id_inventaris = '$id_inventaris',
               tanggal_pinjam = '$tanggal_pinjam',
                status_peminjaman = '$status_peminjaman',
                id_user = '$id_user',
                Jumlah = '$jumlah'
               WHERE id_inventaris = $id
    ";
var_dump($ubah);
mysqli_query($kon,$query);

return mysqli_affected_rows($kon);
}
//akhir function edit

//function hapus




function hapususer($id) {
    global $kon;
    mysqli_query($kon, "DELETE FROM user WHERE id_user = $id");
    
    return mysqli_affected_rows($kon);
}



function hapusinv($id) {
    global $kon;
    mysqli_query($kon, "DELETE FROM inventaris WHERE id_inventaris = $id");
    
    return mysqli_affected_rows($kon);
}

function hapuspinjam($id) {
    global $kon;
    mysqli_query($kon, "DELETE FROM peminjaman WHERE id_peminjaman = $id");
    
    return mysqli_affected_rows($kon);
}


function kembali($id) {
    global $kon;
    mysqli_query($kon, "DELETE FROM detail_pinjam WHERE id_detail_pinjam = $id");

    return mysqli_affected_rows($kon);
}


function registrasi($data) {
    global $kon;

    $nama_user = htmlspecialchars($data['nama']); 
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($kon, $data["password"]);
    $password2 = mysqli_real_escape_string($kon, $data["password2"]);
    $alamat = htmlspecialchars($data['alamat']); 
    $telepon = htmlspecialchars($data['telepon']);
     $id_level =  $data['id_level'];


    // cek konfirmasi password
    if ( $password !== $password2 ) {
           echo "<script>
                alert('konfirmasi password tidak sesuai!');
              </script>";

            return false;
        }   


        //enkripsi password
        $password = md5($password);


        // tambahkan user baru kedatabase
     mysqli_query($kon, "INSERT INTO user VALUES('', '$nama_user', '$username', '$password', '$alamat','$telepon', '$id_level')");

      return mysqli_affected_rows($kon);

}


?>      