<?php

include('includes/header.php');
if (isset($_GET['staj_id'])) {
?>
    <div class="container   ">
        <div class="card mt-4">
            <div class="card-body">
                <form method="POST" class="form-inline">
                    <div class="row">
                        <div class="col-3">
                            <label for="">BAŞLANGIÇ TARİHİ</label>
                            <input type="date" value="<?= (isset($_POST['start_date'])) ? $_POST['start_date'] : date('Y-m-d') ?>" max="2099-12-31" name="start_date" class="form-control">
                        </div>
                        <div class="col-3">
                            <label for="">BİTİŞ TARİHİ</label>
                            <input type="date" value="<?= (isset($_POST['end_date'])) ? $_POST['end_date'] : date('Y-m-d') ?>" max="2099-12-31" name="end_date" class="form-control">
                        </div>
                        <div class="col-3">
                            <button type="submit" name="submit" class="btn btn-dark px-4 mt-4">FİLTRELE</button>
                        </div>
                    </div>
                </form>


                <?php
                if (isset($_POST['submit'])) {
                    $start_date = $_POST['start_date'];
                    $end_date = $_POST['end_date'];
                    $redirect_url = "admin_defter_liste.php";
                
                    if (isset($_GET['staj_id'])) {
                        $redirect_url .= "?staj_id=" . $_GET['staj_id'];
                    }
                
                    $redirect_url .= "&start_date=" . $start_date . "&end_date=" . $end_date;
                    header("Location: " . $redirect_url);
                    exit();
                }
                

                $staj_q = "SELECT * FROM staj WHERE staj_id = " . $_GET['staj_id'];
                $staj_s = $baglan->query($staj_q);
                $staj_data = $staj_s->fetch_assoc();

                $isveren_q = "SELECT * FROM isveren WHERE id = " . $staj_data['is_veren_id'];
                $isveren_s = $baglan->query($isveren_q);
                $isveren_data = $isveren_s->fetch_assoc();

                $koordinator_q = "SELECT * FROM kullanicilar WHERE id = " . $isveren_data['koordinator_id'];
                $koordinator_s = $baglan->query($koordinator_q);
                $koordinator_data = $koordinator_s->fetch_assoc();
                ?>
                <h3 class="mt-4">Staj ve Firma Bilgileri</h3>
                <div class="row">
                    <div class="col-6">
                        <table class="table  table-striped mt-2">
                            <tr>
                                <td> Staj Süresi :</td>
                                <td> <?= $staj_data['staj_suresi'] ?></td>
                            </tr>
                            <tr>
                                <td> Staj Başlangıç Tarihi :</td>
                                <td> <?= $staj_data['baslangic_tarihi'] ?></td>
                            </tr>
                            <tr>
                                <td> Staj Bitiş Tarihi :</td>
                                <td> <?= $staj_data['bitis_tarihi'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-6">
                        <table class="table  table-striped mt-2">
                            <tr>
                                <td> Firma Adı :</td>
                                <td> <?= $isveren_data['sirket_adi'] ?></td>
                            </tr>
                            <tr>
                                <td> Firma Adres :</td>
                                <td> <?= $isveren_data['adres'] ?></td>
                            </tr>
                            <tr>
                                <td> Firma E-Posta :</td>
                                <td> <?= $isveren_data['mail'] ?></td>
                            </tr>
                            <tr>
                                <td> Firma Tel :</td>
                                <td> <?= $isveren_data['tel'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-6">
                        <table class="table  table-striped mt-2">
                            <tr>
                                <td>Koordinator Adı :</td>
                                <td> <?= $koordinator_data['Ad'] ?></td>
                            </tr>
                            <tr>
                                <td>Koordinator E-posta :</td>
                                <td> <?= $koordinator_data['KullaniciAdi'] ?></td>
                            </tr>
                            <tr>
                                <td>Koordinator Sifre :</td>
                                <td> <?= $koordinator_data['Sifre'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <h3 class="mt-4">Defter</h3>
                <table class="table  table-striped mt-2">
                    <thead>
                        <th width="150px">Sayfa Tarihi</th>
                        <th>Sayfa Metni</th>
                        <th width="150px">Görüntüle</th>
                    </thead>
                    <tbody>
                        <?php

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
                                    <td><?= mb_substr($item['icerik'], 0, 200, 'UTF-8') ?></td>
                                    <td>
                                        <a href="admin_defter_goruntule.php?defter_id=<?= $item['Id'] ?>" class="btn btn-primary">Görüntüle </a>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="3" class="text-center">Veri bulunamadı!</th>
                            </tr>
                        <?php
                        }


                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>


    </body>


    </html>

<?php } else {
    header("location:index.php");
}
