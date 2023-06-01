<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Funda Of Web IT</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>STAJ DEFTERİNİN TAMAMINI BURADA GÖRÜNTÜLEYEBİLİRSİN.  </h4>
                    </div>
                    <div class="card-body">

                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">BAŞLANGIÇ TARİHİ.</label>
                                    <input type="text" name="start_price" value="<?php if(isset($_GET['start_price'])){echo $_GET['start_price']; }else{echo "tarihi şu şekilde yazınız : 20230128";} ?>" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Bitiş Tarihi</label>
                                    <input type="text" name="end_price" value="<?php if(isset($_GET['end_price'])){echo $_GET['end_price']; }else{echo "tarihi şu şekilde yazınız : 20230128";} ?>" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <br/>
                                    <button type="submit" class="btn btn-primary px-4">FİLTRELE</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h5>Product Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        <?php  
                        
                       
        
                        if(isset($_GET['start_price']) && isset($_GET['end_price']))
                        {
                            $startprice = $_GET['start_price'];
                            $endprice = $_GET['end_price'];
                            $tarih = date("Y-m-d");

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
                                <div class="col-md-4 mb-3">
                                <div class="border p-2">
                                    <h5><?php echo $items['Icerik']; ?></h5>
                                    <h6>tarih: <?php echo $items['Tarih']; ?></h6>
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
</body>
</html>