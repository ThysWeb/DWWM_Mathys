var fille;

document.getElementById("ouvrirFenetre").addEventListener("click",function(){

    fille =  window.open('htmlFille.html','',200,200);

});

document.getElementById("fermerFenetre").addEventListener("click",function(){

    fille.close();

});

document.getElementById("deplacerFenetre").addEventListener("click",function(){

    fille.moveBy(100,100);
    fille.focus();

});

document.getElementById("reduireFenetre").addEventListener("click",function(){

    fille.resizeTo(100,200);
    fille.focus();

});