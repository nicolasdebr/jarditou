<?php
include("entete.php");
include("entete2.php");


require "essais/connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase(); // Appel de la fonction de connexion
$requete = "SELECT * FROM produits WHERE ISNULL(pro_bloque) ORDER BY pro_id";
 
$result = $db->query($requete);
 
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

 
echo"<h1> Liste de nos produits : </h1>";




echo "<div class=\"p-4 col-12 col-lg-12 table-responsive\">";


// Debut de mon tableau
echo "<table  class =\"table  table-bordered table-striped text-center \">";

// Entetes de chaque colonnes
echo "<thead> 
        <tr> 
                 <th> Photo </th>
                 <th> ID </th>
                 <th> Références </th>
                 <th>Libellé </th>
                 <th>Prix </th>
                 <th>Stock </th>
                 <th>Couleur </th>
                 <th>Ajout </th>
                 <th>Modif </th>
                 
                
              
        </tr>
    </thead> " ;     




// Debut de la boucle me permettant de récupérer chaque ligne dans ma base de donnée

while ($row = $result->fetch(PDO::FETCH_OBJ))
{
    echo"<tr>";
    echo"<td>"."<img src = jarditou_photos/$row->pro_id.$row->pro_photo  width=\"150\" height=\"150\" >" ."</td>";
    echo"<td>".$row->pro_id."</td>";
    echo"<td><a href=\"detail.php?id=".$row->pro_id."\"title=\"".$row->pro_ref."\"</a>".$row->pro_ref."</td>";
    echo"<td>".$row->pro_libelle."</td>";
    echo"<td>".$row->pro_prix."</td>";
    echo"<td>".$row->pro_stock."</td>";
    echo"<td>".$row->pro_couleur."</td>";
    echo"<td>".$row->pro_d_ajout."</td>";
    echo"<td>".$row->pro_d_modif."</td>";
   // echo"<td>".$row->pro_bloque."</td>";


    echo"</tr>";
}




 
echo "</table>"; 
echo "</div>";

include("pieddepage.php");

?>
   
