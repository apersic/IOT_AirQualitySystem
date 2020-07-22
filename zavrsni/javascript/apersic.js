function init(){

    otvoriIzbornik();
    odjavaGumb();

    if(document.title == "Uređaji"){
      autentificirajCRUD();  
      odaberiGraf();
    }
    if(document.title == "Očitavanja"){
        $('#tablica').DataTable( {
            columnDefs: [
                {
                    targets: [ 0, 1, 2 ],
                    className: 'mdl-data-table__cell--non-numeric'
                }
            ]
        });
    }
}

function autentificirajCRUD(){
    var cookie = getCookie("kor_tip");

    if(cookie == "1"){
        document.getElementById("gumbCRUD").style.display = "visible";
    }else{
        document.getElementById("gumbCRUD").style.display = "none";
    }
}

function odaberiGraf(){
    var lpg = document.getElementById("lpg");
    var co = document.getElementById("co");
    var dim = document.getElementById("dim");
    var kval_zraka = document.getElementById("kval_zraka");

    lpg.addEventListener("click", function(){
        nacrtajGraf("LPG");
    });

    co.addEventListener("click", function(){
        nacrtajGraf("CO");
    });

    dim.addEventListener("click", function(){
        nacrtajGraf("DIM");
    });

    kval_zraka.addEventListener("click", function(){
        nacrtajGraf("Kvaliteta zraka");
    });
}

function nacrtajGraf(naslov){

    switch(naslov){
        case "LPG": dohvatiOcitavanja("LPG");
                    break;

        case "CO":  dohvatiOcitavanja("CO");
                    break;

        case "DIM": dohvatiOcitavanja("DIM");
                    break;

        case "Kvaliteta zraka": dohvatiOcitavanja("Kvaliteta zraka");
                                break;
    }
}

function otvoriIzbornik(){
    var hamburger = document.getElementById("hamburger");
    var izbornik = document.getElementById("izbornik");

    hamburger.addEventListener("click", function(){
        if(izbornik.style.visibility == "visible"){
            izbornik.style.visibility = "hidden";
        }else{
            izbornik.style.visibility = "visible";
        }
    });

    return;
}

function odjavaGumb(){
    var cookie = getCookie("kor_tip");

    if(cookie == "" || cookie == "3"){
        document.getElementById("odjava").innerHTML = "";
    }else if(document.title == "Početna stranica"){
        document.getElementById("odjava").innerHTML = '<a href="odjava.php">Odjavi se</a>';
    }else{
        document.getElementById("odjava").innerHTML = '<a href="../odjava.php">Odjavi se</a>';
    }

    return;
}

function getCookie(ime) {
    var ime = ime + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var cookie_lista = decodedCookie.split(';');
    for(var i = 0; i <cookie_lista.length; i++) {
      var c = cookie_lista[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(ime) == 0) {
        return c.substring(ime.length, c.length);
      }
    }
    return "";
}

function dohvatiOcitavanja(cestica){
    var ocitavanja = document.getElementById("ocitavanja");
    if(ocitavanja != null){
        var lista = ocitavanja.innerHTML;
        var lpg_lista = new Array();
        var co_lista = new Array();
        var dim_lista = new Array();
        var kval_zraka_lista = new Array();
        var datumi = new Array();
        var vremena = new Array();
        json = JSON.parse(lista);
        //console.log(json);
        json.forEach(element => {
            lpg_lista.push({label: element.datum, y: parseInt(element.lpg)});
            co_lista.push({label: element.datum, y: parseInt(element.co)});
            dim_lista.push({label: element.datum, y: parseInt(element.dim)});
            kval_zraka_lista.push({label: element.datum, y: parseInt(element.kvaliteta_zraka)});
            datumi.push(element.datum);
            vremena.push(element.vrijeme);
        });
        //console.log(lpg_lista);

        switch(cestica){
            case "LPG": kreirajGraf(lpg_lista, "LPG");
                    break;

            case "CO":  kreirajGraf(co_lista, "CO");
                        break;

            case "DIM": kreirajGraf(dim_lista, "DIM");;
                        break;

            case "Kvaliteta zraka": kreirajGraf(kval_zraka_lista, "Kvaliteta zraka");
                                    break;
        }

        //console.log(datumi);
        //console.log(vremena);
    }
}

function kreirajGraf(podaci, naslov){

  if(naslov == "Kvaliteta zraka"){
    var chart = new CanvasJS.Chart("graf", {
      animationEnabled: true,
      title: {
          text: naslov
      },
      axisY:{
          title: "ppm",
          interval: 100,
          includeZero: false
      },
      axisX:{
          interval: 1,
          includeZero: false
      },
      data: [
          {
              type: "bar",
              dataPoints: podaci,
          }
      ]
    });
    chart.render();
  }else{
    var chart = new CanvasJS.Chart("graf", {
      animationEnabled: true,
      title: {
          text: naslov
      },
      axisY:{
          title: "ppm",
          interval: 10,
          includeZero: false
      },
      axisX:{
          interval: 1,
          includeZero: false
      },
      data: [
          {
              type: "bar",
              dataPoints: podaci,
          }
      ]
    });
    chart.render();
  }
}

window.onload = init;