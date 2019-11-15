<?php

// recuparation de l'id au moment de l'envoi
$id = $_POST["id"];

require "essais/connexion_bdd.php";
$db=connexionBase();

// requete de suppression
$requete = $db ->prepare("DELETE FROM produits WHERE pro_id= :id ");
$requete->bindValue(":id", $id,PDO::PARAM_INT);

$supprimer =$requete->execute();
// en cas de succès
if($supprimer){

    header("Location:liste.php");

}
//en cas d'echec
else{

    echo "Echec de la supression";

}





?>