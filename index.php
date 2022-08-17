<?php
require ('../config.php');
//inisialisasi session
session_start();
 
//mengecek username pada session
if( !isset($_SESSION['username']) ){
  $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
  header('Location: login.php');
  exit;
}
 $sql = 'SELECT * FROM produk';
 $query = mysqli_query($db, $sql);
 $products = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="../assets/css/bootstrap.min.css" crossorigin="anonymous">
 
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
      <div class="container">
        <a href="index.php" class="navbar-brand">Tokokita</a>
        <button class="navbar-toggler" type="button" data-togle="collapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav ms-auto ml-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a href="../crud/login.php" class="nav-link text-light">Admin</a>
            </li>
            <li class="nav-item ml-4">
                <a href="logout.php" class="nav-link text-light">Keluar</a>
            </li>
        </ul>
    </div>
</nav>
<div class="jumbotron jumbotron bg-light" style="height:90vh">
  <div class="container">
    <center><h2>SELAMAT DATANG DI TOKOKITA</h2></center>
   
  </div>
  <!-- sini-->
<div class="container">
 <div class="row">
  <?php foreach ($products as $product) : ?>
    <div class="col-md-3">
      <div class="card" style="width: auto;">
      <img src="../img/<?php echo $product['gambar_produk']?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo $product['nama_produk']?></h5>
        <p class="card-text"><?php echo $product['deskripsi']?></p>
        <a target="_blank" href="https://api.whatsapp.com/send/?phone=6282268895372&text=mau+pesan+<?php echo $product['nama_produk']?>&app_absent=0" class="btn btn-primary">Order Disini</a>
      </div>
      </div>
    </div>
  <?php endforeach; ?>
 </div>
</div>
<!-- sini-->
</div>


 <!-- Bootstrap requirement jQuery pada posisi pertama, kemudian Popper.js, dan  yang terakhit Bootstrap JS -->
 <script src="../assets/js/jquery.min.js"></script>
<script src="../assets/bootstrap.bundle.js" crossorigin="anonymous"></script>

</body>
</html>