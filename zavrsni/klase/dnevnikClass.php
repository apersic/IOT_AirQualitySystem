<?php 
require_once 'bazaUpitiClass.php';
class Dnevnik{

    public $id;
    public $datum;
    public $vrijeme;
    public $id_vrsta_aktivnosti;
    public $id_korisnik;

    public static function logirajPrijavu($datum, $vrijeme, $korisnik){
        $tablica = '`dnevnik_aktivnosti`';
        $atributi = '(`datum`, `vrijeme`, `vrsta_aktivnosti_id`, `korisnik_id`)';
        $id_korisnik = $korisnik -> id;
        $datum_prijave = $datum;
        $vrijeme_prijave = $vrijeme;

        $podaci = "('$datum_prijave', '$vrijeme_prijave', '1', '$id_korisnik')";

        BazaUpiti::unesiPodatak($tablica, $atributi, $podaci);
    }

    public static function logirajOdjavu($datum, $vrijeme, $korisnik_id){
        $tablica = '`dnevnik_aktivnosti`';
        $atributi = '(`datum`, `vrijeme`, `vrsta_aktivnosti_id`, `korisnik_id`)';
        $datum_prijave = $datum;
        $vrijeme_prijave = $vrijeme;

        $podaci = "('$datum_prijave', '$vrijeme_prijave', '2', '$korisnik_id')";

        BazaUpiti::unesiPodatak($tablica, $atributi, $podaci);
    }

    public static function logirajRegistraciju($datum, $vrijeme, $korisnik){
        $tablica = '`dnevnik_aktivnosti`';
        $atributi = '(`datum`, `vrijeme`, `vrsta_aktivnosti_id`, `korisnik_id`)';
        $id_korisnik = $korisnik -> id;
        $datum_prijave = $datum;
        $vrijeme_prijave = $vrijeme;

        $podaci = "('$datum_prijave', '$vrijeme_prijave', '3', '$id_korisnik')";

        BazaUpiti::unesiPodatak($tablica, $atributi, $podaci);
    }
}

?>