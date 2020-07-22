<?php 
    require_once "../klase/uredajClass.php";
    $uredaj_id = 0;

    function ispisSadrzaja(){
        if(isset($_COOKIE["kor_id"])){
            if($_COOKIE["kor_id"] != "Gost"){
                $korisnik_id = $_COOKIE["kor_id"];
                $uredaji = BazaUpiti::dohvatiUredajeKorisnika($korisnik_id);
                
                echo '<form action="uredaji.php" method="post" class="selektor">';
                echo '<select name="uredaji" id="uredaji">';
                echo '<option value="-1" select="selected">Odaberi uređaj</option>';
                foreach($uredaji as $uredaj){
                    echo '<option value="'. $uredaj -> id. '">'.$uredaj -> lokacija. ' - ' . $uredaj -> naziv. '</option>';
                }
                echo '</select>';
                echo '<input type="submit" name="submit" value="Odaberi" />
                      </form>';
            }
        }

        if(isset($_POST["uredaji"])){
            $uredaj_id = $_POST["uredaji"];
            if($uredaj_id != "-1"){
                $ocitavanja = Uredaj::dohvatiOcitavanja($uredaj_id);
                echo '<div class="ocitavanja" id="ocitavanja" style="display: none">'.json_encode($ocitavanja) .'</div>';
                echo '<button class="gumb" id="ispis"><a href="ocitavanja.php?id='.$uredaj_id .'">Ispiši očitavanja</a></button>';
                izracunajProsijeke($ocitavanja);
            }
        }    
    }
    
    function izracunajProsijeke($ocitavanja){
        $lpg_suma = 0;
        $co_suma = 0;
        $dim_suma = 0;
        $kval_zraka_suma = 0;
        $lpg_prosijek = 0;
        $co_prosijek = 0;
        $dim_prosijek = 0;
        $kval_zraka_prosijek = 0;
        $brojac = 0;

        foreach($ocitavanja as $ocitavanje){
            $lpg_suma += $ocitavanje -> lpg;
            $co_suma += $ocitavanje -> co;
            $dim_suma += $ocitavanje -> dim;
            $kval_zraka_suma += $ocitavanje -> kvaliteta_zraka;
            $brojac++;
        }

        $lpg_prosijek = $lpg_suma/$brojac;
        $co_prosijek = $co_suma/$brojac;
        $dim_prosijek = $dim_suma/$brojac;
        $kval_zraka_prosijek = $kval_zraka_suma/$brojac;

        ispisiProsijeke($lpg_prosijek, $co_prosijek, $dim_prosijek, $kval_zraka_prosijek);
    }

    function ispisiProsijeke($lpg_prosijek, $co_prosijek, $dim_prosijek, $kval_zraka_prosijek){
        
        echo '<h3>Prosijek očitavanja:</h3>
              <div class="podaci">
                <div class="podatak" id="lpg">';
                    if(round($lpg_prosijek, 2) < 100){
                        echo '<a href="#" id="prosijek">
                        <h4>LPG:</h4>
                        <h4>'. round($lpg_prosijek, 2) .'ppm</h4>
                            </a>
                        </div>';
                    }else{
                        echo '<a href="#" id="prosijek_alert">
                        <h4>LPG:</h4>
                        <h4>'. round($lpg_prosijek, 2) .'ppm</h4>
                            </a>
                        </div>';
                    }
        echo    '<div class="podatak" id="co">';
                    if(round($co_prosijek, 2) < 100){
                        echo '<a href="#" id="prosijek">
                        <h4>CO</h4>
                        <h4>'.round($co_prosijek, 2). 'ppm</h4>
                            </a>
                        </div>';
                    }else{
                        echo '<a href="#" id="prosijek_alert">
                        <h4>CO</h4>
                        <h4>'.round($co_prosijek, 2). 'ppm</h4>
                            </a>
                        </div>';
                    }
        echo    '<div class="podatak" id="dim">';
                    if(round($dim_prosijek, 2) < 100){
                        echo '<a href="#" id="prosijek">
                        <h4>Dim</h4>
                        <h4>'.round($dim_prosijek, 2). 'ppm</h4>
                            </a>
                        </div>';
                    }else{
                        echo '<a href="#" id="prosijek_alert">
                        <h4>Dim</h4>
                        <h4>'.round($dim_prosijek, 2). 'ppm</h4>
                            </a>
                        </div>';
                    }
                    
        echo    '<div class="podatak" id="kval_zraka">';
                    if(round($kval_zraka_prosijek, 2) < 250){
                        echo '<a href="#" id="prosijek">
                        <h4>Kvaliteta</h4>
                        <h4>'.round($kval_zraka_prosijek, 2) .'</h4>
                            </a>    
                        </div>
                    </div>';
                    }else{
                        echo '<a href="#" id="prosijek_alert">
                        <h4>Kvaliteta</h4>
                        <h4>'.round($kval_zraka_prosijek, 2) .'</h4>
                            </a>    
                        </div>
                    </div>';
                    }
                    
    }

?>