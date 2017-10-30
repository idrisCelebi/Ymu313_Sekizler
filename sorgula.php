<?php

include "veritabani.php";

if($_POST){

    $aranilan = $_POST['istenen'];

    if($aranilan) {
        try {

            $sirala = $db->prepare("SELECT * FROM hayvanlar WHERE hayvanTUR LIKE :ara OR hayvanSEHIR LIKE :ara");
            $sirala->bindValue("ara", "%$aranilan%", PDO::PARAM_STR);
            $sirala->execute();

        } catch (PDOException $h) {

            $hata = $h->getMessage();

            echo "<b>HATA VAR :</b> " . $hata;
        }
    }
    else{
        echo "Bulunamadı...";
    }
}
$dizi = $sirala->fetchAll(PDO::FETCH_ASSOC);

    ?>

    <table border="1">
        <th>Sıra</th>
        <th>İsim</th>
        <th>Tür</th>
        <th>Konum</th>
        <th>Yas</th>
        <th>Sağlık</th>
        <th>Durum</th>
        <?php foreach($dizi as $t) {
            if($t == '')
            {
                echo "Bulunamadı...";
                break;
                header("Location:index.php");
            }
            ?>
        <tr>
            <td><?php echo $t["hayvanID"]; ?></td>
            <td><?php echo $t["hayvanAD"]; ?></td>
            <td><?php echo $t["hayvanTUR"]; ?></td>
            <td><?php echo $t["hayvanSEHIR"]; ?></td>
            <td><?php echo $t["hayvanYAS"]; ?></td>
            <td><?php echo $t["hayvanSAGLIK"]; ?></td>
            <td><?php echo $t["hayvanDURUM"]; ?></td>
        </tr>
            <?php
        }
        ?>
    </table>