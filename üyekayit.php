<head>
    <title>ÜYE KAYIT SAYFASI</title>
</head>

<form method="post" action="">

    <br>
    <b>ADINIZ:</b> <input type="text" name="ad"> <br>

    <br>  <b>SOYADINIZ:</b><input type="text" name="soyad">  <br>

    <br>  <b> KULLANICI ADINIZ:</b> <input type="text" name="kadi"> <br>

    <br>  <b>ŞİFRENİZ:</b> <input type="text" name="sifren"> <br>

    <br> <b>DOĞUM TARİHİNİZ:</b> <input type="text" name="dogum"> <br>

    <br> <b> BULUNDUĞUNUZ ŞEHİR:</b> <input type="text" name="sehir"> <br>

    <br><b> MAİL ADRESİNİZ:</b> <input type="text" name="mail"> <br>

    <br> <b>CEP TELEFONUNUZ:</b> <input type="text" name="numara"> <br>

    <br> <b> EN SEVDİĞİNİZ HAYVAN:</b> <input type="text" name="favori"> <br>

    <br> <b>İLGİLENDİĞİNİZ HAYVAN:</b> <input type="text" name="ilgi">
    <br> <br> <input type="submit" value="KAYIT OL">


</form>
<hr width="100%" color="#0000F8" size="20">

<?php
include "baglan.php";
    if($_POST){
    $ekle1=$_POST["ad"];
        $ekle10=$_POST["sifren"];
        $ekle2=$_POST["soyad"];
        $ekle3=$_POST["kadi"];
        $ekle11=$_POST["kadi"];
        $ekle4=$_POST["dogum"];
        $ekle5=$_POST["sehir"];
        $ekle6=$_POST["mail"];
        $ekle7=$_POST["numara"];
        $ekle8=$_POST["favori"];
        $ekle9=$_POST["ilgi"];
    $ek = $vt->prepare("insert into uyebilgileri SET adi = ?,soyadi = ?,kullaniciAdi = ?,dogumTarihi = ?,bulunduguSehir = ?,eMail= ?,cepTelefonu= ?,enSevdigiHayvan= ?,ilgilendigiHayvanlar= ?");
    $insert=$ek->execute(array($ekle1,$ekle2,$ekle3,$ekle4,$ekle5,$ekle6,$ekle7,$ekle8,$ekle9));
    $ekl=$vt->prepare("insert into uyetablosu SET  kullaniciAdi=?, sifre=?");
    $insert2=$ekl->execute(array($ekle11,$ekle10));
    if($insert){

        echo "başarıllı";
        header("Location:üyekayit.php");
    }

}



?>