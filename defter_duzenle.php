<?php

include('includes/header.php')
?>


<?php

$query = "SELECT * FROM staj_defteri WHERE id = " . $_GET['id'];
$sonuc = $baglan->query($query);
$data = $sonuc->fetch_assoc();

if (isset($_POST["editor"])) {
    $Icerik = $_POST["editor"];
    $guncelle = "UPDATE staj_defteri SET Icerik='$Icerik' WHERE Id=" . $_GET['id'];
    if ($baglan->query($guncelle) === TRUE) {
        echo "Güncellendi";
        header("location:defter_liste.php?staj_id=".$data['staj_id']);
    } else {
        echo "güncelleme yapılamadı";
    }
}

?>

<div class="container   ">
    <div class="card mt-4">
        <div class="card-body">
            <h1 style="margin-top: 20px; justify-content:center; display:flex;">Defterini Burada Düzenleyebilirsin.</h1>
            <form method="post" action="defter_duzenle.php?id=<?= $_GET['id'] ?>">
                <div class="mb-4">
                    <label for="date" class="form-label fw-bold">Seçtiğiniz Defterin Eklenme Tarihi</label>
                    <input type="date" value="<?= date('Y-m-d', strtotime($data['Tarih'])) ?>" max="2099-12-31" class="form-control" id="date">
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label mb-1 fw-bold">Seçtiğiniz Defterin İçeriği</label>
                    <textarea id="editor" name="editor"><?= $data['icerik'] ?></textarea>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-dark">Kaydet</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>