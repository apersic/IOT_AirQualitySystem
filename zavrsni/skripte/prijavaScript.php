<?php 
    require_once "../klase/bazaUpitiClass.php";
    require_once "../klase/dnevnikClass.php";

    //brisanje korisnika
    $cookie_name = "kor_id";
    $cookie_value = "Gost";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

    $cookie_name = "kor_tip";
    $cookie_value = "3";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

    $kor_ime = $_POST["korime"];
    $lozinka = $_POST["lozinka"];
    $autentificirano = 0;

    $korisnici_lista = BazaUpiti::dohvatiKorisnike();
    foreach($korisnici_lista as $korisnik){
        //echo $korisnik -> kor_ime. "->". $korisnik -> lozinka. "<br>";
        if($kor_ime == "admin" && $kor_ime == $korisnik -> kor_ime){
            if($lozinka == $korisnik -> lozinka){
                //postavljanje kolačića
                $cookie_name = "kor_id";
                $cookie_value = $korisnik -> id;
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

                $cookie_name = "kor_tip";
                $cookie_value = $korisnik -> id_vrsta_korisnika;
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

                //header('Location: ../ostalo/uredaji.php');
                $autentificirano = 1;
                $datum = date("Y-m-d");
                $vrijeme =  date( "H:i:s",time());

                Dnevnik::logirajPrijavu($datum, $vrijeme, $korisnik);
            }
        }else if($kor_ime == $korisnik -> kor_ime){
            //echo $korisnik -> lozinka. "<br>";
            $salt = sha1($korisnik -> kor_ime);
            $lozinka_kriptirana = sha1($salt . '--' . $lozinka);
            //echo $lozinka_kriptirana;
            if($lozinka_kriptirana == $korisnik -> lozinka){
                //echo "prolazi";
                $cookie_name = "kor_id";
                $cookie_value = $korisnik -> id;
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

                $cookie_name = "kor_tip";
                $cookie_value = $korisnik -> id_vrsta_korisnika;
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

                //header('Location: ../ostalo/uredaji.php');
                $autentificirano = 1;

                $datum = date("Y-m-d");
                $vrijeme =  date( "H:i:s",time());

                Dnevnik::logirajPrijavu($datum, $vrijeme, $korisnik);
            }
        }
    }
    if($autentificirano == 1){
        header('Location: ../ostalo/uredaji.php');
    }else{
        header('Location: ../obrasci/prijava.php?autentificirano=0');
    }
?>