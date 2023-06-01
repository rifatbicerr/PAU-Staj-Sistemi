 <?php
  
  include('includes/header.php')
  ?>

 <?php
  if (isset($_POST["staj_ekle"])) {

    $koordinator_adi = $_POST['koordinator_adi'];
    $koordinator_mail = $_POST['koordinator_mail'];
    $sifre = generateRandomString(6);

    $query = "INSERT INTO kullanicilar (KullaniciAdi,Ad,Sifre,YetkiId) 
    values('$koordinator_mail','$koordinator_adi','$sifre',2)";
    $baglan->query($query);


    $sirket_adi = $_POST['sirket_adi'];
    $adres = $_POST['adres'];
    $mail = $_POST['mail'];
    $koordinator_id = $baglan->insert_id;

    $query = "INSERT INTO isveren (sirket_adi,adres,mail,koordinator_id) 
    values('$sirket_adi','$adres','$mail','$koordinator_id')";
    $baglan->query($query);

    $staj_tur = $_POST['staj_tur'];
    $staj_suresi = $_POST['staj_suresi'];
    $staj_baslangic = $_POST['staj_baslangic'];
    $staj_bitis = $_POST['staj_bitis'];
    $is_veren_id = $baglan->insert_id;


    $query = "INSERT INTO staj (staj_tur,ogrenci_id,staj_suresi,baslangic_tarihi,bitis_tarihi,is_veren_id) 
    values('$staj_tur','".$_SESSION['user_id']."','$staj_suresi','$staj_baslangic','$staj_bitis','$is_veren_id')";


    if ($baglan->query($query)) {
      echo '<script>alert("Kayıt Yapıldı")</script>';
    } else {
      echo("Error description: " . $baglan->error);
      echo "Kayıt yapılmadı";
    }
  }
  ?>
 <h1 style="margin-top: 40px; justify-content:center; display:flex;">Yeni Bir Staj Defteri Ekleyebilirsin.</h1>

 <div class="container">
   <div class="card mt-4">
     <div class="card-body">
       <div class="row pt-3">
         <form method="post" action="staj_ekle.php">
          <div class="form-group">
            <label for="staj_tur">Staj Türü:</label>
            <select class="form-control" name="staj_tur">
              <option value="1">Birinci Staj</option>
              <option value="2">İkinci Staj</option>
            </select>
          </div>
          <div class="form-group">
            <label for="staj_suresi">Staj Süresi:</label>
            <input type="text" class="form-control" name="staj_suresi">
            <label for="staj_baslangic">Başlangıç Tarihi:</label>
            <input type="date" class="form-control" name="staj_baslangic">
            <label for="staj_bitis">Bitiş Tarihi:</label>
            <input type="date" class="form-control" name="staj_bitis">
          </div>
          <hr>
          <div class="form-group">
            <label for="sirket_adi">Şirket Adı:</label>
            <input type="text" class="form-control" name="sirket_adi">
            <label for="adres">Şirket Adresi:</label>
            <input type="text" class="form-control" name="adres">
            <label for="mail">Şirket Mail:</label>
            <input type="text" class="form-control" name="mail">
          </div>

          <hr>
          <div class="form-group">
            <label for="koordinator_adi">Koordinatör Adı:</label>
            <input type="text" class="form-control" name="koordinator_adi">
            <label for="koordinator_mail">Koordinatör Mail:</label>
            <input type="text" class="form-control" name="koordinator_mail">
          </div>
          
          <button type="submit" class="btn btn-dark mt-2" name="staj_ekle">Gönder</button>
         </form>
       </div>
     </div>
   </div>
 </div>

 </body>


 </html>