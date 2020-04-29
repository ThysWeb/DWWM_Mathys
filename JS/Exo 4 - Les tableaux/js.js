// ===> Exo 1

// function creerTab(nb)
// {
//     tab = new Array(nb);
//     return tab;
// }

// function remplissageTab(tab)
// {
//     for (let i=0; i<tab.length; i++)
//     {
//         var contenuTab = prompt("Entrez le contenu n° " + (i+1));
//         tab[i] = contenuTab;
//     }
//     return tab;
// }

// function afficheTab(tab)
// {
//     for (let i=0; i<tab.length; i++ )
//     {
//         document.write("<br>" + tab[i]);
//     }
// }

// var nb = prompt("Entrez la taille de votre tableau : ");
// var tableau = creerTab(parseInt(nb));
// tableau = remplissageTab(tableau);
// tableau = afficheTab(tableau);


// ======================================


// ===> Exo 2

// function getInteger()
// {
//     do {
//         var nb = prompt("Entrez un nombre : ");
//         nb = parseFloat(nb);        /* si on utilise parseInt ici, quand on rentre une décimale il l'arrondit au chiffre en dessous donc le while ne servirait à rien */
//     } while (!(Number.isInteger(nb)))

//     return nb;
// }

// function initTab()
// {
//     var nb = getInteger(); /* verif que c'est un entier */
//     tab = new Array(nb);
//     return tab;
// }

// function saisieTab(tab)
// {
//     alert("Saisissez le contenu du tableau : ");  /* alert indicative pour l'utilisateur */
//     for (let i=0; i<tab.length; i++)                /* tab.length pour connaitre la taille du tableau */
//     {
//         var contenuTab = getInteger();          /* on remplit le tableau avec le chiffre que vient de saisir l'utilisateur */
//         tab[i] = contenuTab;
//     }
//     return tab;
// }

// function afficheTab(tab)
// {
//     for (let i=0; i<tab.length; i++ )
//     {
//         document.write("<br>" + tab[i]);
//     }
// }

// function rechercheTab(tab)
// {
//     var n = getInteger();
//     document.write("<br>" + tab[n-1]); /* ici n-1 car l'utilisateur pas censé savoir que la première case du tableau s'appelle 0 */
// }

// function infoTab(tab)
// {
//     var max = 0;
//     var somme = 0;
//     var moyenne = 0;
    
//     for (let i=0; i<tab.length; i++)
//     {
//         if (tab[i] > max)
//         {
//             max = tab[i];
//         }
//         somme = somme + tab[i];
//     }

//     moyenne = somme/tab.length;
//     document.write("<br>Le maximum des postes est " + max + " et la moyenne de tout les postes est de : " + moyenne + " .");
// }

// alert("Entrez la taille de votre tableau : ")
// var tableau = initTab();
// tableau = saisieTab(tableau);
// alert("1 - Affichage du contenu de tous les postes du tableau \n2 - Affichage du contenu d'un poste dont l'index est saisi \n3 - Affichage du maximum et de la moyenne des postes du tableau");
// var choix = prompt("Entrer votre choix du menu : ");

// switch (choix)
// {
//     case "1" :
//         document.write("Affichage du contenu de tous les postes du tableau : ");
//         afficheTab(tableau);
//         break;

//     case "2" :
//         document.write("Affichage du contenu d'un poste dont l'index est saisi : ");
//         rechercheTab(tableau);
//         break;

//     case "3" :
//         document.write("Affichage du maximum et de la moyenne des postes du tableau : ");
//         infoTab(tableau);
//         break;
// }

// ======================================


// ===> Exo 3



