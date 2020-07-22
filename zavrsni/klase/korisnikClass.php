<?php 
require_once 'bazaUpitiClass.php';
class Korisnik{

    public $id;
    public $ime;
    public $prezime;
    public $kor_ime;
    public $email;
    public $lozinka;
    public $id_vrsta_korisnika;
    
    //Funkcije za unos brisanje i ažuriranje podataka u tablici
    public static function unesiKorisnika($korisnik){
        $tablica = '`korisnik`';
        $atributi = '(`ime`, `prezime`, `kor_ime`, `email`, `lozinka`, `vrsta_korisnika_id`)';
        $ime = $korisnik -> ime;
        $prezime = $korisnik -> prezime;
        $kor_ime = $korisnik -> kor_ime;
        $email = $korisnik -> email;
        $lozinka = $korisnik -> lozinka;
        $id_vrsta_korisnika = $korisnik -> id_vrsta_korisnika;

        $podaci = "('$ime', '$prezime', '$kor_ime', '$email', '$lozinka', '$id_vrsta_korisnika')";

        BazaUpiti::unesiPodatak($tablica, $atributi, $podaci);
    }

    public static function obrisiKorisnika($korisnik){
        $tablica = '`korisnik`';
        $id = $korisnik -> id;
        $uvjet = "`id_korisnik` = '$id'";

        BazaUpiti::obrisiPodatak($tablica, $uvjet);
    }

    public static function azurirajKorisnika($korisnik){
        $tablica = '`korisnik`';
        $id = $korisnik -> id;
        $ime = $korisnik -> ime;
        $prezime = $korisnik -> prezime;
        $kor_ime = $korisnik -> kor_ime;
        $email = $korisnik -> email;
        $lozinka = $korisnik -> lozinka;
        $id_vrsta_korisnika = $korisnik -> id_vrsta_korisnika;

        $podaci = "`ime` = '$ime', `prezime` = '$prezime', `kor_ime` = '$kor_ime', `email` = '$email', `lozinka` = '$lozinka', `vrsta_korisnika_id` = '$id_vrsta_korisnika'";
        $uvjet = "`id_korisnik` = '$id'";

        
        BazaUpiti::azurirajPodatak($tablica, $podaci, $uvjet);
    }

    public static function dohvatiKorisnike(){
        $korisnici = BazaUpiti::dohvatiKorisnike();
        return $korisnici;
    }
}

?>