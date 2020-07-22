<?php 

    $dbusername = "root";
    $dbpassword = "";
    $server = "localhost";

    $dbconnect = mysqli_connect($server, $dbusername, $dbpassword);
    $dbselect = mysqli_select_db($dbconnect, "zavrsni");

    $datum = date("Y-m-d");
    $vrijeme =  date( "H:i:s",time());
    $lpg = $_GET['lpg'];
    $co = $_GET['co'];
    $dim = $_GET['dim'];
    $kvaliteta_zraka = $_GET['kvaliteta_zraka'];
    $uredaj_id = $_GET['uredaj_id'];

    $sql = "INSERT INTO `ocitavanja`(`id_ocitavanja`, `datum`, `vrijeme`, `lpg`, `co`, `dim`, `kvaliteta_zraka`, `uredaj_id`) 
            VALUES (NULL, '$datum','$vrijeme','$lpg','$co','$dim','$kvaliteta_zraka','$uredaj_id')";

    mysqli_query($dbconnect, $sql);

    echo $sql;
?>