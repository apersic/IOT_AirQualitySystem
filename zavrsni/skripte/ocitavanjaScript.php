<?php 
    require_once "../klase/uredajClass.php";

    function ispis(){
        $uredaj_id = $_GET["id"];
        $ocitavanja = Uredaj::dohvatiOcitavanja($uredaj_id);

        echo '<table id="example" class="mdl-data-table" style="width:100%">
                <thead>
                <tr>
                    <th>Datum</th>
                    <th>Vrijeme</th>
                    <th>LPG</th>
                    <th>CO</th>
                    <th>Dim</th>
                    <th>Kvaliteta zraka</th>
                </tr>
                </thead>';

        foreach ($ocitavanja as $ocitavanje) {
            echo '<tr>';
                echo '<td>'. $ocitavanje -> datum. '</td>';
                echo '<td>'. $ocitavanje -> vrijeme. '</td>';
                echo '<td>'. $ocitavanje -> lpg. '</td>';
                echo '<td>'. $ocitavanje -> co. '</td>';
                echo '<td>'. $ocitavanje -> dim. '</td>';
                echo '<td>'. $ocitavanje -> kvaliteta_zraka. '</td>';
            echo '</tr>';
        }

        echo    '</table>';
    }
?>