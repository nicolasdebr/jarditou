

// creation d'une fonction se lançant au moment du click sur le boutton

document.getElementById('formulaire').addEventListener('submit', function(event){


suppression();

function suppression() {

var attention = confirm("Etes vous sur de vouloir supprimer ce produit?");

// En cas d'annulation pas de suppresion grace à preventdefault et retour à la liste des produits
if(attention == false){
    event.preventDefault();
    window.location.assign("http://127.0.0.1/PHP/DBO/liste.php");

    }

// En cas de confirmation suppression du produit selectionné et retour à la lise des produits    
else{

    window.location.assign("http://127.0.0.1/PHP/DBO/detail_script.php"); 


}
}
});