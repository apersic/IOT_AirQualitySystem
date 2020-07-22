<?php require_once '../skripte/ocitavanjaScript.php'; ?>
<!DOCTYPE html>
<html lang="hr">

<head>
    <title>Očitavanja</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="naslov" content="Pocetna stranica">
    <meta name="autor" content="Alen Peršić">
    <meta name="kljucna" content="Kvaliteta, Zraka, IOT, FOI">
    <link href="../css/apersic.css" rel="stylesheet" type="text/css">
    <link href="../css/uredaji.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.material.min.css" rel="stylesheet" type="text/css">
    <link href="../css/ocitavanja.css" rel="stylesheet" type="text/css">
</head>

<body>
    <header>
        <nav>
            <div class="hamburger" id="hamburger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <ul class="izbornik" id="izbornik">
                <li id="index"><a href="../index.php">Početna</a></li>
                <li id="uredaji"><a href="uredaji.php">Uređaji</a></li>
                <li id="prijava"><a href="../obrasci/prijava.php">Prijava</a></li>
                <li id="registracija"><a href="../obrasci/registracija.php">Registracija</a></li>
                <li id="odjava"><a href="../odjava.php">Odjavi se</a></li>
            </ul>
        </nav>
    </header>
    <div class="containerUredaji">
        <?php ispis(); ?>
    </div>
    <footer id="kraj">
        <p>&copy; 2019. A. Persic</p>
        <a href="https://validator.w3.org/#validate_by_uri+with_options">
            <img src="../multimedija/HTML5.png" alt="HTML Validator" width="50" height="50">
        </a>
        <a href="http://jigsaw.w3.org/css-validator/">
            <img src="../multimedija/CSS3.png" alt="CSS Validator" width="50" height="50">
        </a>
    </footer>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script> 
    <link type="text/css" src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> 
    <script type="text/javascript" src="../javascript/apersic.js"></script>
</body>
</html>