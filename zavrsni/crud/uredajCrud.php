<!DOCTYPE html>
<html lang="hr">

<head>
    <title>Unesi uređaj</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="naslov" content="Pocetna stranica">
    <meta name="autor" content="Alen Peršić">
    <meta name="kljucna" content="Kvaliteta, Zraka, IOT, FOI">
    <link href="../css/apersic.css" rel="stylesheet" type="text/css">
    <link href="../css/prijava.css" rel="stylesheet" type="text/css">
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
                <li id="uredaji"><a href="../ostalo/uredaji.php">Uređaji</a></li>
                <li id="prijava"><a href="..obrasci/prijava.php">Prijava</a></li>
                <li id="registracija"><a href="..obrasci/registracija.php">Registracija</a></li>
                <li id="odjava"><a href="../odjava.php">Odjavi se</a></li>
            </ul>
        </nav>
    </header>
    <section id="sadrzaj">
        <div class="container">
        <img class="pozadina" src="../multimedija/background.jpg" alt="Pozadina">
        <div class="prijavaForma">
            <form id="form1" method="post" name="form1"
                action="../skripte/crudScript.php">
                <table>
                    <tr>
                        <td><label for="lokacija">Lokacija: </label></td>
                        <td><input type="text" id="lokacija" name="lokacija" size="20" maxlength="20"
                                placeholder="lokacija" autofocus="autofocus" required="required"></td>
                    </tr>
                    <tr>
                        <td><label for="naziv">Naziv: </label></td>
                        <td><input type="text" id="naziv" name="naziv" size="20" maxlength="26"
                                placeholder="naziv" required="required"></td>
                    </tr>
                    <tr>
                        <td><input class="gumb" id="submit" type="submit" name="submit" value=" Unesi "></td>
                    </tr>
                </table>
                <button class="gumb" id="obrisi"><a href="uredajIzmijeni.php">Izmijeni/Obriši</a></button>
                <button class="gumb" id="posjeduje"><a href="posjedujeCrud.php">Dodijeli uređaj</a></button>
            </form>
        </div>
        </div>
    </section>
    <footer id="kraj">
        <p>&copy; 2019. A. Persic</p>
        <a href="https://validator.w3.org/#validate_by_uri+with_options">
            <img src="../multimedija/HTML5.png" alt="HTML Validator" width="50" height="50">
        </a>
        <a href="http://jigsaw.w3.org/css-validator/">
            <img src="../multimedija/CSS3.png" alt="CSS Validator" width="50" height="50">
        </a>
    </footer>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script> 
    <script type="text/javascript" src="../javascript/apersic.js"></script>
</body>
</html>