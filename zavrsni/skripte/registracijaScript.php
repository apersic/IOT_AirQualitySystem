<?php 
    require_once "../klase/korisnikClass.php";
    require_once "../klase/dnevnikClass.php";
    require_once "../klase/bazaUpitiClass.php";

    //brisanje korisnika
    $cookie_name = "kor_id";
    $cookie_value = "Gost";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

    $cookie_name = "kor_tip";
    $cookie_value = "3";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

    $ime = $_POST["ime"];
    $prezime = $_POST["prezime"];
    $kor_ime = $_POST["korime"];
    $email = $_POST["email"];
    $lozinka = $_POST["lozinka"];
    $ponovljena_lozinka = $_POST["lozinka2"];
    $autentificirano = 1;
    $korisnici_lista = BazaUpiti::dohvatiKorisnike();

    if($lozinka == $ponovljena_lozinka){
        foreach($korisnici_lista as $korisnik){
            if($kor_ime == $korisnik -> kor_ime){
                $autentificirano = 0;
                header('Location: ../obrasci/registracija.php?autentificirano=2');
            }
            if($email == $korisnik -> email){
                $autentificirano = 0;
                header('Location: ../obrasci/registracija.php?autentificirano=3');
            }
        }
        if($autentificirano == 1){
            $korisnik = new Korisnik();
            $korisnik -> ime = $ime;
            $korisnik -> prezime = $prezime;
            $korisnik -> kor_ime = $kor_ime;
            $korisnik -> email = $email;

            $salt = sha1($kor_ime);
            $korisnik -> lozinka = sha1($salt . '--' . $lozinka);

            $korisnik -> id_vrsta_korisnika = "2";

            $datum = date("Y-m-d");
            $vrijeme =  date( "H:i:s",time());
            Dnevnik::logirajRegistraciju($datum, $vrijeme, $korisnik);

            Korisnik::unesiKorisnika($korisnik);
            header('Location: ../ostalo/uredaji.php');
        }
    }else{
        header('Location: ../obrasci/registracija.php?autentificirano=0');
    }
?>