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
        $ch1=$donnees["Nom"];
        $ch2=$donnees["Auteur"];
        $ch3=$donnees["Description"];
        print "$ch1, ";
        print "$ch2, ";
        print "$ch3, ";
    }
    echo '<form action="login.php" method="post">';
    echo 'Votre login : <input type="text" name="login">';
    echo '<br />';
    echo 'Votre mot de passe : <input type="password" name="pwd"><br />';
    echo '<input type="submit" value="Connexion">';
    echo '</form>'
?>