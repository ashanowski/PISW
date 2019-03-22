
var miesiac = " "

function clock() {
    var today = new Date();

    var day = today.getDate();
    var month = today.getMonth() + 1;
    if (month < 10) month = "0" + month;
    var year = today.getFullYear();

    var hour = today.getHours();
    if (hour < 10) hour = "0"+hour;
    var minute = today.getMinutes();
    if (minute < 10) minute = "0"+minute;
    var second = today.getSeconds();
    if (second < 10) second = "0"+second;

    var dzien;

    switch (today.getDay()) {
        case 0:
            dzien = "niedziela" 
            break;
        case 1:
            dzien = "poniedziałek" 
            break;
        case 2:
            dzien = "wtorek" 
            break;
        case 3:
            dzien = "środa" 
            break;
        case 4:
            dzien = "czwartek" 
            break;
        case 5:
            dzien = "piątek" 
            break;
        case 6:
            dzien = "sobota" 
            break;
        default:
            break;
    }
    

    switch (today.getMonth() + 1) {
        case 1:
            miesiac = "styczeń" 
            break;
        case 2:
            miesiac = "luty" 
            break;
        case 3:
            miesiac = "marzec" 
            break;
        case 4:
            miesiac = "kwiecień" 
            break;
        case 5:
            miesiac = "maj" 
            break;
        case 6:
            miesiac = "czerwiec" 
            break;
        case 7:
            miesiac = "lipiec" 
            break;
        case 8:
            miesiac = "sierpień" 
            break;
        case 9:
            miesiac = "wrzesień" 
            break;
        case 10:
            miesiac = "październik" 
            break;
        case 11:
            miesiac = "listopad" 
            break;
        case 12:
            miesiac = "grudzień" 
            break;
        default:
            break;
    }

    document.getElementById("data").innerHTML = 
        "Dzisiaj jest " + dzien + ", " + day + " " + miesiac + " " + year;
    
    document.getElementById("zegar").innerHTML =
        hour + ":" + minute + ":" + second;

    setTimeout("clock()", 1000);
}


function sprawdzPole() {
    var dane = document.getElementById("pole").value;

    if(dane){
        if (!isNaN(dane)) {

            if (parseFloat(dane) == parseInt(dane)) {
                document.getElementById("wynikSprawdzPole").innerHTML 
                        = parseInt(dane) + " to liczba całkowita";
            }

            else {
                document.getElementById("wynikSprawdzPole").innerHTML 
                        = parseFloat(dane) + " to liczba zmiennoprzecinkowa";
            }
        }
        else document.getElementById("wynikSprawdzPole").innerHTML = "To tylko napis!";
    }
    else document.getElementById("wynikSprawdzPole").innerHTML = "Pole jest puste!";
}

function zgadnijLiczbe() {
    function losujLiczbe(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);

        return Math.floor(Math.random() * (max - min + 1) + min);
    }
    liczba = losujLiczbe(1, 100);

    odgadnieta = false;
    alert("Myślę o jakiejś liczbie z przedziału 1 - 100...");
    do {

        proba = prompt("Twój strzał:")
        
        if (proba == liczba){
            alert("Tak, " + proba + " to dokładnie ta liczba. Gratulacje!")
            odgadnieta = true;
        }

        else if (liczba > proba){
            alert("Niee, moja liczba jest WIĘKSZA od Twojej.")
        }

        else{
            alert("Niee, moja liczba jest MNIEJSZA od Twojej.")
        }
        
    } while (!odgadnieta);
}

function load(){

    clock();

    document.getElementById("zgadywankaStart")
    .addEventListener("click", zgadnijLiczbe, false);

    document.getElementById("sprawdzarkaPrzycisk")
        .addEventListener("click", sprawdzPole, false);
}