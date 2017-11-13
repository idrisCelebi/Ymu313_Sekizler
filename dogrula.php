<?php
include "bağlan.php";
$query = $vt->prepare("select * from uyekayit where email=? and kod=? and aktivasyon=?");
$query->execute(array($email,$kod,0));
$query->fetch(PDO::FETCH_ASSOC);
$kontrol = $query->rowCount();

if($kontrol) {

    $update = $vt->prepare("update uyekayit set  
			
			        aktivasyon=? where email=? and kod=? and aktivasyon=?
			
			");

    $ok = $update->execute(array(1, $eposta, $kod, 0));

    if($ok == true){

        echo '<div style="margin-top:20px;" class="alert alert-success">uyeliğiniz basarıyla onaylandı giris yapabilirsiniz..</div>';


    }else	{

        echo '<div style="margin-top:20px;" class="alert alert-warning">onaylama basarasız oldu mysql hatası..</div>';


    }
}

    ?>