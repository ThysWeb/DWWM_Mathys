// appel par l'id
var UneDivIdTest = document.getElementById("test");
UneDivIdTest.style.color = "red";

//appel par la classe
var lesClassesToto = document.getElementsByClassName("toto");
for (let i = 0; i < lesClassesToto.length; i++)
    lesClassesToto[i].style.color = "blue";

//appel par type de balise
var lesP = document.getElementsByTagName("p");
for (let i = 0; i < lesP.length; i++)
    lesP[i].style.backgroundColor = "green";

//appel par type sur espace réduit
var lesPInterieurTest = UneDivIdTest.getElementsByTagName("p");
for (let i = 0; i < lesPInterieurTest.length; i++)
    lesPInterieurTest[i].style.backgroundColor = "yellow";

//Modification dynamique
//Changement de couleur sur clic sur liste d'objets
UneDivIdTest.addEventListener("click", changeCouleur);

function changeCouleur() {
    for (let i = 0; i < lesP.length; i++)
        lesP[i].style.backgroundColor = "orange";
}

//Changement de couleur sur clic sur l'objet cliqué
//j'ajoute un listener sur chaque paragraphe
for (let i = 0; i < lesP.length; i++)
lesP[i].addEventListener("click", changeCouleurParagraphe);

function changeCouleurParagraphe(e) {
    eltClique = e.target; // on repere l'element cliqué
    eltClique.style.fontWeight = "bold";
}

//Parcours de la dom
// lesPInterieurTest[0].parentNode  <=> UneDivIdTest
// UneDivIdTest.childNodes[0] <=> lesPInterieurTest[0]

//Ajout d'element HTML
var divIm = document.getElementById("DivIm");
divIm.innerHTML="<img class = 'image' src='adresse.png' alt='adresse'>";
//Trouver la source d'une image
image =document.getElementsByTagName("img");
alert(image[0].src);