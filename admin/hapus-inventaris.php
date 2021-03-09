<?php 
//koneksi ke function
require "../functions.php";

$id = $_GET["id"];

//cek apakah ada perubahan jumlah data
if( hapusinv($id) > 0 ) {
    echo "<script>
    alert('data berhasil dihapus');
    document.location.href = 'inventaris.php'
    </script>";
} else {
    echo "<script>alert('data gagal dihapus');
    document.location.href ='inventaris.php';
    </script>
    ";
}
?>