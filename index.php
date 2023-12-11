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
        $ch1=$donnees["ID"];
        $ch2=$donnees["Titre"];
        $ch3=$donnees["Auteur"];
        echo "<h1> $ch2 </h1>";
        echo "<h2> $ch3 </h2>";
        echo '<br />';
    }
?>