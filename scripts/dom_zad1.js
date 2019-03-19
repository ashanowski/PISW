var div = document.getElementById("zadanie1");

var h3 = document.createElement("h3");
var tekst_h3 = document.createTextNode("Sprawdzarka ciągu znaków");

var p1 = document.createElement("p");
var tekst_p1 = document.createTextNode("Wpisz swój ciąg znaków, a program powie, czy jest to tylko napis, czy liczba - jeśli liczba, to powie jakiego typu!");

var btn = document.createElement("button");
btn.innerHTML = "Sprawdź!";
btn.setAttribute("onclick", "sprawdzPole()")

var inpt = document.createElement("input");
inpt.setAttribute("placeholder", "Wpisz ciąg znaków...");
inpt.setAttribute("type", "text")
inpt.setAttribute("id", "pole")

var p_wynik = document.createElement("p");
var wynik = document.createTextNode("Tutaj pojawi się wynik");
p_wynik.setAttribute("id", "wynikSprawdzPole")


p1.appendChild(tekst_p1);
h3.appendChild(tekst_h3);
p_wynik.appendChild(wynik);


div.appendChild(p1);


div.insertBefore(h3, div.childNodes[2]);

div.appendChild(inpt);

div.appendChild(document.createElement("label"));
div.replaceChild(btn, div.childNodes[6]);

div.appendChild(p_wynik);