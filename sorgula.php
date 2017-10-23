<form action="" method="post">
    <table cellspacing="5" cellpadding="5">
        <tr>
            <td>Hayvan Türü</td>
            <td><input type="text" name="hayvanTUR"/></td>
        </tr>
        <tr>
            <td>Hayvan Yaşı</td>
            <td><input type="text" name="hayvanYAS"/></td>
        </tr>
        <tr>
            <td>Hayvan Konumu</td>
            <td><input type="text" name="hayvanSEHIR"/></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Ekle"/></td>
        </tr>
    </table>
</form>

<?php

include "veritabani.php";
// Form Gönderilmişmi Kontrolü Yapalım
if($_POST){

    $hayvanTURU = '';
    $hayvanYASI = '';
    $hayvanSEHIRI = '';

    $hayvanTURU = $_POST['hayvanTUR'];
    $hayvanYASI = $_POST['hayvanYAS'];
    $hayvanSEHIRI = $_POST['hayvanSEHIR'];
    try{


        if($hayvanTURU)
        {
            $TURara=$db->query("select * from hayvanlar WHERE hayvanTUR='$hayvanTURU'");
            $TURmiktar=$TURara->rowCount();
        }
        if($hayvanYASI)
        {
            $YASara=$db->query("select * from hayvanlar WHERE hayvanYAS='$hayvanYASI'");
            $YASmiktar=$YASara->rowCount();
        }
        if($hayvanSEHIRI)
        {
            $SEHIRara=$db->query("select * from hayvanlar WHERE hayvanSEHIR='$hayvanSEHIRI'");
            $SEHIRmiktar=$SEHIRara->rowCount();
        }
        else{
            $ara=$db->query("select * from hayvanlar");
            $miktar=$ara->rowCount();
        }

        if($TURara){//eğer veri çekildiyse

            echo "veri çekildi <br />";

            if($TURmiktar>0){

                foreach($TURara as $TURal){

                    echo $TURal["hayvanTUR"]."<br />";//Aldığımız verilerden isim sütununu ekrana bastırdık

                }

            }else{

                echo "Aranan kelime yok.";

            }

        }
        if($YASara){//eğer veri çekildiyse

            echo "veri çekildi <br />";

            if($YASmiktar>0){

                foreach($YASara as $YASal){

                    echo $YASal["hayvanYAS"]."<br />";//Aldığımız verilerden isim sütununu ekrana bastırdık

                }

            }else{

                echo "Aranan kelime yok.";

            }

        }
        if($SEHIRara){//eğer veri çekildiyse

            echo "veri çekildi <br />";

            if($SEHIRmiktar>0){

                foreach($SEHIRara as $SEHIRal){

                    echo $SEHIRal["hayvanSEHIR"]."<br />";//Aldığımız verilerden isim sütununu ekrana bastırdık

                }

            }else{

                echo "Aranan kelime yok.";

            }

        }
        if($ara){//eğer veri çekildiyse

            echo "veri çekildi <br />";

            if($miktar>0){

                foreach($ara as $al){

                    echo $al."<br />";//Aldığımız verilerden isim sütununu ekrana bastırdık

                }

            }else{

                echo "Aranan kelime yok.";

            }

        }
        else{

            echo "veri çekilemedi";

        }
    }catch (PDOException $h) {

        $hata=$h->getMessage();

        echo "<b>HATA VAR :</b> ".$hata;

    }
}
?>