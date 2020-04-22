// ===> Table de multiplications

/* function TableMultiplication(nb)
{
    for (let i= 1; i<= 10; i++)
    {
        resultat = nb*i;

        console.log(nb+" x "+i+" = "+resultat);
    }
}
TableauMultiplication(7);*/

// ======================================


// ===> Compter le nombre de lettres

function nbLettre(phrase, lettre) {

    var compteur = 0;
    for (let i=0; i<phrase.length; i++)
    {
        if (phrase[i] == lettre)
        {
            compteur++;
        }
    }
    return compteur;
}
 var phrase = prompt("Entrez une phrase : ");
 var lettre = prompt("Entrez une lettre à rechercher dans la phrase : ");
 var compteur = nbLettre(phrase, lettre);

 document.write("<br> Le nombre de " + lettre + " dans la phrase est de : " + compteur);
 
// ======================================


// ===> Menu

// function tableMultiplication(nb) {

//     for (let i = 1; i<10; i++) {
//         resultat = nb * i;
//         document.write("<br>" + nb + "x" + i + "=" + resultat);
//     }
// }

// function somMoy(nb, somme, compteur)
// {
// while (parseInt(nb) != 0)
// {
//     var nb = prompt("Entrez des nombres entiers (0 arretera la saisie");
//     somme = somme + parseInt(nb);
//     compteur++;
// }

// alert("Somme = " + somme + "; Moyenne = " + somme/compteur + " ;");
// }

// function nbLettre(phrase, lettre) {
    
//     var compteur = 0;
//     for (let i=0; i<phrase.length; i++)
//     {
//         if (phrase[i] == lettre)
//         {
//             compteur++;
//         }
//     }
//     return compteur;
// }


// var choix = prompt("entrez votre option");

// switch (choix)
// {
//     case "1" :
//         var nb = prompt("choisissez un nombre : ");
//         tableMultiplication(parseInt(nb));
//         break;

//     case "2" :
//         var nb = prompt("Entrez des nombres entiers (0 arretera la saisie)");
//         var somme = parseInt(nb);
//         var compteur = 0;
//         somMoy(nb, somme, compteur);
//         break;

//     case "3" :
//         var phrase = prompt("Entrez une phrase : ");
//         var lettre = prompt("Entrez une lettre à rechercher dans la phrase : ");
//         var compteur = nbLettre(phrase, lettre);
//         document.write("<br> Le nombre de " + lettre + " dans la phrase est de : " + compteur);
//         break;

// }

// ======================================


// ===> String Token

// function strtok(str1, str2, n)
// {
//     var tab = str1.split(str2);
//     return (tab[n - 1]);
// }

// var str =  "Mathys;Colin;Steenvoorde";
// document.write(strok(str,";",3));
