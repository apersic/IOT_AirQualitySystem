<?php 
    require_once '../klase/uredajClass.php';

    $lokacija = $_POST["lokacija"];
    $naziv = $_POST["naziv"];

    $uredaj = new Uredaj();
    $uredaj -> lokacija = $lokacija;
    $uredaj -> naziv = $naziv;

    Uredaj::unesiUredaj($uredaj);
    header('Location: ../ostalo/uredaji.php');
?>