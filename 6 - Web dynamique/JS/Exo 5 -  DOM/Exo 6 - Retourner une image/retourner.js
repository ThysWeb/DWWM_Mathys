//on définit nos variables 
var card = document.getElementById("card");
var side = 0; // 0  = recto, 1 = verso

//on affiche ,otre carte et on ahjoue un évènement click
card.innerHTML = "<img src='card_off.jpg' alt=''>";
card.addEventListener("click",turnOver);

// retourne la carte selon ke coté 
function turnOver()
{
    if(side == 0)
    {
        card.innerHTML = "<img src='card_on.jpeg' alt=''>";
        side = 1;

        //appelle turnBack au bout de 3sec
        setTimeout(turnBack, 3000);
    }
    else
    {
        card.innerHTML  = "<img src='card_off.jpg' alt=''>";
        side = 0;
    }
}

//retourne la carte sur le côté original
function turnBack()
{
    if (side == 1)
    {
        card.innerHTML  = "<img src='card_off.jpg' alt=''>";
        side = 0; 
    }
}