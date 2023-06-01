<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({ selector: 'textarea' });</script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="duzenle.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark  fixed-top nv-cls">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">PAÜ | STAJ DEFTERİM</a>
      <img src="imgg/30yil_logo.jpg" alt="Bootstrap" width="70" height="70" class="rounded-circle">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Anasayfa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="duzenle.php">Defter Düzenle</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="mesajgoruntule.php">Mesajlar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Çıkış</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


    <form method="post" action="soneditördenemesi.php">             
       
        <textarea id="mytextarea"name="mytextarea"></textarea>
        <input type="submit" name="gönder" value="Kaydet">
        <br><br>            
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
      integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
      integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
      crossorigin="anonymous"></script>
</body>
<?php
 
 $Icerik = $_POST["mytextarea"];
 $tarih = date("Ymd");
 $bitis = date("Ymd");
 $ekle="INSERT INTO stajadı(Icerik,Tarih,BitisTarih) VALUES ('$Icerik','$tarih','$bitis')";
 if($baglan->query($ekle)){
     echo "Kayıt Yapıldı";
 }
 else{
     echo "Kayıt yapılmadı";
 }
?>

</html>