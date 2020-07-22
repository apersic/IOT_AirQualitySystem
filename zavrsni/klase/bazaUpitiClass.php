<?php 
//klasa sa svim upitima u bazu podataka
require_once '../vanjske_biblioteke/baza.class.php';
//require_once 'dnevnikClass.php';
require_once 'korisnikClass.php';
require_once 'ocitavanjeClass.php';
require_once 'posjedujeClass.php';
require_once 'uredajClass.php';
require_once 'vrstaAktivnostiClass.php';
require_once 'vrstaKorisnikaClass.php';

class BazaUpiti{

    public $sql;
    public $rezultat;

    //funkcije za dohvaćanje podataka iz svake tablice u bazi

    static function dohvatiKorisnike(){

        $baza = new Baza();
        $baza -> spojiDB();

        $sql = "SELECT * FROM `korisnik`";
        $rezultat = $baza -> selectDB($sql);
        $korisnici_lista = array();

        while ($red = mysqli_fetch_row($rezultat)){
            $korisnik = new Korisnik();
            $korisnik -> id = $red[0];
            $korisnik -> ime = $red[1];
            $korisnik -> prezime = $red[2];
            $korisnik -> kor_ime = $red[3];
            $korisnik -> email = $red[4];
            $korisnik -> lozinka = $red[5];
            $korisnik -> id_vrsta_korisnika = $red[6];

            $korisnici_lista[] = $korisnik;
        }

        $baza -> zatvoriDB();
        return $korisnici_lista;
    }

    static function dohvatiOcitavanja(){

        $baza = new Baza();
        $baza -> spojiDB();

        $sql = "SELECT * FROM `ocitavanja`";
        $rezultat = $baza -> selectDB($sql);
        $lista_ocitavanja = array();

        while ($red = mysqli_fetch_row($rezultat)){
            $ocitavanje = new Ocitavanje();
            $ocitavanje -> id = $red[0];
            $ocitavanje -> datum = $red[1];
            $ocitavanje -> vrijeme = $red[2];
            $ocitavanje -> lpg = $red[3];
            $ocitavanje -> co = $red[4];
            $ocitavanje -> dim = $red[5];
            $ocitavanje -> kvaliteta_zraka = $red[6];
            $ocitavanje -> id_uredaj = $red[7];

            $lista_ocitavanja[] = $ocitavanje;
        }

        $baza -> zatvoriDB();
        return $lista_ocitavanja;
    }
/*
    static function dohvatiDnevnikAktivnosti(){
        $baza = new Baza();
        $baza -> spojiDB();

        $sql = "SELECT * FROM `dnevnik_aktivnosti`";
        $rezultat = $baza -> selectDB($sql);
        $dnevnik_lista = array();

        while ($red = mysqli_fetch_row($rezultat)){
            $dnevnik = new Dnevnik();
            $dnevnik -> id = $red[0];
            $dnevnik -> datum = $red[1];
            $dnevnik -> vrijeme = $red[2];
            $dnevnik -> id_vrsta_aktivnosti = $red[3];
            $dnevnik -> id_korisnik = $red[4];

            $dnevnik_lista[] = $dnevnik;
        }

        $baza -> zatvoriDB();
        return $dnevnik_lista;
    }*/

    static function dohvatiPosjeduje(){
        $baza = new Baza();
        $baza -> spojiDB();

        $sql = "SELECT * FROM `posjeduje`";
        $rezultat = $baza -> selectDB($sql);
        $posjeduje_lista = array();

        while ($red = mysqli_fetch_row($rezultat)){
            $posjeduje = new Posjeduje();
            $posjeduje -> id_korisnik = $red[0];
            $posjeduje -> id_uredaj = $red[1];

            $posjeduje_lista[] = $posjeduje;
        }

        $baza -> zatvoriDB();
        return $posjeduje_lista;
    }

    static function dohvatiUredaje(){
        $baza = new Baza();
        $baza -> spojiDB();

        $sql = "SELECT * FROM `uredaj`";
        $rezultat = $baza -> selectDB($sql);
        $uredaj_lista = array();

        while ($red = mysqli_fetch_row($rezultat)){
            $uredaj = new Uredaj();
            $uredaj -> id = $red[0];
            $uredaj -> lokacija = $red[1];
            $uredaj -> naziv = $red[2];

            $uredaj_lista[] = $uredaj;
        }

        $baza -> zatvoriDB();
        return $uredaj_lista;
    }

    static function dohvatiUredajeKorisnika($id){
        $baza = new Baza();
        $baza -> spojiDB();

        $sql = "SELECT * FROM `posjeduje` WHERE `korisnik_id`='$id'";
        $rezultat = $baza -> selectDB($sql);
        $posjeduje_lista = array();
        $uredaj_lista = array();

        while ($red = mysqli_fetch_row($rezultat)){
            $posjeduje = new Posjeduje();
            $posjeduje -> id_korisnik = $red[0];
            $posjeduje -> id_uredaj = $red[1];

            $posjeduje_lista[] = $posjeduje;
        }

        foreach($posjeduje_lista as $posjeduje){
            $uredaj_id = $posjeduje -> id_uredaj;

            $sql = "SELECT * FROM `uredaj` WHERE `id_uredaj`='$uredaj_id'";
            $rezultat = $baza -> selectDB($sql);

            while ($red = mysqli_fetch_row($rezultat)){
                $uredaj = new Uredaj();
                $uredaj -> id = $red[0];
                $uredaj -> lokacija = $red[1];
                $uredaj -> naziv = $red[2];

                $uredaj_lista[] = $uredaj;
            }
        }
  
        $baza -> zatvoriDB();
        return $uredaj_lista;
    }

    static function dohvatiVrsteAktivnosti(){
        $baza = new Baza();
        $baza -> spojiDB();

        $sql = "SELECT * FROM `vrsta_aktivnosti`";
        $rezultat = $baza -> selectDB($sql);
        $vrsta_aktivnosti_lista = array();

        while ($red = mysqli_fetch_row($rezultat)){
            $vrsta_aktivnosti = new VrstaAktivnosti();
            $vrsta_aktivnosti -> id = $red[0];
            $vrsta_aktivnosti -> naziv = $red[1];
            $vrsta_aktivnosti -> opis = $red[2];

            $vrsta_aktivnosti_lista[] = $vrsta_aktivnosti;
        }

        $baza -> zatvoriDB();
        return $vrsta_aktivnosti_lista;
    }

    static function dohvatiVrsteKorisnika(){
        $baza = new Baza();
        $baza -> spojiDB();

        $sql = "SELECT * FROM `vrsta_korisnika`";
        $rezultat = $baza -> selectDB($sql);
        $vrsta_korisnika_lista = array();

        while ($red = mysqli_fetch_row($rezultat)){
            $vrsta_korisnika = new VrstaKorisnika();
            $vrsta_korisnika -> id = $red[0];
            $vrsta_korisnika -> naziv = $red[1];
            $vrsta_korisnika -> opis = $red[2];

            $vrsta_korisnika_lista[] = $vrsta_korisnika;
        }

        $baza -> zatvoriDB();
        return $vrsta_korisnika_lista;
    }

    //funkcije za unos, brisanje i ažuriranje podatka u bazi

    static function unesiPodatak($tablica, $atributi, $podaci){
        $baza = new Baza();
        $baza -> spojiDB();

        $sql = "INSERT INTO $tablica $atributi VALUES $podaci";

        $baza -> updateDB($sql);
        $baza -> zatvoriDB();
    }

    static function obrisiPodatak($tablica, $uvjet){
        $baza = new Baza();
        $baza -> spojiDB();

        $sql = "DELETE FROM $tablica WHERE $uvjet";

        $baza -> updateDB($sql);
        $baza -> zatvoriDB();
    }

    static function azurirajPodatak($tablica, $podaci, $uvjet){
        $baza = new Baza();
        $baza -> spojiDB();

        $sql = "UPDATE $tablica SET $podaci WHERE $uvjet";

        $baza -> updateDB($sql);
        $baza -> zatvoriDB();
    }
}

?>