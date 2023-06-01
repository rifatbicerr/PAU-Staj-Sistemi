<?php

include('includes/header.php')
?>

<style>
  #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  #customers td,
  #customers th {
    border: 1px solid #ddd;
    padding: 8px;
  }

  #customers tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  #customers tr:hover {
    background-color: #ddd;
  }

  #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #2e2f31;
    color: white;
  }

  .article-content {
    padding: 2rem;
  }

  .article-content .card-category {
    font-size: 0.875;
    text-transform: uppercase;
    letter-spacing: 0.1rem;
    font-weight: 600;
    color: #6b82a7;
    display: block;
    text-decoration: none;
  }

  .article-content .card-title {
    margin: 1rem 0;
    color: #22447b;
  }

  .article-content .card-excerpt {
    font-size: 1rem;
    line-height: 1.5rem;
    color: #6b82a7;
    margin: 0;
    font-family: 'Times New Roman', Times, serif;
  }

  @media screen and (min-width:768px) {
    .site-container {
      max-width: 608px;
    }

    .article-card {
      display: grid;
      grid-template-rows: 220px 1fr;

    }
  }

  @media screen and (min-width:1280px) {
    .site-container {
      max-width: 1156px;
    }
  }

  #contact {
    background: #F9F9F9;
    padding: 25px;
    margin: 30px 0;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
  }

  #contact h2 {
    display: block;
    font-size: 30px;
    font-weight: 300;
    margin-bottom: 15px;
  }

  .form-control {
    border: none !important;
    margin: 0 0 10px;
    min-width: 100%;
    padding: 0;
    width: 100%;
  }

  #contact input[type="text"],
  #contact input[type="email"],
  #contact textarea {
    width: 100%;
    border: 1px solid #ccc;
    background: #FFF;
    margin: 0 0 5px;
    padding: 10px;
  }

  #contact input[type="text"]:hover,
  #contact input[type="email"]:hover,
  #contact textarea:hover {
    -webkit-transition: border-color 0.4s ease-in-out;
    -moz-transition: border-color 0.4s ease-in-out;
    transition: border-color 0.4s ease-in-out;
    border: 1px solid #aaa;
  }

  #contact textarea {
    height: 120px;
    max-width: 100%;
    resize: none;
  }

  #contact button[type="submit"] {
    cursor: pointer;
    width: 100%;
    border: none;
    background-color: #0671d4;
    color: #FFF;
    margin: 0 0 5px;
    padding: 10px;
    font-size: 15px;
  }

  #contact button[type="submit"]:hover {
    background: #111111;
    -webkit-transition: background 0.4s ease-in-out;
    -moz-transition: background 0.4s ease-in-out;
    transition: background-color 0.4s ease-in-out;
  }

  #contact button[type="submit"]:active {
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
  }

  #contact input:focus,
  #contact textarea:focus {
    outline: 0;
    border: 1px solid #aaa;
  }
</style>



<h1 class="mt-5 text-center">MESAJ GÖRÜNTÜLEME</h1>

<table id="customers">
  <tr>
    <th>Ad Soyad</th>
    <th>Eposta</th>
    <th>Konu</th>
    <th>Mesaj</th>
  </tr>


  <?php

  
  $sec = "Select* from mesajlar";
  $sonuc = $baglan->query($sec);

  if ($sonuc->num_rows > 0) {
    while ($cek = $sonuc->fetch_assoc()) {
      echo "
            <tr>
            <td>" . $cek['AdSoyad'] . "</td>
            <td>" . $cek['eposta'] . "</td>
            <td>" . $cek['konu'] . "</td>
            <td>" . $cek['Mesaj'] . "</td>
          </tr>
            
            ";
    };
  } else {
    echo "HİÇBİR VERİ BULUNUMADI";
  }

  ?>




</table>

<section id="iletisim">
  <div class="container mt-4">
    <h2 class="text-center">İletişim Sayfası</h2>

    <form id="contact" action="mesajgoruntule.php" method="post">
      <div class="form-control">
        <input placeholder="Adınız Soyadınız" type="text" required autofocus name="AdSoyad">
      </div>
      <div class="form-control">
        <input placeholder="E-Posta Adresiniz" type="email" required name="eposta">
      </div>
      <div class="form-control">
        <input placeholder="Konu" type="text" required name="konu">
      </div>
      <div class="form-control">
        <textarea placeholder="Lütfen Mesajınızı Buraya Yazın.." required name="Mesaj"></textarea>
      </div>
      <div class="form-control">
        <button name="submit" type="submit" id="submit">GÖNDER</button>
      </div>
    </form>
  </div>
</section>
<?php


$AdSoyad = $_POST['AdSoyad'];
$eposta = $_POST['eposta'];
$konu = $_POST['konu'];
$Mesaj = $_POST['Mesaj'];
$ekle = "INSERT INTO `mesajlar`(`AdSoyad`, `eposta`, `konu`, `Mesaj`)
 VALUES ('$AdSoyad','$eposta','$konu','$Mesaj')";
$sonuc = $baglan->query($ekle);

if ($sonuc->num_rows > 0) {
  while ($cek = $sonuc->fetch_assoc()) {
    echo "
        <tr>
        <td>" . $ekle['AdSoyad'] . "</td>
        <td>" . $ekle['eposta'] . "</td>
        <td>" . $ekle['konu'] . "</td>
        <td>" . $ekle['Mesaj'] . "</td>
      </tr>
        
        ";
  };
} else {
  echo "HİÇBİR VERİ BULUNUMADI";
}

?>
</body>

</html>