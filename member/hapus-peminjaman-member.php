<?php 
//koneksi ke function
require "../functions.php";

$id = $_GET["id"];

//cek apakah ada perubahan jumlah data
if( hapuspinjam($id) > 0 ) {
    echo "<script>
    alert('buku berhasil dikembalikan');
    document.location.href = 'pengembalian-member.php'
    </script>";
} else {
    echo "<script>alert('buku gagal dikembalikan');
    document.location.href ='pengembalian-member.php';
    </script>
    ";
}
?>