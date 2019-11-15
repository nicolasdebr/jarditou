<?php
if($_POST){
$id = $_POST["id"];
$reference = $_POST["references"];    
$libelle = $_POST["libelle"];    
$description = $_POST["description"];    
$prix = $_POST["prix"];    
$stock = $_POST["stock"];    
$couleur = $_POST["couleur"];    
$bloque = $_POST["bloque"];    
$mofification = 0;

// CHamp controle reference //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(empty($reference)){

echo "veuillez saisir la référence du produit"."<br>";

}
else{
    echo "Reference : ".$reference."<br>";
    $modification = $modification + 1 ;
}


// Champ controle libelle///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(empty($libelle)){

    echo "veuillez saisir le libellé du produit"."<br>";
    
    }
    else{
        echo "Libellé du produit : ".$libelle."<br>";
        $modification = $modification + 1 ;

    }

// Champ controle description /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    if(empty($description)){

        echo "veuillez saisir la description du produit"."<br>";
        
        }
        else{
            echo "Description : ".$description."<br>";
            $modification = $modification + 1 ;

        }

// Champ controle prix ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if(empty($prix)){

    echo "veuillez saisir le prix du produit"."<br>";
    
    }

else if(!preg_match("/[0-9]{1,9}/",$prix)){

    echo " Format du prix invalide"."<br>";
}


    else{
        echo "Prix : ".$prix."<br>";
        $modification = $modification + 1 ;

    }

// Champ controle stock ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if($stock == ""){

    echo "veuillez saisir la quantité en stock de ce produit"."<br>";
    
    }

else if (!preg_match("/[0-9]{1,9}/",$stock)){

    echo "Format du stock invalide"."<br>";
}

    else{
        echo "Stock : ".$stock."<br>";
        $modification = $modification + 1 ;

    }
// Champ controle couleur /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(empty($couleur)){

        echo "veuillez saisir la couleur du produit"."<br>";
        
        }
else if(!preg_match("/[a-zA-Z]./",$couleur))  {

    echo "Format de la couleur invalide"."<br>";
}      
else{
            echo "Couleur : ".$couleur."<br>";
            $modification = $modification + 1 ;

     }
// Champ controle bloque ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($bloque == 3){
    $bloque = null;
}
}

// Condition pour que l'enregistrement dans la base de donnée soit éffectué
if($modification >= 6){

    require "essais/connexion_bdd.php";

  $db=connexionBase();


   	
$requete = $db->prepare("UPDATE produits SET pro_ref= :reference,pro_libelle = :libelle,pro_description = :description,pro_prix = :prix,pro_stock = :stock,pro_couleur = :couleur,pro_d_modif = :datemodif,pro_bloque=:bloque WHERE pro_id = :id");
$requete->bindValue(":reference", $reference,PDO::PARAM_STR);
$requete->bindValue(":libelle", $libelle,PDO::PARAM_STR);
$requete->bindValue(":description", $description,PDO::PARAM_STR);
$requete->bindValue(":prix", $prix,PDO::PARAM_STR);
$requete->bindValue(":stock", $stock,PDO::PARAM_INT);
$requete->bindValue(":couleur", $couleur,PDO::PARAM_STR);
$requete->bindValue(":datemodif", date("Y-m-d H:i:s"),PDO::PARAM_STR);
$requete->bindValue(":id", $id,PDO::PARAM_INT);
$requete->bindValue(":bloque", $bloque,PDO::PARAM_STR);

//$requete->bindValue(":bloque", $bloque,PDO::PARAM_INT);


$essai = $requete->execute();
if($essai){

    echo "envoi reussi";
}
else{
    echo "looser";
}
header("Location:liste.php");

}

else {

    echo "Envoi impossible veuillez renseigner les champs svp";
}
 



?>