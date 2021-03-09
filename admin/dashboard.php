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



$no = 0;
$data = mysqli_query($kon,"SELECT * from user WHERE id_user");
while($d = mysqli_fetch_array($data))

$id_user = mysqli_num_rows($data)



?>

<?php 

$no = 1;
$data1 = mysqli_query($kon,"SELECT * from peminjaman WHERE id_peminjaman");
while($d = mysqli_fetch_array($data1))

$id_peminjaman = mysqli_num_rows($data1)

?>

<?php 
$no = 2;
$data2 = mysqli_query($kon,"SELECT * from inventaris WHERE id_inventaris");
while($d = mysqli_fetch_array($data2))

$id_inventaris = mysqli_num_rows($data2)

?>

<?php 
$no = 3;
$data3 = mysqli_query($kon,"SELECT * from jenis WHERE id_jenis");
while($d = mysqli_fetch_array($data3))

$id_jenis = mysqli_num_rows($data3)

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
            </div>
        </div><!--/.row-->
        
        <div class="panel panel-container">
            <div class="row">
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-bookmark color-blue"></em>
                            <div class="large"><?php echo number_format($id_inventaris,0,",","."); ?></div>
                            <div class="text-muted">Inventaris</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-blue panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-user color-orange"></em>
                            <div class="large"><?php echo number_format($id_peminjaman,0,",","."); ?></div>
                            <div class="text-muted">Peminjam</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-orange panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
                            <div class="large"><?php echo number_format($id_user,0,",","."); ?></div>
                            <div class="text-muted">Users</div>
                        </div>
                    </div>
                </div>
              <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-orange panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-book color-red"></em>
                            <div class="large"><?php echo number_format($id_jenis,0,",","."); ?></div>
                            <div class="text-muted">Jenis Buku</div>
                        </div>
                    </div>
                </div>
            </div><!--/.row-->
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