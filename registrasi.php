  <?php
    require 'functions.php';
    $level = query("SELECT * FROM level");

    if (isset($_POST["register"]) ) {
      
      if( registrasi($_POST) > 0 ) {
        echo "<script>
                alert('Selamat Anda Berhasil Mendaftar!');
                document.location.href = 'login-member.php'
              </script>";
      } else {
         echo mysqli_error($kon);
      }
    }
  
  ?>





<!DOCTYPE html>
<html>
<head>
  <title>Sign Up Form</title>
  <link rel="stylesheet" type="text/css" href="assets/css/login2.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <img class="wave" src="assets/img/wave1.png">
  <div class="container">
    <div class="img">
      <img src="assets/img/bg2.svg">
    </div>
    <div class="login-content">
      <form action="" method="post">
        <img src="assets/img/avatar1.svg">
        <h2 class="title">Sign Up</h2>
        <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-user"></i>
                 </div>
                 <div class="div">
                    <h5>Nama</h5>
                    <input type="text" name="nama" id="nama" class="input" >
                 </div>
              </div>
              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-user"></i>
                 </div>
                 <div class="div">
                    <h5>Username</h5>
                    <input type="text" name="username" id="username" class="input" >
                 </div>
              </div>
              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-lock"></i>
                 </div>
                 <div class="div">
                    <h5>Password</h5>
                    <input type="password" name="password" id="password" class="input" >
                 </div>
              </div>
              <div class="input-div pass">
                 <div class="i"> 
                    <i class="fas fa-lock"></i>
                 </div>
                 <div class="div">
                    <h5>Konfirmasi Password</h5>
                    <input type="password" name="password2" id="password2" class="input">
                 </div>
              </div>
              <div class="input-div pass">
                 <div class="i"> 
                    <i class="fas fa-user"></i>
                 </div>
                 <div class="div">
                    <h5>Alamat</h5>
                    <input type="text" name="alamat" id="alamat" class="input">
                 </div>
              </div><br>
              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-user"></i>
                 </div>
                 <div class="div">
                    <h5>No.Telp</h5>
                    <input type="text" name="telepon" id="telepon" class="input" >
                 </div>
              </div>
              <div class="" style=" margin-top: 20px;">
                 <div class="i"> 
                    <i class=""></i>
                 </div>
                 <div class="div">
                 <input type="hidden" name="id_level" value="2">
                 </div>
              </div>
              
              <input type="submit" class="btn" value="register" name="register">
              <input type="reset" class="btn" value="reset" name="reset">
              <a href="index.php">Kembali...</a>
              </form>
        </div>
    </div>
    <script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>
