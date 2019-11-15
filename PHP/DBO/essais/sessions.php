<?php
session_start();




if($_POST){

$id = $_POST["id"];
$mdp= $_POST["password"];

if(empty($id) && empty($mdp)){

    echo "Identifiants non reconnu";

}
else if( !$id == "webmaster" && !$mdp == "123"  ){

    echo "cette session n'existe pas";
}

else {

header("sessions2.php");

}






}


?>