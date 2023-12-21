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
    echo                "<a href='index.php' >";
    echo                    "<picture>";
    echo                        "<img src='images/logo.png' alt='' />";
    echo                    "</picture>";
    echo                "</a>";
    echo            "</li>";
    echo            "<li><h1>Bienvenue au MELOSHOP</h1></li>";
    echo            "<li><a href='' >Panier</a></li>";
    echo        "</ul>";
    echo    "</nav>";
    echo "</header>";
    
    $link=mysqli_connect($host,$user,$pass,$bdd) or die( "Impossible de se connecter à la base de
    données");
    $query = "SELECT * FROM $nomtable";
    $result= mysqli_query($link,$query);
	
	echo "<h2 class='slogan'>Vous rêvez de ce CD ? N'hésitez plus ...</h2>";
    echo "<div class='main-content'>";
	echo "<div class='mesCD'>";
    while ($donnees=mysqli_fetch_assoc($result)) {
        $ch1=$donnees["Image"];
        $ch2=$donnees["Titre"];
        $ch3=$donnees["Auteur"];
		$ch4=$donnees["Prix"];
		echo "<div class='unCD'>";
        echo 	"<picture>";
        echo   		"<img src='$ch1' alt='' />";
        echo 	"</picture>";
        echo 	"<h1> $ch2 </h1>";
        echo 	"<p class='chanteur'> $ch3 </p>";
		echo    	"<div class='shop'>";
		echo 			"<p> Prix : $ch4 € </p>";
		echo 			"<button> Acheter </button>";
		echo    	"</div>";
        echo 	"<br />";
		echo "</div>";
    }
	echo "</div>";
    echo "</div>";
    echo "</body>";
?>