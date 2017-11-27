<?php
@include "veritabani.php";
if(isset($_FILES['resimDosya'])){
    $hata = $_FILES['resimDosya']['error'];

    if($hata != 0) {
        echo 'Yüklenirken bir hata gerçekleşmiş.';
        header("refresh: 1; url=resimEkle.php");
    } else {
        $boyut = $_FILES['resimDosya']['size'];
        if($boyut > (1024*1024*3)){
            echo 'Dosya 3MB den büyük olamaz.';
            header("refresh: 1; url=resimEkle.php");
        } else {
            $tip = $_FILES['resimDosya']['type'];
            $isim = $_FILES['resimDosya']['name'];
            $uzanti = explode('.', $isim);
            $uzanti = $uzanti[count($uzanti)-1];
            if($tip != 'image/jpeg' || $uzanti != 'jpg' ) {
                echo 'Yanlızca JPG dosyaları gönderebilirsiniz.';
                header("refresh: 1; url=resimSec.php");
            } else {
                $yolumuz = "fotograf/".$isim;
                $dosya = $_FILES['resimDosya']['tmp_name'];
                copy($dosya, 'fotograf/' . $_FILES['resimDosya']['name']);
                echo 'Dosyanız upload edildi!';
                $query = $db->prepare("INSERT INTO resimler SET resAD = ?, resYOLU = ?, resBOYUT = ?" );
                $insert = $query->execute(array($isim,$yolumuz,$boyut));
                if ( $insert ){
                    echo "Ekleme işlemi başarılı!";
                    header("refresh: 1; url=index.php");
                }
            }
        }
    }
}
if(isset($_FILES['resimLink'])){
    $hata = $_FILES['resimLink']['error'];

    if($hata != 0) {
        echo 'Yüklenirken bir hata gerçekleşmiş.';
        header("refresh: 1; url=resimEkle.php");
    } else {
        $boyut = $_FILES['resimLink']['size'];
        if($boyut > (1024*1024*3)){
            echo 'Dosya 3MB den büyük olamaz.';
            header("refresh: 1; url=resimEkle.php");
        } else {
            $tip = $_FILES['resimLink']['type'];
            $isim = $_FILES['resimLink']['name'];
            $uzanti = explode('.', $isim);
            $uzanti = $uzanti[count($uzanti)-1];
            if($tip != 'image/jpeg' || $uzanti != 'jpg' ) {
                echo 'Yanlızca JPG dosyaları gönderebilirsiniz.';
                header("refresh: 1; url=resimSec.php");
            } else {
                $yolumuz = "fotograf/".$isim;
                $dosya = $_FILES['resimLink']['tmp_name'];
                copy($dosya, 'fotograf/' . $_FILES['resimLink']['name']);
                echo 'Dosyanız upload edildi!';
                $query = $db->prepare("INSERT INTO resimler SET resAD = ?, resLINK = ?, resBOYUT = ?" );
                $insert = $query->execute(array($isim,$yolumuz,$boyut));
                if ( $insert ){
                    echo "Ekleme işlemi başarılı!";
                    header("refresh: 1; url=index.php");
                }
            }
        }
    }
}
?>

