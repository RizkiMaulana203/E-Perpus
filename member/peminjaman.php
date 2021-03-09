<?php
session_start();

include "../koneksi.php";

if (!isset($_SESSION["username"])) {
  echo "<script>window.location.href='../index.php';</script>";
  exit;
}

$level=$_SESSION["id_level"];

if ($level!=1) {
    echo "Anda tidak punya akses pada halaman ";
    exit;
}


?>

<script>
function printDiv(cetak) {
    var printContents = document.getElementById(cetak).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();
    document.body.innerHTML = originalContents
}

</script>

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
                <a class="navbar-brand" href="#"><span>オンライン</span>ライブラリ</a>
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
                <li class="active">Peminjaman</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>
            </div>
        </div><!--/.row-->
        
        <!-- isi-->
        <div class="col-md-10 pt-5 p-5">
        <h2><i><b>Peminjaman</b></i></h2><hr>

          <a onclick="printDiv('cetak')" class="btn btn-success mb-3" style="margin-bottom: 20px;" target="blank"><i class="fa fa-print mr-3"></i>Cetak Laporan</a>
<div id="cetak">
        <table  class="table table-striped table-bordered text-center">
  <thead >
    <tr class="text-center">
      <th scope="col">No</th>
      <th scope="col" class="text-center">Nama Buku</th>
      <th scope="col" class="text-center">Tanggal Pinjam</th>
      <th scope="col" class="text-center">Status Peminjaman</th>
      <th scope="col" class="text-center">Jumlah</th>
      <th scope="col" class="text-center">Peminjam</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    include '../koneksi.php';
    $no = 1;
    $no = 1;
    $batas = 10;
    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;    
 
    $previous = $halaman - 1;
    $next = $halaman + 1;
                
    $data = mysqli_query($kon,"SELECT * from peminjaman INNER JOIN inventaris ON peminjaman.id_inventaris = inventaris.id_inventaris
                                                             INNER JOIN user ON peminjaman.id_user = user.id_user");
    $jumlah_data = mysqli_num_rows($data);
    $total_halaman = ceil($jumlah_data / $batas);
 
    $data_user = mysqli_query($kon,"SELECT * from peminjaman INNER JOIN inventaris ON peminjaman.id_inventaris = inventaris.id_inventaris
                                                             INNER JOIN user ON peminjaman.id_user = user.id_user limit $halaman_awal, $batas");
    $nomor = $halaman_awal+1;
    while($d = mysqli_fetch_array($data_user)){
   ?>
                    <tr>
                        <td scope="row"><?php echo $no++; ?></td>
                        <td><?php echo $d['nama']; ?></td>
                        <td><?php echo $d['tanggal_pinjam']; ?></td>
                        <td><?php echo $d['status_peminjaman']; ?></td>
                        <td><?php echo $d['Jumlah']; ?></td>
                        <td><?php echo $d['nama_user']; ?></td>
                    <?php
                }
                ?>
            </tr>
  </tbody>
</table>
</div>
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