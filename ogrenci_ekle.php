<?php

include('includes/header.php')
?>

<?php
if (isset($_POST["ogrenci_ekle"])) {

    $KullaniciAdi = $_POST['KullaniciAdi'];
    $Sifre = $_POST['Sifre'];
    $Ad = $_POST['Ad'];
    $Soyad = $_POST['Soyad'];
    $ogrenciNo = $_POST['ogrenciNo'];

    $query = "INSERT INTO kullanicilar (KullaniciAdi, Sifre, Ad, Soyad, ogrenciNo, YetkiId) 
    values ('$KullaniciAdi', '$Sifre', '$Ad', '$Soyad', '$ogrenciNo', 1)";
    $result = $baglan->query($query);
    if ($result) {
        echo '<script>alert("Kayıt Yapıldı")</script>';
    } else {
        echo ("Error description: " . $baglan->error);
        echo "Kayıt yapılmadı";
    }
}
?>
<h1 style="margin-top: 40px; justify-content:center; display:flex;">Yeni Bir Öğrenci Ekleyebilirsin.</h1>
<div class="container">
    <div class="card mt-4">
        <div class="card-body">
            <div class="row pt-3">
                <form method="post" action="ogrenci_ekle.php">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="KullaniciAdi">KullaniciAdi:</label>
                            <input type="text" class="form-control" name="KullaniciAdi">
                            <label for="Sifre">Sifre:</label>
                            <input type="password" class="form-control" name="Sifre">
                            <label for="Ad">Ad:</label>
                            <input type="text" class="form-control" name="Ad">
                            <label for="Soyad">Soyad:</label>
                            <input type="text" class="form-control" name="Soyad">
                            <label for="ogrenciNo">ogrenciNo:</label>
                            <input type="number" class="form-control" name="ogrenciNo">
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-dark mt-2" name="ogrenci_ekle">Ekle</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>


</html>