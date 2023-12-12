<?php
    $bdd= "nelduayen_bd"; // Base de données
    $host= "lakartxela.iutbayonne.univ-pau.fr";
    $user= "nelduayen_bd"; // Utilisateur
    $pass= "nelduayen_bd"; // mp
    $nomtable= "ProjetCD"; /* Connection bdd */

    echo "<head>";
    echo    "<link rel='stylesheet' type='text/css' href='style.css' media='screen' />";
    echo "</head>";

    echo "<body>";
    echo "<header>";
    echo    "<nav>";
    echo        "<ul>";
    echo            "<li>";
    echo                "<a>";
    echo                    "<picture>";
    echo                        "<img src='images/logo.avif' alt='' />";
    echo                    "</picture>";
    echo                "</a>";
    echo            "</li>";
    echo            "<li><a href='' >Panier</a></li>";
    echo            "<li><a href='' >réalisations</a></li>";
    echo            "<li><a href='' >services</a></li>";
    echo            "<li><a href=''>contact</a></li>";
    echo        "</ul>";
    echo    "</nav>";
    echo "</header>";
    
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
    echo "</body>"
?>