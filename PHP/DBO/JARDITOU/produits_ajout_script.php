<?php
if($_POST){

$aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");

$reference = $_POST["references"];    
$libelle = $_POST["libelle"];    
$description = $_POST["description"];    
$prix = $_POST["prix"];    
$stock = $_POST["stock"];    
$couleur = $_POST["couleur"];    
$bloque = $_POST["bloque"];
$categorie = $_POST["pro_cat_id"];    
$validation = 0;

// Champ controle reference //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(empty($reference)){

echo "veuillez saisir la référence du produit"."<br>";

}
else{
    echo "Reference : ".$reference."<br>";
    $validation= $validation + 1;
}


// Champ controle libelle///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(empty($libelle)){

    echo "veuillez saisir le libellé du produit"."<br>";
    
    }
    else if(!preg_match("/[_a-zA-Z- ].[0-9]*/",$libelle)){

        echo " Format du libelle invalide"."<br>";
    }
    else{
        echo "Libellé du produit : ".$libelle."<br>";
        $validation= $validation + 1;

    }

// Champ controle description /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    if(empty($description)){

        echo "veuillez saisir la description du produit"."<br>";
        
        }
        else{
            echo "Description : ".$description."<br>";
            $validation= $validation + 1;

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
        $validation= $validation + 1;

    }

// Champ controle stock ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(empty($stock)){

    echo "veuillez saisir la quantité en stock de ce produit"."<br>";


     }

else if (!preg_match("/[0-9]{1,9}/" ,$stock)){

    echo "Format du stock invalide"."<br>";
}

    else{
        echo "Stock : ".$stock."<br>";
        $validation= $validation + 1;

var_dump($stock);
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
            $validation= $validation + 1;

     }
//Champ controle photo /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// On extrait le type du fichier via l'extension FILE_INFO 
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mimetype = finfo_file($finfo, $_FILES["fichier"]["tmp_name"]);
finfo_close($finfo);
 
 
if (in_array($mimetype, $aMimeTypes))
{

    $extension = substr(strrchr($_FILES["fichier"]["name"], "."), 1);
    $validation= $validation + 1;

} 
else 
{
   // Le type n'est pas autorisé, donc ERREUR
 
   echo "Type de fichier non autorisé";    
   exit;
}
if($bloque == 3){
    $bloque = null;
} 

}




    require "essais/connexion_bdd.php";

  $db=connexionBase();

if( $validation >= 7){
   	
$requete = $db->prepare("INSERT INTO produits (`pro_cat_id`,`pro_ref`,`pro_libelle`,`pro_description`,`pro_prix`,`pro_stock`,`pro_couleur`,`pro_photo`,`pro_d_ajout`,`pro_bloque`) VALUES (:categorie,:reference, :libelle,:description,:prix,:stock,:couleur,:photo,:dateajout,:bloque)");
$requete->bindValue(":reference", $reference,PDO::PARAM_STR);
$requete->bindValue(":libelle", $libelle,PDO::PARAM_STR);
$requete->bindValue(":description", $description,PDO::PARAM_STR);
$requete->bindValue(":prix", $prix,PDO::PARAM_STR);
$requete->bindValue(":stock", $stock,PDO::PARAM_INT);
$requete->bindValue(":couleur", $couleur,PDO::PARAM_STR);
$requete->bindValue(":categorie", $categorie,PDO::PARAM_STR);
$requete->bindValue(":dateajout", date("Y-m-d"),PDO::PARAM_STR);
$requete->bindValue(":photo",$extension ,PDO::PARAM_STR);
$requete->bindValue(":bloque",$bloque ,PDO::PARAM_STR);

//$requete->bindValue(":bloque", $bloque,PDO::PARAM_INT);


$essai = $requete->execute();
if($essai){

$id = $db->lastInsertId();
move_uploaded_file($_FILES["fichier"]["tmp_name"], "jarditou_photos/$id.$extension");      

header("Location:liste.php");
}
else{
    echo "looser";
}

}




?>



