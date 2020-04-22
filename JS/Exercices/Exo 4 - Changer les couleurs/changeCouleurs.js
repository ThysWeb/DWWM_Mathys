function changerCouleur(obj)
{
    //Recupérer la couleur actuelle de l'objet
    var color = obj.style.color;

    //En fonction de la couleur actuelle, changer la couleur
    switch(color)
    {
        case"black": titres[k].style.color = "red";break;
        case"red": titres[k].style.color = "yellow";break;
        default: titres[k].style.color = "red";break;
    }
}

var p = document.getElementsByTagName("p");

//Pour chaque paragraphe
for(let i = 0; i< p.length; i++)
{
    //Ajouter evenelent clicl
    p[i].addEventListener("click",function(e)
    {
        changerCouleur(e.target);
    })
}

//Balise Titres
var titresTag = ["h1","h2","h3"];

//Pour chaque balise titre
for(let i = 0; i<titresTag.length;i++)
{
    //Titres correspondants à la balise
    let titres = document.getElementsByTagName(titresTag[i]);

    //Pour chaque titre
    for(let j = 0; j<titres.length; j++)
    {

        //Ajouter evenement click
        titres[j].addEventListener("click",function(e)
        {
            //Pour chaque titre
            for(let k = 0; k<titres.length;k++)
            {
                //Couleur du texte
                let color = titres[k].style.color;

                //Switch changement de couleur
                switch(color)
                {
                    case"black": titres[k].style.color = "red";break;
                    case"red": titres[k].style.color = "yellow";break;
                    case"yellow": titres[k].style.color = "black";break;
                    default: titres[k].style.color = "red";break;
                }
            }
        })
    }
}