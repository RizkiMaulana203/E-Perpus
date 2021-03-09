<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <?php
     // fungsinya untuk menerima inputan dari form login
     function input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    // fungsinya untuk mengecek username dan password ada atau tidak di tabel petugas
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      session_start();
      include "koneksi.php";
      $username = input($_POST["username"]);
      $password = input(md5($_POST["password"]));

      $query = "SELECT * from user where username='".$username."' and password='".$password."' limit 1";
      $hasil = mysqli_query ($kon,$query);
      $jumlah = mysqli_num_rows($hasil);

      if ($jumlah>0) {
        $row = mysqli_fetch_assoc($hasil);
        $_SESSION["id_user"]=$row["id_user"];
        $_SESSION["username"]=$row["username"];
        $_SESSION["nama_user"]=$row["nama_user"];
        $_SESSION["id_level"]=$row["id_level"];
    
    // fungsinya untuk meredirect user ke halaman sesuai dengan levelnya (memindahkan secara paksa user berdasarkan levelnya)
        if ($_SESSION["id_level"]=$row["id_level"]==1)
        {
          header("Location:admin/dashboard.php");
        } 
    
        
      }else {
        echo "<div>
        <strong>Error!</strong> Username dan password salah. 
        </div>";
      }

    }
  
  ?>
	<img class="wave" src="assets/img/wave.png">
	<div class="container">
		<div class="img">
			<img src="assets/img/bg.svg">
		</div>
		<div class="login-content">
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
				<img src="assets/img/avatar.svg">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="useername" name="username" class="input" >
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" name="password" class="input">
            	   </div>
            	</div>
            	<input type="submit" class="btn" value="Login">
              <a href="index.php">Kembali...</a>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>
