<?php 
    require_once '../klase/korisnikClass.php';
    require_once '../klase/uredajClass.php';
    require_once '../klase/posjedujeClass.php';

    function dohvatiKorisnike(){
        $korisnici = Korisnik::dohvatiKorisnike();

        foreach ($korisnici as $korisnik) {
            echo '<option value="'.$korisnik -> id .'">'.$korisnik -> kor_ime .'</option>';
        }
    }

    function dohvatiUredaje(){
        $uredaji = Uredaj::dohvatiUredaje();

        foreach ($uredaji as $uredaj) {
            echo '<option value="'.$uredaj -> id .'">'.$uredaj -> naziv .'</option>';
        }
    }

    if(isset($_POST["uredaj"])){
        if(isset($_POST["korisnik"])){
            $uredaj_id = $_POST["uredaj"];
            $korisnik_id = $_POST["korisnik"];

            $posjeduje = new Posjeduje();
            $posjeduje -> id_korisnik = $korisnik_id;
            $posjeduje -> id_uredaj = $uredaj_id;

            Posjeduje::unesiPosjeduje($posjeduje);
            header('Location: ../ostalo/uredaji.php');
        }
    }
?>