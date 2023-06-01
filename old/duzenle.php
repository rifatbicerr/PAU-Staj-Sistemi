<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="duzenle.css">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    
    <script>tinymce.init({ selector: 'textarea' });</script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    input[type="date"]::-webkit-calendar-picker-indicator {
    background: transparent;
    bottom: 0;
    color: transparent;
    cursor: pointer;
    height: auto;
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
    width: auto;
}
    </style>
</head>


<body>


<nav class="navbar navbar-expand-lg navbar-dark  fixed-top nv-cls">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">PAÜ | STAJ DEFTERİ DÜZENLEME</a>
      <img src="imgg/30yil_logo.jpg" alt="Bootstrap" width="70" height="70" class="rounded-circle">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="AnaSayfa.php">Anasayfa</a>
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


                        <form action="" method="GET" class=" background">
                            <div class="row mt-4  ">
                                <div class="col-md-5 mt-4 ">
                                    <label for="" class="baslik">BAŞLANGIÇ TARİHİ</label>
                                    <input type="text" name="start_price" class="forms" value="<?php if(isset($_GET['start_price'])){echo $_GET['start_price']; }else{echo "Tarihi şu şekilde yazınız:20230128";} ?>">
                                </div>
                                <div class="col-md-4 mt-4 ">
                                    <label  class="baslik" for="">BİTİŞ TARİHİ</label>
                                    <input type="text" name="end_price" class="forms" value="<?php if(isset($_GET['end_price'])){echo $_GET['end_price']; }else{echo "TARİHİ ŞU ŞEKİLDE YAZINIZ";} ?>">
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-info px-4">Filter</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

    
    <?php
  


  if(isset($_GET['start_price']) && isset($_GET['end_price']))
  {
      $startprice = $_GET['start_price'];
      $endprice = $_GET['end_price'];

      $query = "SELECT * FROM stajadı WHERE Tarih BETWEEN $startprice AND $endprice ";
  }
  else
  {
      $query = "SELECT * FROM stajadı";
  }
  $query_run = mysqli_query($baglan, $query);
  if(mysqli_num_rows($query_run) > 0){
        foreach($query_run as $items){
          
            echo "<textarea name='mytextarea' <div id='overflowTest'>".$items['Tarih']." ".$items['Icerik']."\n</textarea></div>";
            echo "<input type='submit' value='Güncelle'>";
        }
      
          
           
          
          
        }
    


  else{
      echo"Veri Tabanında Veri Bulunamadı.";
    }





    $Icerik = $_POST["mytextarea"];
    $guncelle="UPDATE stajadı SET Icerik='[$Icerik]' WHERE Id=291";
    if($baglan->query($guncelle)===TRUE){
        echo "Güncellendi";
}
else{
    echo "güncelleme yapılamadı";
}



?>

</body>


</html>