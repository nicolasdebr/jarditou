<?php

session_start();
 
$_SESSION["login"] = "webmaster";
$_SESSION["mdp"] = "123";




?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

        <form method="POST" action="sessions.php">

    <label for="login">Veuillez saisir votre identifiant</label>
    <input type="text" id="login" name="id">

    <label for="mdp">Veuillez saisir votre mot de passe</label>
    <input type="text" id="mdp" name="password">



    <input type="submit" value="Envoyer" class="btn btn-primary" id="bouton_envoi">



</form>





    
</body>
</html>