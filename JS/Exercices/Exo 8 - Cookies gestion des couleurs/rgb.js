// on récupère le body
var bodyElement  =  document.getElementById("idBody");

// on récupère tous les inputs
var inputs = document.querySelectorAll("input");

// on récupère tous les boutons en appelant directement la fonction si l'évènement se produit
document.getElementById("btnRouge").addEventListener("click", function(){changerCouleur(255,0,0)});
document.getElementById("btnVert").addEventListener("click", function(){changerCouleur(0,255,0)});
document.getElementById("btnBleu").addEventListener("click", function(){changerCouleur(0,0,255)});

// on lit le cookie et on l'associe à la variable couleurs
var couleurs = readCookie("couleurActuelle");

if(couleurs != null)
{
    tabCouleurs = couleurs.split(","); // on récupère chaque couleur pour les entrer dans changerCouleur()
    changerCouleur(tabCouleurs[0], tabCouleurs[1], tabCouleurs[2]);
}

// on ajoute un écouteur à chaque input -> qui appelera la fonction
for(let i=0; i<3; i++)
{
    inputs[i].addEventListener("change", function(){
        if(inputs[i].value > 255)
        {
            inputs[i].value = 255;
        }
        changerCouleur(parseInt(inputs[0].value), parseInt(inputs[1].value), parseInt(inputs[2].value))});
}
// fonction qui changera la couleur du body
function changerCouleur(rouge, vert, bleu)
{
    // on modifie le cookie en utilisant la fonction createCookie
    createCookie("couleurActuelle", rouge+","+vert+","+bleu, 3);
    // test
    // alert("la couleur est: "+readCookie("couleurActuelle"));

    // on associe la couleur entrée en paramètre au body 
    bodyElement.style.backgroundColor = "rgb("+rouge+", "+vert+", "+bleu+")";

    inputs[0].value = rouge;
    inputs[1].value = vert;
    inputs[2].value = bleu;
    
}