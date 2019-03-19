function zadanie3() {
    var paragraf = document.getElementById("zad3_paragraf");

    var czcionka = document.getElementById("zad3_czcionka").value;
    var kolor = document.getElementById("zad3_kolor").value;
    var tlo = document.getElementById("zad3_tlo").value;

    paragraf.style.fontSize = czcionka;
    paragraf.style.color = kolor;

    if (tlo == "kosmos") {
        document.body.style.backgroundImage = 'none'
        document.body.style.backgroundImage = "url(img/space-bg.jpg)"

    }

    else {
        document.body.style.backgroundImage = 'none';
        document.body.style.backgroundColor = tlo;
    }




}
