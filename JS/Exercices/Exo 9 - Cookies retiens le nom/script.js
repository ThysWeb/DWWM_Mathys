// Dans un premier, on véirfie si le cookie existe déjà. Si oui, on change l'affichage directement
if (readCookie("dataName")) {
    affichage(1);
}

// On récupère le formulaire et on ajoute un listener sur l'envoi
document.identity.addEventListener("submit", function() {
    nom = document.getElementById("nom").value;
    prenom = document.getElementById("prenom").value;

    if (nom != "" && prenom != "") {
        createCookie("dataName", nom + "." + prenom, 360)
        affichage(1);
    }
});

// On ajoute un listener sur le bouton de suppression, qui supprime le cookie et change l'affichage
document.getElementById("delete").addEventListener("click", function () {
    eraseCookie("dataName");
    affichage(2);
});

// Fonction : modifie l'affichage selon le mode en argument
function affichage(mode) {
    if (mode == 1) {
        document.getElementById("form").style.display = "none";
        document.getElementById("connected").style.display = "block";

        dataName = readCookie("dataName");
        data =  dataName.split(".");
        document.getElementById("message").innerHTML = 'Bonjour ' + data[0] + ' ' + data[1];
    }
    else {
        document.getElementById("nom").value = "";
        document.getElementById("prenom").value = "";
        
        document.getElementById("connected").style.display = "none";
        document.getElementById("form").style.display = "block";
    }
}
