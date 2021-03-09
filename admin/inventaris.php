<?php
session_start();

include "../koneksi.php";

if (!isset($_SESSION["username"])) {
  echo "Anda harus login dulu <br><a href='../index.php'>Klik disini</a>";
  exit;
}

$level=$_SESSION["id_level"];

if ($level!=1) {
    echo "Anda tidak punya akses pada halaman ";
    exit;
}


?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Onrain Raiburari</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/datepicker3.css" rel="stylesheet">
    <link href="../assets/css/styles.css" rel="stylesheet">
    
    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                    <?php include 'brand.php'; ?>
                <ul class="nav navbar-top-links navbar-right">
                </ul>
            </div>
        </div><!-- /.container-fluid -->
    </nav>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">
            <div class="profile-userpic">
                <img src="../assets/css/eren.png" class="img-responsive" alt="">
            </div>
            <div class="clear"></div>
        </div>
        <div class="divider"></div>
        <ul class="nav menu">
            <?php include 'menu.php'; ?>
        </ul>
    </div>
    <!--/.sidebar-->
        
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="dashboard.php">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">inventaris</li>
            </ol>
        </div><!--/.row-->
        
        
        <!-- isi-->
        <div class="col-md-10 pt-5 p-5">
        <h2><i><b>Inventaris</b></i></h2><hr>

         <a href="tambah-inventaris.php" style="margin-bottom: 20px;" class="btn btn-info mb-3"><i class="fa fa-book mr-3"></i>Tambah Data Buku</a>
        <table class="table table-striped table-bordered text-center">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col" class="text-center">Nama Buku</th>
      <th scope="col" class="text-center">Penulis</th>
      <th scope="col" class="text-center">Kondisi</th>
      <th scope="col"class="text-center">keterangan</th>
      <th scope="col"class="text-center">jumlah</th>
      <th scope="col"class="text-center">jenis</th>
      <th scope="col"class="text-center">tanggal Rilis</th>
      <th scope="col" class="text-center">kode Inventaris</th>
      <!-- <th scope="col" class="text-center">link</th> -->
      
      <th colspan="5" scope="col" class="text-center">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    include '../koneksi.php';
    $no = 1;
    $batas = 8;
    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;    
 
    $previous = $halaman - 1;
    $next = $halaman + 1;
                
    $data = mysqli_query($kon,"SELECT * from inventaris INNER JOIN jenis ON inventaris.id_jenis = jenis.id_jenis");
    $jumlah_data = mysqli_num_rows($data);
    $total_halaman = ceil($jumlah_data / $batas);
 
    $data_user = mysqli_query($kon,"SELECT * from inventaris INNER JOIN jenis ON inventaris.id_jenis = jenis.id_jenis limit $halaman_awal, $batas");
    $nomor = $halaman_awal+1;
    while($d = mysqli_fetch_array($data_user)){
   ?>
                    <tr>
                        <td scope="row"><?php echo $no++; ?></td>
                        <td><?php echo $d['nama']; ?></td>
                        <td><?php echo $d['penulis']; ?></td>
                        <td><?php echo $d['kondisi']; ?></td>
                        <td><?php echo $d['keterangan']; ?></td>
                        <td><?php echo $d['jumlah']; ?></td>
                        <td><?php echo $d['nama_jenis']; ?></td>
                        <td><?php echo $d['tanggal_rilis']; ?></td>
                        <td><?php echo $d['kode_inventaris']; ?></td>
                       
                        <td class="text-center">
                            <a href="edit-inventaris.php?id=<?= $d['id_inventaris']; ?>" class="fa fa-xl fa-edit color-teal p-2 text-white rounded" data-toggle="tooltip" title="Edit"></a>
                        </td>
                        <td class="text-center">
                            <a href="hapus-inventaris.php?id=<?= $d['id_inventaris']; ?>" class="fa fa-xl fa-trash color-red p-2 text-white rounded" data-toggle="tooltip" title="Hapus"></a> </td>
                    </tr>
                    
                    <?php
                }
                ?>
  </tbody>
</table>
     <nav>
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
                </li>
                <?php 
                for($x=1;$x<=$total_halaman;$x++){
                    ?> 
                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                    <?php
                }
                ?>              
                <li class="page-item">
                    <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
  </tbody>
</table>

    </div>
</div>


        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    
                    
                </div>
            </div>
        </div><!--/.row-->
        
        
        
        </div><!--/.row-->
    </div>  <!--/.main-->
    
    <script src="../assets/js/jquery-1.11.1.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/bootstrap-datepicker.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script>
        window.onload = function () {
    var chart1 = document.getElementById("line-chart").getContext("2d");
    window.myLine = new Chart(chart1).Line(lineChartData, {
    responsive: true,
    scaleLineColor: "rgba(0,0,0,.2)",
    scaleGridLineColor: "rgba(0,0,0,.05)",
    scaleFontColor: "#c5c7cc"
    });
};
    </script>
        
</body>
</html>