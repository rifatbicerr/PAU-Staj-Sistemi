<?php
include('includes/header.php');
$user_id = $_SESSION['user_id'];



?>

<div class="container">
  <div class="card mt-4">
    <div class="card-body">
    

      <table class="table table-striped mt-2">
        <thead>
          <tr>
            <th>Öğrenci Adı</th>
            <th>Öğrenci Soyadı</th>
            <th>Öğrenci Numarası</th>
            <th>Detay</th>
          </tr>
        </thead>
        <tbody>
          <?php


          $query = "SELECT k.*
                                FROM kullanicilar k
                                INNER JOIN staj s ON k.id = s.ogrenci_id
                                INNER JOIN isveren i ON s.is_veren_id = i.id
                                WHERE i.koordinator_id = $user_id";

          $query_run = mysqli_query($baglan, $query);
          if ($query_run) {
            if (mysqli_num_rows($query_run) > 0) {
              while ($item = mysqli_fetch_assoc($query_run)) {
          ?>
                <tr>
                  <td><?= $item['Ad'] ?></td>
                  <td><?= $item['Soyad'] ?></td>
                  <td><?= $item['ogrenciNo'] ?></td>
                  <td>
                    <a class="btn btn-secondary" href="koordinator_staj.php?ogrenci_id=<?= $item['id'] ?>" role="button">
                      Stajlar
                    </a>
                  </td>
                </tr>
          <?php
              }
            } else {
              echo '<tr><td colspan="4">Öğrenci bulunamadı!</td></tr>';
            }
          } else {
            echo "Sorgu hatası: " . mysqli_error($baglan);
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>