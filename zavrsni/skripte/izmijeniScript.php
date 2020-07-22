<?php 
    require_once '../klase/uredajClass.php';

    if(isset($_POST["submit"])){
        $id = $_POST["id"];
        Uredaj::obrisiUredaj($id);
        header("Location: ../ostalo/uredaji.php");
    }

    if(isset($_POST["izmijeni"])){
        $uredaj = new Uredaj();

        $uredaj -> id = $id = $_POST["id"];
        $uredaj -> lokacija = $id = $_POST["lokacija"];
        $uredaj -> naziv = $id = $_POST["naziv"];

        Uredaj::azurirajUredaj($uredaj);
        header("Location: ../ostalo/uredaji.php");
    }

    function dohvatiUredaje(){
        $uredaji = Uredaj::dohvatiUredaje();

        foreach ($uredaji as $uredaj) {
            echo '<option value="'.$uredaj -> id .'">'. $uredaj->naziv .'</option>';
        }
    }

?>