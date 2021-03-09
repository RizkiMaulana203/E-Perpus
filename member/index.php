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

<style>
    
    .h4 {
        font: bold;
        font-family: arial;
        font-weight: bold;
    }
</style>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Onrain Raiburari</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/datepicker3.css" rel="stylesheet">
    <link href="../member/style.css" rel="stylesheet">
    
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
                <a class="navbar-brand" href="#"><span>Onrain</span>Raiburari</a>
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
    </div><!--/.sidebar-->
        
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Dashboard</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
                <br>
                 <h2>PERSYARATAN</h2>
                 <br>
                 <h4>1.Harus Bagian Dari Sekolah YAJ</h4>
                 <h4>2.Batas Waktu Peminjaman 20 Hari Bila Lewat Dari 20 Hari 1 Hari Denda 50.000Rp</h4>
                 <h4>3.Jika Menghilangkan Buku Harus Membayar Denda yang Telah di Tentukan Oleh Pihak Perpustakaan</h4>
                 <h4>4.Wajib Memberikan Potho Copy Kertu Pelajar</h4>
                 <br/>
                </br>
            </div>
        </div><!--/.row-->
        

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