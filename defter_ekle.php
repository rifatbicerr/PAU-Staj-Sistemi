 <?php
  
  include('includes/header.php')
  ?>

 <?php
  if (isset($_GET['staj_id'])) {
    if (isset($_POST["editor"])) {
      $Icerik = $_POST["editor"];
      $tarih = $_POST['tarih'];
      $user_id = $_SESSION['user_id'];
      $query = "INSERT INTO staj_defteri (user_id,staj_id,icerik,Tarih) values('$user_id'," . $_GET['staj_id'] . ",'$Icerik','$tarih')";
      if ($baglan->query($query)) {
        echo "Kayıt Yapıldı";
        header("location:defter_liste.php?staj_id=".$_GET['staj_id']);
      } else {
        echo "Kayıt yapılmadı";
      }
    }
  ?>


   <div class="container   ">
     <div class="card mt-4">
       <div class="card-body">
         <h1 style="margin-top: 40px; justify-content:center; display:flex;">Yeni Bir Staj Defteri Ekleyebilirsin.</h1>
         <div class="row pt-3">
           <form method="post" action="defter_ekle.php?staj_id=<?= $_GET['staj_id'] ?>">
             <label for="staj_suresi">Tarih:</label>

             <input type="date" name="tarih" class="form-control">
             <label for="staj_suresi">Defter:</label>
             <textarea id="editor" name="editor"></textarea>
             <button type="submit" class="btn btn-dark mt-2">Gönder</button>
           </form>
         </div>
       </div>
     </div>
   </div>
   </body>


   </html>

 <?php } else {
    header("location:index.php");
  }
  ?>