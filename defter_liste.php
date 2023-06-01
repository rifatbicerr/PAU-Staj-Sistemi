<?php

include('includes/header.php');

if (isset($_GET['staj_id'])) {
?>

    <div class="container   ">
        <div class="card mt-4">
            <div class="card-body">
                <form method="POST" class="form-inline">
                    <div class="row">
                        <div class="col-3 ">
                            <label for="">BAŞLANGIÇ TARİHİ</label>
                            <input type="date" value="<?= (isset($_GET['start_date'])) ? $_GET['start_date'] : date('Y-m-d') ?>" max="2099-12-31" name="start_date" class="form-control">
                        </div>
                        <div class="col-3  ">
                            <label for="">BİTİŞ TARİHİ</label>
                            <input type="date" value="<?= (isset($_GET['end_date'])) ? $_GET['end_date'] : date('Y-m-d') ?>" max="2099-12-31" name="end_date" class="form-control">
                        </div>
                        <div class="col-3">

                            <button type="submit" name="submit" class="btn btn-dark px-4 mt-4">FİLTRELE</button>
                        </div>
                        <div class="col-3 text-end">
                            <a href="defter_ekle.php?staj_id=<?= $_GET['staj_id'] ?>" class="btn btn-primary  px-4 mt-4">Gün Ekle</a>
                        </div>

                    </div>
                </form>

                <div class="container-fluid">
                    <table class="table  table-striped mt-2">
                        <thead>
                            <th>Sayfa Tarihi</th>
                            <th>Sayfa Metni</th>
                            <th>İşlemler</th>
                        </thead>
                        <tbody>
                            <?php

                            if (isset($_POST['submit'])) {
                                $start_date = $_POST['start_date'];
                                $end_date = $_POST['end_date'];
                                
                                $query = "SELECT * FROM staj_defteri WHERE staj_id = " . $_GET['staj_id'] . " AND  Tarih BETWEEN '$start_date' AND '$end_date' ";
                                $query_run = mysqli_query($baglan, $query);
                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $item) {
                                        ?>
                                        <tr>
                                            <td><?= $item['Tarih'] ?></td>
                                            <td><?= mb_substr($item['icerik'], 0, 200, 'UTF-8') ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        İşlemler
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="defter_duzenle.php?id=<?= $item['Id'] ?>">Düzenle</a></li>
                                                        <li><a class="dropdown-item" href="defter_sil.php?id=<?= $item['Id'] ?>">Sil</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="3" class="text-center">Veri bulunamadı!</td>
                                    </tr>
                            <?php
                                }
                            } else {
                                // Filtreleme yapılmadıysa veya sayfa ilk kez yüklendiğindeki içerik
                                if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
                                    $start_date = $_GET['start_date'];
                                    $end_date = $_GET['end_date'];

                                    $query = "SELECT * FROM staj_defteri WHERE staj_id = " . $_GET['staj_id'] . " AND  Tarih BETWEEN '$start_date' AND '$end_date' ";
                                } else {
                                    $query = "SELECT * FROM staj_defteri WHERE staj_id = " . $_GET['staj_id'];
                                }
                                $query_run = mysqli_query($baglan, $query);
                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $item) {
                                        ?>
                                        <tr>
                                            <td><?= $item['Tarih'] ?></td>
                                            <td><?= mb_substr($item['icerik'], 0, 50, 'UTF-8') ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        İşlemler
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="defter_duzenle.php?id=<?= $item['Id'] ?>">Düzenle</a></li>
                                                        <li><a class="dropdown-item" href="defter_sil.php?id=<?= $item['Id'] ?>">Sil</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="3" class="text-center">Veri bulunamadı!</td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>

<?php } else {
    header("location:index.php");
}
