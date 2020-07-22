<?php require_once '../skripte/uredajiScript.php'; ?>
<!DOCTYPE html>
<html lang="hr">

<head>
    <title>Uređaji</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="naslov" content="Pocetna stranica">
    <meta name="autor" content="Alen Peršić">
    <meta name="kljucna" content="Kvaliteta, Zraka, IOT, FOI">
    <link href="../css/apersic.css" rel="stylesheet" type="text/css">
    <link href="../css/uredaji.css" rel="stylesheet" type="text/css">
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
        <button class="gumbCRUD" id="gumbCRUD"><a href="../crud/uredajCrud.php">CRUD</a></button>
        <?php ispisSadrzaja(); ?>
        <div class="graf" id="graf"></div>
        <div class="tekstualni_prikaz" id="tekstualni_prikaz"></div>
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
    <script type="text/javascript" src="../javascript/apersic.js"></script>
</body>
</html>