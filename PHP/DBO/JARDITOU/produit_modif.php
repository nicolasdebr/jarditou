<?php
include("entete.php");
?>
<body> 

<?php
include("entete2.php");

require "essais/connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase(); // Appel de la fonction de connexion
$pro_id = $_GET["id"];
$requete = "SELECT * FROM produits WHERE pro_id= $pro_id ";
 
$result = $db->query($requete);
$produit = $result->fetch(PDO::FETCH_OBJ);

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
}

$a = "SELECT * FROM categories";
$gne = $db->query($a);
//$requete = "SELECT * FROM produits ";
 

?>
<h1> Formulaire de modification </h1>
<form method="POST" action="produit_modif_script.php">
                        <div class="col-md-12 formgroup">
                    
                             <fieldset>
                                              <!-- Champ ID -->

                              <label for="pro_id">ID :</label>
                              <input type="text" name="id"id="pro_id"value ="<?php echo $produit->pro_id ?>" class="form-control" readonly > 

                                            <!-- Champ Categorie -->

                                 <label>Catégorie :</label><br><select name="pro_cat_id" id="sujet"  >
                                       <?php while ($cat= $gne->fetch(PDO::FETCH_OBJ)) 
                                       {
                                         echo "<option value =$cat->cat_id >".$cat->cat_nom."</option>";
                                       }
                                       ?>
                                      </select><br>

                                            <!-- Champ references -->  

                             <label for="pro_ref">Reference du produit :</label>
                                      <input type="text" name="references"id="pro_ref"value ="<?php echo $produit->pro_ref ?>" class="form-control" > 

                                              <!-- Champ Libellé -->

                            <label for="pro_libelle">Libellé :</label>
                            <input type="text" name="libelle"id="pro_libelle"value ="<?php echo $produit->pro_libelle ?>" class="form-control" > 

                                              <!-- Champ description --> 
                                              
                            <label for="pro_description">Description du produit :</label>
                            <textarea  name="description"id="pro_description" <?php echo $produit->pro_description ?> class="form-control" ><?php echo $produit->pro_description ?></textarea>

                                              <!-- Champ prix -->

                            <label for="pro_prix">Prix du produit :</label>
                            <input type="text" name="prix"id="pro_prix"value ="<?php echo $produit->pro_prix ?>" class="form-control" > 

                                              <!-- Champ stock --> 

                            <label for="pro_stock">Stock disponible :</label>
                            <input type="text" name="stock"id="pro_stock"value ="<?php echo $produit->pro_stock ?>" class="form-control" >     
                            
                                            <!-- Champ Couleur --> 

                            <label for="pro_couleur">Couleur du produit :</label>
                            <input type="text" name="couleur"id="pro_couleur"value ="<?php echo $produit->pro_couleur ?>" class="form-control" >    
                            
                                            <!-- champ Bloque -->
                                <div class="form-row">
                                <div class ="col-3">  
                                <label for="bloque">Produit bloqué  : </label>
                                </div>
                                <div class="col-2">
                                  
                                <input type="radio" id="ouibloque" name="bloque" value="1">
                                  <label for="ouibloque">oui</label>
                                </div>

                                <div class = col-2>
                                  <input type="radio" id="nonbloque" name="bloque" value="3" checked>
                                  <label for="nonbloque">non</label>
                                </div>
                                </div>

                                            <!-- Champ date d'ajout -->
                                    <div>
                                        <label for="pro_d_ajout"><?php  echo "Date d'ajout : ".$produit->pro_d_ajout; ?></label>    
                                    </div>
                                            <!-- Champ modif du produit -->
                                    <div>
                                         <label for="pro_d_modif"><?php echo "Date de modification : ".$produit->pro_d_modif;?></label>    
                                    </div>
                           

                                            <!-- Champ Bouton envoi -->

                                        <input type="submit" value="Envoyer" class="btn btn-primary" id="bouton_envoi">
                                        <a href=<?php echo "detail.php?id=".$produit->pro_id ?>> <input  value="Retour" class="btn btn-danger"></a>    
                                        
<?php
include("pieddepage.php");
?>