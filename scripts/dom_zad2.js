document.getElementsByTagName("p").namedItem("zad2_linki").innerHTML =
    "Na tej stronie znajduje się <b>" + document.links.length + "</b> linków. <br><br>"
    + "Pierwszy link to <b>" + document.links.item(0) + "</b>, ostatni to <b>"
    + document.links.item(4) + "</b";

var ileObrazkow = document.images.length;
var p_obrazki = document.getElementsByTagName("p").namedItem("zad2_obrazki");

if (ileObrazkow == 1){
    p_obrazki.innerHTML = "Na tej stronie jest tylko jeden obrazek";
}
    
else if (ileObrazkow > 1){
    p_obrazki.innerHTML = "Na tej stronie jest <b>" + ileObrazkow + "</b> obrazków";
}

else {
    p_obrazki.innerHTML = "Na tej stronie nie ma żadnego obrazka";
}

var p_formularze = document.getElementById("zad2_formularze");
p_formularze.innerHTML = "Na stronie jest " + document.forms.length + " formularzy.";

var p_anchory = document.getElementById("zad2_anchory");
p_anchory.innerHTML = "W dokumencie znajduje się " + document.anchors.length + 
                      " obiektów-kotwic.";

var obrazki = document.getElementById("zadanie2");

function dodajRamke() {
    for (i=0; i < document.images.length; i++){
        document.images[i].style.border = "5px solid royalblue";
    }
}

function usunRamke(){
    for (i=0; i < document.images.length; i++){
        document.images[i].style.border = "none";
    }
}