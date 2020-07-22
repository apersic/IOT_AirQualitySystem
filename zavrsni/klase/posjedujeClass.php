<?php 
require_once 'bazaUpitiClass.php';
class Posjeduje{

    public $id_korisnik;
    public $id_uredaj;
    
    //funkcije unosa, ažuriranja i brisanja podatka
    //iz tablice posjeduje baze podataka
    public static function unesiPosjeduje($posjeduje){
        $tablica = '`posjeduje`';
        $atributi = '(`korisnik_id`, `uredaj_id`)';
        $id_korisnik = $posjeduje -> id_korisnik;
        $id_uredaj = $posjeduje -> id_uredaj;

        $podaci = "('$id_korisnik', '$id_uredaj')";

        BazaUpiti::unesiPodatak($tablica, $atributi, $podaci);
    }

    public static function obrisiPosjeduje($posjeduje){
        $tablica = '`posjeduje`';
        $id = $posjeduje -> id_korisnik;
        $uvjet = "`korisnik_id` = '$id'";

        BazaUpiti::obrisiPodatak($tablica, $uvjet);
    }

    public static function azurirajPosjeduje($posjeduje){
        $tablica = '`posjeduje`';
        $korisnik_id = $posjeduje -> id_korisnik;
        $uredaj_id = $posjeduje -> id_uredaj;

        $podaci = "`korisnik_id` = '$korisnik_id', `uredaj_id` = '$uredaj_id'";
        $uvjet = "`korisnik_id` = '$korisnik_id'";

        
        BazaUpiti::azurirajPodatak($tablica, $podaci, $uvjet);
    }
}

?>