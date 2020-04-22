var nom = document.getElementById("nom");
nom.addEventListener("input", verif);

var prenom = document.getElementById("prenom");
prenom.addEventListener("input", verif);

var codePostal = document.getElementById("cp");
codePostal.addEventListener("input", verif);

var telephone = document.getElementById("tel");
telephone.addEventListener("input", verif);

var mail = document.getElementById("mail");
mail.addEventListener("input", verif);

var mdp = document.getElementById("mdp");
mdp.addEventListener("input", verif);

var eye = document.getElementById("eye");
eye.addEventListener("click", afficheMdp);

var confirma = document.getElementById("confirma");
confirma.addEventListener("input", verifMdp);

function verifMdp(event) {

    var myInput = event.target;
    var mdp = document.getElementById("mdp");
    var imgVerte = (myInput.parentNode).getElementsByClassName("imgVerte")[0];
    var imgRouge = (myInput.parentNode).getElementsByClassName("imgRouge")[0];
    var message = (myInput.parentNode).getElementsByClassName("message")[0];

    if (myInput.value=="") {

        imgVerte.style.visibility = "hidden";
        imgRouge.style.visibility = "hidden";
        message.innerHTML = "champ manquant";
    } else if (myInput.value===mdp.value) {
        imgVerte.style.visibility = "visible";
        imgRouge.style.visibility = "hidden";
        message.innerHTML = "";
    } else {
        imgVerte.style.visibility = "hidden";
        imgRouge.style.visibility = "visible";
        message.innerHTML = "format incorrect";
    }
}

function afficheMdp()
{
    if (mdp.type==="password")
    {
        mdp.type = "text";
    }
    else {
        mdp.type = "password";
    }
}

function verif(event) {
    
    var myInput = event.target;

    var imgVerte = (myInput.parentNode).getElementsByClassName("imgVerte")[0];
    var imgRouge = (myInput.parentNode).getElementsByClassName("imgRouge")[0];
    var message = (myInput.parentNode).getElementsByClassName("message")[0];

    if (myInput.value=="") {

        imgVerte.style.visibility = "hidden";
        imgRouge.style.visibility = "hidden";
        message.innerHTML = "champ manquant";
    } else if (!myInput.checkValidity()) {

        imgVerte.style.visibility = "hidden";
        imgRouge.style.visibility = "visible";
        message.innerHTML = "format incorrect";
    } else {
        imgVerte.style.visibility = "visible";
        imgRouge.style.visibility = "hidden";
        message.innerHTML = "";
    }
}