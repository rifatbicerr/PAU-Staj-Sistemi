<?php
include('baglanti.php');
session_start();

if (isset($_SESSION['user_id'])) {
    header("location:index.php");
}

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
}
$error = 0;
if (isset($_POST['usrnm'], $_POST['psw'])) {

    $query = "SELECT * FROM `kullanicilar` WHERE `KullaniciAdi` = '" . $_POST['usrnm'] . "'";
    $sonuc = $baglan->query($query);

    if ($sonuc && $sonuc->num_rows > 0) {
        $data = $sonuc->fetch_assoc();

        if ($_POST["psw"] == $data['Sifre']) {
            $_SESSION["user_id"] = $data['id'];
            if ($data['YetkiId'] == 1) {
                header("location:index.php");
                exit();
            } elseif ($data['YetkiId'] == 2) {
                header("location:koordinatörpanel.php");
                exit();
            } elseif ($data['YetkiId'] == 3) {
                header("location:ogrenci_listele.php");
                exit();
            } else {
                $error = 1;  // Yetkisiz kullanıcı hatası
                session_unset();
                session_destroy();
            }
        }
    }

    $error = 1;  // Kullanıcı adı veya şifre hatalı
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Giriş Yap</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .body {
            background: rgb(219, 226, 226);
        }

        .row {
            background: white;
            border-radius: 30px;
            box-shadow: 12px 12px 22px grey;
        }

        .img {
            border-top-left-radius: 100px;
            border-bottom-left-radius: 100px;
        }

        .button {
            padding: 15px 25px;
            font-size: 24px;
            text-align: center;
            cursor: pointer;
            outline: none;
            color: #fff;
            background-color: #0671d4;
            border: none;
            border-radius: 15px;
            box-shadow: 0 9px #999;
        }

        .button:hover {
            background-color: #5baef1
        }

        .button:active {
            background-color: #0778fa;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }

        .img-1 {
            position: absolute;

            left: 990px;
            bottom: 0px;
            right: 100px;


        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body class="body">
    <section class="form my-4 mx-5">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-5">
                    <img src="imgg/30yil_logo.jpg" class="img-fluid img" alt="">

                </div>
                <div class="col-lg-7 px-5 pt-5 ">
                    <h1 class="font-weight-bold py-3 "> Paü Yönetim Bilişim Sistemleri</h1>
                    <h4>Giriş yapınız</h4>



                    <form action="login.php" method="POST" style="max-width:500px;margin:auto">
                        <h2>Panel Giriş</h2>
                        <div class="input-container">
                            <i class="fa fa-user icon"></i>
                            <input type="text" class="form-control my-3 p-2" placeholder="Kullanıcı Adı" name="usrnm">
                        </div>


                        <div class="input-container">
                            <i class="fa fa-key icon"></i>
                            <input type="password" class="form-control my-3 p-2" placeholder="Şifre " name="psw">
                        </div>

                        <button type="submit" class="button">Giriş Yap</button>
                    </form>
                </div>
            </div>
        </div>
    </section>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>

    <?php if ($error) echo "<script>alert('kullanıcı adı veya parola hatalı')</script>"; ?>
</body>

</html>