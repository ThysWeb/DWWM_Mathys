// ===> Test variable

// var nom = prompt("Entrez votre nom");
// var prenom = prompt("Entrez votre prénom");

// if (window.confirm("Êtes-vous un homme ?") == true)
// {
//     console.log("Salut " + nom + " " + prenom + ". Alors,comme ça, t'es un homme." );
// }
// else
// {
//     console.log("Salut " + nom + " " + prenom + ". Alors,comme ça, t'es une femme." );
// }

// =====================================================

// ===> Exo Parité

// var nb = prompt('Entrez un nombre');

// if (nb == 0)
// 	{
//   	console.log("On ne peut diviser un nombre par 0 !")
// 	}
// else if (nb%2 == 0)
//   {
//     console.log(nb + " est un chiffre pair.");
//   }
// else {
//   console.log(nb + " est un chiffre impair");
// }

// =====================================================

// ===> Exo Age 

// var annee = prompt('Entrez votre année de naisssance : ');

// if (2020 - annee < 18) {
//     console.log("Tu es mineur");
//   }
// else {
//   console.log("Tu es majeur");
// }

// =====================================================

// ===> Exo Calcul 

// var nb1 = prompt("Numéro 1 : ");
// var ope = prompt("Signe d'opération (+, -, * ou /) : ");
// var nb2 = prompt("Numéro 2 : ");

// if ((nb1 == 0 || nb2 == 0) && ope == "/") {
//   console.log("Divison par 0 impossible!");
//   }
// else if (nb1 == "" || nb2 == "") {
//   console.log("Données vides!");
//   }
// else {
//   switch (ope) {
//       case "+":
//           var res = parseInt(nb1+nb2);
//           console.log("Résultat de l'addition : " + nb1 + ope + nb2 + " ==> " + res);
//           break;

//       case "-":
//           var res = nb1-nb2;
//           console.log("Résultat de la soustraction : " + nb1 + ope + nb2 + " ==> " + res);
//           break;

//       case "*":
//           var res = nb1*nb2;
//           console.log("Résultat : " + nb1 + ope + nb2 + " ==> " + res);
//           break;

//       case "/":
//           var res = nb1/nb2;
//           console.log("Résultat : " + nb1 + ope + nb2 + " ==> " + res);
//           break;

//       default :
//         console.log("Opérateur non reconnu!")
//         break;
//   }
// }

// =====================================================

// ===> Exo Remise

// var pu = prompt("Prix de l'article : ");
// var qtecom = prompt("Quantité de l'article : ");
// var port = 6; // frais de port
// var pap = 0; // prix à payer
// var tot = pu*qtecom; // total

// if (tot > 500) {
//   pap = tot - (tot * (10/100));
// }
// else if (tot > 200) {
//   pap = tot - (tot * (10/100)) + port;
// }
// else if (tot > 100) {
//   pap = tot - (tot * (5/100)) + port;
// }
// else {
//   pap = tot + port;
// }

// console.log("Vous devez payer " + pap + " €.");

// =====================================================

// ===> Exo Participation

var part = 0; // max 50%
var situation = prompt("Célibataire ou marié ? (c/m) ");
var enfant = prompt("Nombre d'enfant(s) : ");
var salaire = prompt("Salaire mensuel : ");

// pour chaque enfant, on ajoute 10% de partipation
if (enfant > 0) {
  part = enfant * 10;
}

// selon si on est célibataire ou marié
if (situation == "c") {
    part += 20
}
else {
    part += 25
}

// si le salaire est faible, on retire 10% de partipation
if (salaire < 1200) {
    part -= 10;
}

// si la participation dépasse 50%, on change la valeur à 50
if (part > 50) {
    part = 50;
}

console.log(part);