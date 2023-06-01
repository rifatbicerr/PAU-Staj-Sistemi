<?php

$guncelle="UPDATE `stajadı` SET Icerik='[güncelleme denemesi]' WHERE Id=290";
if($baglan->query($guncelle)===TRUE){
    echo "Güncellendi";
}
else{
    echo "güncelleme yapılamadı";
}
?>