<?php
include('includes/header.php');

?>
<div class="container   ">
    <div class="card mt-4">
        <div class="card-body">
            <div class="row">
                <div class="col"></div>
                <a href="ogrenci_ekle.php" class="btn btn-primary w-auto">Öğrenci Ekle</a>
            </div>

            <table class="table  table-striped mt-2">
                <thead>
                    <th>Öğrenci Adı</th>
                    <th>Öğrenci Soyadı</th>
                    <th>Ogrenci Numarası</th>
                    <th>Detay</th>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT *
                    FROM kullanicilar k
                    WHERE k.YetkiId = 1 ";

                    $query_run = mysqli_query($baglan, $query);
                    if (mysqli_num_rows($query_run) > 0) {
                        while ($item = mysqli_fetch_assoc($query_run)) {
                    ?>
                            <tr>
                                <td><?= $item['Ad'] ?></td>
                                <td><?= $item['Soyad'] ?></td>
                                <td><?= $item['ogrenciNo'] ?></td>
                                <td>
                                    <a class="btn btn-secondary" href="admin_staj.php?ogrenci_id=<?=$item['id']?>" role="button">
                                        Stajlar
                                    </a>
                                </td>
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


</body>


</html>