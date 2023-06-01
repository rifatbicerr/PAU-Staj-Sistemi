<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({ selector: 'textarea' });</script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    input[type="date"]::-webkit-calendar-picker-indicator {
    background: transparent;
    bottom: 0;
    color: transparent;
    cursor: pointer;
    height: auto;
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
    width: auto;
}
    </style>
</head>


<body>

    

<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>STAJ DEFTERİNİ BURADA GÖRÜNTÜLEYEBİLİRSİN</h4>
                    </div>
                    <div class="card-body">

                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">BAŞLANGIÇ TARİİ</label>
                                    <input type="text" name="start_price" value="<?php if(isset($_GET['start_price'])){echo $_GET['start_price']; }else{echo "Tarihi şu şekilde yazınız:20230128";} ?>" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="">BİTİŞ TARİHİ</label>
                                    <input type="text" name="end_price" value="<?php if(isset($_GET['end_price'])){echo $_GET['end_price']; }else{echo "TARİHİ ŞU ŞEKİLDE YAZINIZ";} ?>" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Click Me</label> <br/>
                                    <button type="submit" class="btn btn-primary px-4">Filter</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <div class="card border border-primary">
                    <div class="card-header">
                        <h5>Defter Detayları</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        <?php  
                        
                       

                        if(isset($_GET['start_price']) && isset($_GET['end_price']))
                        {
                            $startprice = $_GET['start_price'];
                            $endprice = $_GET['end_price'];

                            $query = "SELECT * FROM stajadı WHERE Tarih BETWEEN $startprice AND $endprice ";
                        }
                        else
                        {
                            $query = "SELECT * FROM stajadı";
                        }
                        
                        $query_run = mysqli_query($baglan, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $items)
                            {
                                // 
                                ?>
                                <div class="col-md-4 mb-4 ">
                                <div class="border border-primary p-2">
                                    <h5><?php echo $items['Icerik']; ?></h5>
                                    <h6>tarih: <?php echo $items['Tarih']; ?></h6>
                                    <a href="duzenleme.php">
                                    <button metod="POST" name="gönder">DÜZENLEME
                                        <?php
                                        if(isset($_POST['gönder'])){
                                            $gönder=$baglan->query("SELECT * FROM stajadı WHERE Tarih BETWEEN $startprice AND $endprice");
                                        }

                                        ?>
                                    </button>
                                    </a>
                                    
                                  
                                    
                                </div>
                                </div>
                                <?php
                            }
                        }
                        else
                        {
                            echo "No Record Found";
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</html>