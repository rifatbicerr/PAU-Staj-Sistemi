<?php

include('includes/header.php');

if (isset($_GET['ogrenci_id'])) {
?>

    <div class="container   ">
        <div class="card mt-4">
            <div class="card-body">
                <div class="container-fluid">
                    <table class="table  table-striped mt-2">
                        <thead>
                            <th>Staj Türü</th>
                            <th>Başlangıç Tarihi</th>
                            <th>Bitiş Tarihi</th>
                            <th>Şirket Adı</th>
                            <th>Detay</th>
                        </thead>
                        <tbody>
                            
                            <?php
            


                            $ogrenci_id = $_GET['ogrenci_id'];
                            $query = "SELECT s.*,iv.sirket_adi FROM staj as s  
                            INNER JOIN isveren as iv ON iv.id = s.is_veren_id
                            WHERE s.ogrenci_id = " . $ogrenci_id;

                            $query_run = mysqli_query($baglan, $query);
                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $item) {

                            ?>
                                    <tr>
                                        <td><?= $item['staj_tur'] ?>. Staj</td>
                                        <td><?= date('d.m.Y', strtotime($item['baslangic_tarihi'])) ?></td>
                                        <td><?= date('d.m.Y', strtotime($item['bitis_tarihi'])) ?></td>
                                        <td><?= $item['sirket_adi'] ?></td>
                                        <td>
                                            <a class="btn btn-secondary " href="koordinator_defter.php?staj_id=<?= $item['staj_id'] ?>" role="button">
                                                İşlemler
                                            </a>
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

    </div>
    </body>


    </html>

<?php } else {
    header("location:index.php");
}
