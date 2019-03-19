function czyNacisniety(event) {
    if (event.altKey){
        alert("Nacisnąłeś razem z ALTem!");
    }

    if (event.ctrlKey){
        alert("Nacisnąłeś razem z CTRLem!");
    }

    if (event.shiftKey){
        alert("Nacisnąłeś razem z SHIFTem!");
    }
}

function sprawdzKodZnaku(event) {
    var wynik = document.getElementById("keypress");
    var char = event.which || event.keyCode;
    
    wynik.innerHTML = "Kod ZNAKU: " + char;
}

function sprawdzKodKlawisza(event) {
    var wynik = document.getElementById("keydown");
    var key = event.keyCode;

    wynik.innerHTML = "Kod KLAWISZA: " + key;
}

function sprawdzPozycje(event) {

    var x_client = event.clientX;
    var y_client = event.clientY;

    var x_screen = event.screenX;
    var y_screen = event.screenY;

    var coords_client = "X = " + x_client + "<br>Y = " + y_client;
    var coords_screen = "X = " + x_screen + "<br>Y = " + y_screen;

    document.getElementById("zad4_pozycja_client").innerHTML = coords_client;
    document.getElementById("zad4_pozycja_screen").innerHTML = coords_screen;
    
}