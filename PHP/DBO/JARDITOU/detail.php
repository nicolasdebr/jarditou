<?php
// chargement de html
include("entete.php");
?>
<body> 
 
    
<?php
// chargement de mon navbar
include("entete2.php");

require "essais/connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase(); // Appel de la fonction de connexion
$pro_id = $_GET["id"];
$requete = $db->prepare("SELECT * FROM produits JOIN categories ON categories.cat_id = produits.pro_cat_id  WHERE pro_id= :id");
$requete->bindValue(":id", $pro_id,PDO::PARAM_INT);

$result = $requete->execute();
$produit = $requete->fetch(PDO::FETCH_OBJ);



/*
if (!$result) 
{
    $tableauErreurs = $db->errorInfo();
    echo $tableauErreur[2]; 
    die("Erreur dans la requête");
}
 
if ($result->rowCount() == 0) 
{
   // Pas d'enregistrement
   die("La table est vide");
}*/



?>
<h1>Detail du produit</h1>

<!-- Debut du formulaire -->

<form method="POST" action="detail_script.php" id ="formulaire">
                        <div class="col-md-12 formgroup">
                    
                             <fieldset>
                                              <!-- Champ ID -->

                              <label for="pro_ref">ID :</label>
                              <input type="text" name="id"id="pro_id"value ="<?php echo $produit->pro_id ?>" class="form-control" readonly > 
                                            <!-- Champ catégorie -->
                                        
                                            <label>Catégorie :</label><br>

                                      <input type="text" name="categorie"id="pro_cat_id"value ="<?php echo $produit->cat_nom ?>" class="form-control"readonly > 




                                            <!-- Champ references -->  

                             <label for="pro_ref">Reference du produit :</label>
                                      <input type="text" name="references"id="pro_ref"value ="<?php echo $produit->pro_ref ?>" class="form-control"readonly > 

                                              <!-- Champ Libellé -->

                            <label for="pro_libelle">Libellé :</label>
                            <input type="text" name="libelle"id="pro_libelle"value ="<?php echo $produit->pro_libelle ?>" class="form-control" readonly > 

                                              <!-- Champ description --> 
                                              
                            <label for="pro_description">Description du produit :</label>
                            <textarea  name="description"id="pro_description" placeholder="<?php echo $produit->pro_description ?>" class="form-control"readonly ></textarea>

                                              <!-- Champ prix -->

                            <label for="pro_prix">Prix du produit :</label>
                            <input type="text" name="prix"id="pro_prix"value ="<?php echo $produit->pro_prix ?>" class="form-control" readonly > 

                                              <!-- Champ stock --> 

                            <label for="pro_stock">Stock disponible :</label>
                            <input type="text" name="stock"id="pro_stock"value ="<?php echo $produit->pro_stock ?>" class="form-control"readonly >     
                            
                                            <!-- Champ Couleur --> 

                            <label for="pro_couleur">Couleur du produit :</label>
                            <input type="text" name="couleur"id="pro_couleur"value ="<?php echo $produit->pro_couleur ?>" class="form-control"readonly >    
                            
                                            <!-- champ Bloque 
                                <div class="form-row">
                                <div class ="col-3">  
                                <label for="bloque">Produit bloqué  : </label>
                                </div>
                                <div class="col-2">
                                  
                                <input type="radio" id="ouibloque" name="bloque" value="1">
                                  <label for="ouibloque">oui</label>
                                </div>

                                <div class = col-2>
                                  <input type="radio" id="nonbloque" name="bloque" value="0" checked>
                                  <label for="nonbloque">non</label>
                                </div>
                                </div>
-->
                                            <!-- Champ date d'ajout -->
                                    <div>
                                        <label for="pro_d_ajout"><?php  echo "Date d'ajout : ".$produit->pro_d_ajout; ?></label>    
                                    </div>
                                            <!-- Champ modif du produit -->
                                    <div>
                                         <label for="pro_d_modif"><?php echo "Date de modification : ".$produit->pro_d_modif;?></label>    
                                    </div>
                           

                                            <!-- Champ Bouton envoi -->
                                <div class="row">
                                        <div class="col-4">
                                       <a href="liste.php"> <input  value="Retour à la liste" class="btn btn-primary" id="bouton_envoi"></a>
                                        </div>
                                        <div class ="col-4">
                                       <a href=<?php echo "produit_modif.php?id=".$produit->pro_id ?>> <input  value="formulaire de modif" class="btn btn-success"></a>
                                       </div>
                                       <div class = "col-4">  
                                        <input onclick="controle()" type ="submit" value="Supprimer ce produit" class="btn btn-danger" id="bouton_envoi">
                                       </div>
                                </div>

<script src ="detailcontrole.js"></script>
<?php
include("pieddepage.php");
?>