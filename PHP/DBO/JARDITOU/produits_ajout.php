<?php
include("entete.php");
?>

<body>
<?php
include("entete2.php");



require "essais/connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase(); // Appel de la fonction de connexion
$a = "SELECT * FROM categories";
$gne = $db->query($a);
$requete = "SELECT * FROM produits ";
 
$result = $db->query($requete);
$produit = $result->fetch(PDO::FETCH_OBJ)
?>   
<br>
<h1>Formulaire d'ajout</h1>

<div class="row p-3">
                <div class="p-4 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    
                    <hr>
                    
                    
                    <!-- Debut formulaire-->
                    
                    
                    <form method="POST" action="produits_ajout_script.php" enctype="multipart/form-data">
                        <div class="col-md-12 col-12 text-center formgroup">
                    
                             <fieldset>
                                              <!-- Champ ID 

                              <label for="pro_ref">ID :</label>
                              <input type="text" name="id"id="pro_id"value ="" class="form-control"  > 
-->
                                            <!-- Champ Categorie -->

                                            <label>Catégorie :</label><br><select name="pro_cat_id" id="sujet"  >
                                       <?php while ($cat= $gne->fetch(PDO::FETCH_OBJ)) 
                                       {
                                         echo "<option value =$cat->cat_id >".$cat->cat_nom."</option>";
                                       }
                                       ?>
                                      </select>
                                        <br>

                                            <!-- Champ references -->  

                             <label for="pro_ref">Reference du produit :</label>
                                      <input type="text" name="references"id="pro_ref"value ="" class="form-control" > 

                                              <!-- Champ Libellé -->

                            <label for="pro_libelle">Libellé :</label>
                            <input type="text" name="libelle"id="pro_libelle"value ="" class="form-control"  > 

                                              <!-- Champ description --> 
                                              
                            <label for="pro_description">Description du produit :</label>
                            <textarea  name="description"id="pro_description" placeholder="" class="form-control" ></textarea>

                                              <!-- Champ prix -->

                            <label for="pro_prix">Prix du produit :</label>
                            <input type="text" name="prix"id="pro_prix"value ="" class="form-control"  > 

                                              <!-- Champ stock --> 

                            <label for="pro_stock">Stock disponible :</label>
                            <input type="text" name="stock"id="pro_stock"value ="" class="form-control" >     
                            
                                            <!-- Champ Couleur --> 

                            <label for="pro_couleur">Couleur du produit :</label>
                            <input type="text" name="couleur"id="pro_couleur"value ="" class="form-control" >    
                            
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
                                            <!-- Champ ajout photo -->
                                            
                                       <div class="form-group">     
                                            <label for="photo"> Photo du produit ajouté : </label>
                                            <input type="file"class="form-control-file" name="fichier" id ="photo"> 
                                       </div> 

                                            <!-- Champ date d'ajout -->
                                    <div>
                                        <label for="pro_d_ajout"><?php  echo "Date d'ajout : ". date("Y-m-d") ?></label>    
                                    </div>
                                            <!-- Champ modif du produit -->
                                    <div>
                                         <label for="pro_d_modif"><?php echo "Date de modification : ".$produit->pro_d_modif;?></label>    
                                    </div>
                           

                                            <!-- Champ Bouton envoi -->
                                       <div class="row">
                                        <div class="col-4">
                                        <input type="submit" value="Envoyer" class="btn btn-primary" id="bouton_envoi">
                                        </div>
                                        <div class="col-4">
                                        <input type="reset" value="Annuler" class="btn btn-primary">            
                                        </div>
                                        <div class="col-4">
                                       <a href="liste.php"> <input  value="Retour à la liste" class="btn btn-primary .btn-xs" id="bouton_envoi"></a>
                                        </div>
                                   </div>
                     
                    






                      </div>
                    </form>
                    

   
                
                
                
                
                
                
                
                
                </div>
                        <!--Colonne droite-->

            </div>
                        

            <?php
include("pieddepage.php");

?>