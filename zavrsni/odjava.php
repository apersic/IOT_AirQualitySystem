<?php /*
    require "klase/dnevnikClass.php";

    $datum = date("Y-m-d");
    $vrijeme =  date( "H:i:s",time());
    $kor_id = $_COOKIE["kor_id"];

    Dnevnik::logirajOdjavu($datum, $vrijeme, $kor_id);*/

    //brisanje korisnika
    $cookie_name = "kor_id";
    $cookie_value = "Gost";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

    $cookie_name = "kor_tip";
    $cookie_value = "3";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

    header('Location: index.php');
?>