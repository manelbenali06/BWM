<?php

function check(){
    //On réccupère les username et le password du paylod
    $username = $_POST['username'];
    $password = $_POST['password'];

    //On crée une connexion vers la base de donnée (comme musqli)
    $connexion = new PDO('mysql:host=localhost;dbname=patissor','root', '');

    //On  exécute la requette SQL pour chercher l'utilisateur avec ce $username et $password
    $requete = "SELECT COUNT(id) AS nbr FROM user WHERE username = '$username' AND password ='$password'";
    $requete =  $connexion->query($requete);
    
    //On récupère le résultat de resuete SQL dans $row
    $row = $resultat ->fetch();

    //On vérifie qi nbr > 0 (si un utilisateur a été trouver en base)
    if($row['nbr'] > 0)
    {
        //On rédige vers l'espace client
        header('LOCATION: /espace-client');
        die();
    }
}