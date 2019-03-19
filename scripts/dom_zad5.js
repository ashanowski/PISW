var HelpArray = [
    "Wpisz tu swoje imię",
    "Wpisz tu swój adres e-mail",
    "Uzupełnij to pole o swoją opnię",
    "Zresetuj formularz",
    "Wyślij swoją opnię",
    ""
]

function init() {
    helpText = document.getElementById("zad5_pomoc");

    registerListeners(document.getElementById("imie"), 0);
    registerListeners(document.getElementById("email"), 1);
    registerListeners(document.getElementById("opinia"), 2);
    registerListeners(document.getElementById("reset"), 3);
    registerListeners(document.getElementById("submit"), 4);
}


function registerListeners(object, messageNumber){
    object.addEventListener( "focus",
        function() {helpText.innerHTML = HelpArray[ messageNumber ]; },
        false);

    object.addEventListener( "blur",
        function() { helpText.innerHTML = helpArray[ 5 ]; },
        false);
}

var form = document.getElementById("zad5_form");

form.addEventListener("submit", 
    function() {
        return confirm("Na pewno wysłać?");
    }, false);

form.addEventListener("reset", 
    function() {
        return confirm("Na pewno zresetować formularz?");
    }, false);


window.addEventListener( "load", init, false);