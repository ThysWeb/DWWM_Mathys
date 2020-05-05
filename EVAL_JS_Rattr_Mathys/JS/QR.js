
//Contient les solutions aux questions
var lesSolutions={
    "1r": "Panoramix",
    "2r": "Lucky Luke",
    "3r": "Tom",
    "4r": "Kev Adams",
    "5r": "Luffy",
    "6r": "un otaku"
}

function verif(event) {
    // permet de controller la validité d'un champ du formulaire
    // on recupere l'input sur lequel faire la verification
    var monInput = event.target;
    //on recupere les elements correspondant à l'input
    var message = (monInput.parentNode).getElementsByClassName('message')[0];

    if(monInput.value == ''){
        //si le champ est vide on affiche Champ manquant
        message.innerHTML = "Champ manquant";
        tabErreur[monInput.id] = 0;
        input1r.value="";
        input2r.value="";
        input3r.value="";
        input4r.value="";
        input5r.value="";
        input6r.value="";
    } else if (!monInput.checkValidity()){
        // force le test du pattern sur l'input, si réponse incorrect affichage de Format incorrect
        message.innerhTML = "Format incorrect";
        tabErreur[monInput.id] = 0;
        input1r.value="";
        input2r.value="";
        input3r.value="";
        input4r.value="";
        input5r.value="";
        input6r.value="";
    } else { //si tout est pk affichage Bonne réponse
        message.innerHTML = "Bonne réponse";
        tabErreur[monInput.id] = 1;
    }
    verifForm();
}

function verifForm(){
    // verifie la validité de tout le formulaire
    for (var key in tabErreur){
        if (tabErreur[key] == 0)
        return false;
    }
    document.getElementById("soumettre").disabled=false;
    return true;
}


// Fonction reset qui remet les champs de propositions vide
function reset(){
    for(i = 0; i < lesInputs.length; i++){
        lesInputs[i].value="";
    }
}

// Affectation des inputs
var lesInputs = document.getElementsByTagName("input");
for (i=0; i < lesInputs.length; i++) {
    lesInputs[i].addEventListener("change", verif);
}

// Affectation du bouton "Effacer les réponses"
document.getElementById("reset").addEventListener("click", reset);

input1r = document.getElementById("1r");
input2r = document.getElementById("2r");
input3r = document.getElementById("3r");
input4r = document.getElementById("4r");
input5r = document.getElementById("5r");
input6r = document.getElementById("6r");

var tabErreur = {
    "1r": 0,
    "2r": 0,
    "3r": 0,
    "4r": 0,
    "5r": 0,
    "6r": 0
};
