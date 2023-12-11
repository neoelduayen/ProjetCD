<?php
    $bdd= "nelduayen_bd"; // Base de données
    $host= "lakartxela.iutbayonne.univ-pau.fr";
    $user= "nelduayen_bd"; // Utilisateur
    $pass= "nelduayen_bd"; // mp
    $nomtable= "ProjetCD"; /* Connection bdd */
    
    $link=mysqli_connect($host,$user,$pass,$bdd) or die( "Impossible de se connecter à la base de
    données");
    $query = "SELECT * FROM $nomtable";
    $result= mysqli_query($link,$query);
    while ($donnees=mysqli_fetch_assoc($result)) {
        echo "<h1> $donnees['Titre'] </h1>";
        echo "<h2> $donnees['Auteur'] </h2>";
        echo '<br />';
    }
?>