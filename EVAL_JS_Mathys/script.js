//let = permet d’utiliser une variable sans devoir l’instance a chaque fois
let capital 
let taux
let duree
let mensualite
let cout

// on recupere les input et on declenche les evenements pour faire les controles
var lesInputs = document.getElementsByTagName('input');
for (i = 0; i < lesInputs.length; i++)
    lesInputs[i].addEventListener("input", verif);
//Gestion des erreurs
var erreurs = {
    "capital": 0,
    "taux": 0,
    "duree": 0,
    "mensualite": 0,
    "cout": 0
}

//fonction qui remet a 0 le formulaire
function annule(){
    event.preventDefault()
}

function verif(event) {
    // permet de controller la validité d'un champ du formulaire
    // on recupere l'input sur lequel faire la verification
    var monInput = event.target;
    //on recupere les elements correspondant à l'input
    var message = (monInput.parentNode).getElementsByClassName('message')[0];

    if (monInput.value == '') {
        // si le champ est vide, on affiche rien
        message.innerHTML = "champ manquant";
        erreurs[monInput.name]=0;
    } else if (!monInput.checkValidity()) {
        // force le test du pattern sur l'input
        message.innerHTML = "Format incorrect";
        erreurs[monInput.name]=0;
    } else
    {
        message.innerHTML = "";
        erreurs[monInput.name]=1;
    }
    ActiveValider();
}

function ActiveValider() {
    // verifie la validité de tout le formulaire
    document.getElementById('submit').disabled = false;
    for (var key in erreurs) {
        if (erreurs[key]==0)
        document.getElementById('submit').disabled =true;
    }
}

//Fonction qui va permettre de calculer le cout de la mensualité  mais qui ne fonctionne pas :/
function mensualite(){
    //$("#nomVar") = permet d’appeler les ID des labels dans les pages html
    $("#mensualite") = ($("#capital")*$("#taux")/12)/(1-Math.pow(1+$("#taux")/12, $("#duree"))
    //mensualite = (capital * taux/12)/(1 - Math.pow(1 + taux/12, -duree))
}