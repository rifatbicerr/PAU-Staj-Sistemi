<?php
include('includes/header.php');
$koordinator_id = $_SESSION['user_id'];

if (isset($_GET['defter_id'])) {
    $defter_id = $_GET['defter_id'];

    $query = "SELECT * FROM staj_defteri WHERE Id = $defter_id";
    $query_run = mysqli_query($baglan, $query);

    if ($query_run) {
        $defter = mysqli_fetch_assoc($query_run);
?>

        <div class="container">
            <div class="card mt-4">
                <div class="card-body">
                    <h3 class="mt-4">Defter İçeriği</h3>
                    <p><?php echo $defter['icerik']; ?></p>
                </div>
            </div>
        </div>

<?php
    } else {
        echo "Sorgu hatası: " . mysqli_error($baglan);
    }
} else {
    header("location: index.php");
}
?>
