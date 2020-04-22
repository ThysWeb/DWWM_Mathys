// ===> Saisie

// var i = 1;
// var nom = null;

// while (nom != "") {
//     var nom = prompt("Saissiez le prénom n°" + i + " : ");
//     i++
// }

// ======================================

// ===> Entiers inférieurs à N

// var nb = prompt("Donnez un numéro : ");

// for (let i = 0; nb > i; i++) {
//     console.log(i);
// }

// ======================================

// ===> Somme des entiers inférieurs à N

// var nb = prompt("Donnez un numéro : ");
// var total = 0;
// var i = 0;

// while (i < nb) {
//     total = parseInt(total+i);
//     i++;
//     console.log(total);
// }

// ======================================

// ===> Moyenne

// var i = 1;
// var note = null;
// var somme = 0;
// var moyenne = 0;
// var max = 0;
// var min = 0;

// while (note != 0) {
//     note = prompt("Note n°" + i + " : ");

//     if (i == 1) { // le cas spécial du premier tour pour le min
//         var min = parseInt(note);
//     }

//     if (note < min) {
//         min = parseInt(note);
//     }

//     if (note > max) {
//         max = parseInt(note);
//     }

//     console.log("Note : " + note + "| Max : " + max + " | Min : " + min)
//     somme = somme+parseInt(note);
//     i++;
// }

// i -= 2; // on retire le 0 et la dernière boucle vide
// moyenne = parseInt(somme)/parseInt(i);

// console.log("Il y a " + i + " notes. La moyenne est de " + moyenne + ". La note maximale est " + max + " et la note minimale est " + min);

// ======================================

// ===> Multiples

// var n = prompt("N : ");
// var x = prompt("X : ");

// for (let i = 1; i < parseInt(n) + parseInt(1); i++) {
//     console.log(i + " x " + x + " = " + x*i);
// }

// ======================================

// ===> Calcul du nombre de jeunes, de moyens et de vieux

// var agePersonne = null;
// var ageMoinsDe20 = 0;
// var agePlusDe40 = 0;
// var ageEntreLesDeux = 0;

// while (agePersonne < 100) {
//     agePersonne = prompt("Saissiez un âge (+100 mets fin à la saisie): ");

//     if (agePersonne < 20) {
//         ageMoinsDe20++;
//     }
//     else if (agePersonne > 39) {
//         agePlusDe40++;
//     }
//     else {
//         ageEntreLesDeux++;
//     }
// }

// console.log("Il y a " + ageMoinsDe20 + " personnes de moins de 20 ans.");
// console.log("Il y a " + ageEntreLesDeux + " personnes entre 20 et 40 ans.");
// console.log("Et il y a " + agePlusDe40 + " personnes de plus de 40 ans.");

// ======================================

// ===> Un nombre est-il premier ?

// function nbPremier(nb) {
//     for (let i = 2; i < nb; i++) {
//         if (nb%i == 0) {
//             return false;
//         }
//     }
//     return true;
// }

// var nombre = prompt("Entrez un nombre : ");

// if (nbPremier(parseInt(nombre))) {
//     document.write(nombre + " est un nombre premier.");
// }
// else {
//     document.write(nombre + " n'est pas un nombre premier.");
// }

// ======================================

// ===> Nombre magique

// do {
// var reponse = parseInt(Math.random()*100);
// console.log("La réponse est " + reponse);

// var nb = prompt("Devinez le chiffre : ");

// while (nb != reponse) {
//     if (nb < reponse) {
//         alert("Trop petit");
//         console.log(nb + " est trop petit.");
//     }
//     else {
//         alert("Trop grand");
//         console.log(nb + " est trop grand.");
//     }

//     console.log("Dernier chiffre donné : " + nb);
//     nb = prompt("Devinez le chiffre : ");
// }

// alert("Bien joué!")
// replay = confirm("Veux-tu rejouer ?")
// } while (replay);

// ======================================

// ===> Nombre magique inversé

// on pense à un chiffre et l'ordi doit le deviner
// var nb = null; // le numéro que l'ordi va proposer
// var limiteMax = 100; // la limite max de recherche
// var limiteMin = 1; // la limite min de recherche

// do  { // la boucle de "jeu"
//     nb = parseInt(Math.random() * (limiteMax - limiteMin) + limiteMin); // l'ordinateur choisit un max aléatoire entre le min et le max
//     alert("L'ordinateur propose " + nb);
//     console.log("L'ordinateur propose " + nb);

//     choix = prompt("Plus petit (-), plus grand (+) ou correct (*) ?");

//     if (choix == "+") { // si la réponse est plus grande alors on change limiteMin par le nb choisi par l'ordi
//         limiteMin = nb; 
//     }
//     else if (choix == "-") { // même avec mais avec le max si le nombre est plus petit
//         limiteMax = nb;
//     }

//     console.log("L'ordinateur va chercher entre " + limiteMin + " et " + limiteMax);
// } while (choix != "*");

// alert("L'ordinateur a trouvé le bon numéro!");