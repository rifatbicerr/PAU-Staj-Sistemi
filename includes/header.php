<?php
session_start();
include("baglanti.php");
if (isset($_SESSION['user_id'])) {
  $query = "SELECT * FROM kullanicilar WHERE id = " . $_SESSION['user_id'];
  $query_run = mysqli_query($baglan, $query);
  if (mysqli_num_rows($query_run) > 0) {
    $_user = mysqli_fetch_assoc($query_run);
  } else {
    session_unset();
    session_destroy();
  }
}
include('function.php');
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Staj Bilgi Sistemi</title>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/acd6c9d14a.js" crossorigin="anonymous"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: '#editor'
    });
  </script>
</head>

<body>
  <!--Menü Kısmı Başlangıç-->
  <nav class="navbar navbar-expand-lg navbar-dark  fixed-top nv-cls">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">PAÜ | STAJ BİLGİ SİSTEMİ</a>
      <img src="imgg/30yil_logo.jpg" alt="Bootstrap" width="70" height="70" class="rounded-circle">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Anasayfa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#banner">Staj Hakkında</a>
          </li>
          <?php if (isset($_SESSION['user_id'])) {
            switch ($_user['YetkiId']) {
              case '1':
          ?>
                <li class="nav-item">
                  <a class="nav-link" href="stajlar.php">Stajlarım</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="mesajgoruntule.php">Mesajlar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.php?logout=1">Çıkış</a>
                </li>
              <?php
                break;
              case '2':
              ?>
                <li class="nav-item">
                  <a class="nav-link" href="koordinatörpanel.php">Öğrenciler</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.php?logout=1">Çıkış</a>
                </li>
              <?php
                break;
              case '3':
              ?>
                <li class="nav-item">
                  <a class="nav-link" href="ogrenci_listele.php">Öğrenci</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.php?logout=1">Çıkış</a>
                </li>
            <?php
                break;
            }
          } else { ?>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Giriş Yap</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>