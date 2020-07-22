<?php 
require_once 'bazaUpitiClass.php';
class Uredaj{

    public $id;
    public $lokacija;
    public $naziv;
    
    //funkcije unosa, ažuriranja i brisanja uređaja u bazi podataka
    public static function unesiUredaj($uredaj){
        $tablica = '`uredaj`';
        $atributi = '(`lokacija`, `naziv`)';
        $lokacija = $uredaj -> lokacija;
        $naziv = $uredaj -> naziv;

        $podaci = "('$lokacija', '$naziv')";

        BazaUpiti::unesiPodatak($tablica, $atributi, $podaci);
    }

    public static function obrisiUredaj($id_uredaja){
        $tablica = '`uredaj`';
        $id = $id_uredaja;
        $uvjet = "`id_uredaj` = '$id'";

        BazaUpiti::obrisiPodatak($tablica, $uvjet);
    }

    public static function azurirajUredaj($uredaj){
        $tablica = '`uredaj`';
        $id = $uredaj -> id;
        $lokacija = $uredaj -> lokacija;
        $naziv = $uredaj -> naziv;

        $podaci = "`lokacija` = '$lokacija', `naziv` = '$naziv'";
        $uvjet = "`id_uredaj` = '$id'";

        
        BazaUpiti::azurirajPodatak($tablica, $podaci, $uvjet);
    }

    public static function dohvatiOcitavanja($id){
        $ocitavanja = BazaUpiti::dohvatiOcitavanja();
        $ocitavanja_uredaja = array();

        foreach($ocitavanja as $ocitavanje){
            if($ocitavanje -> id_uredaj == $id){
                $ocitavanja_uredaja[] = $ocitavanje;
            }
        }

        return $ocitavanja_uredaja;
    }

    public static function dohvatiUredaje(){
        $uredaji = BazaUpiti::dohvatiUredaje();

        return $uredaji;
    }
}

?>