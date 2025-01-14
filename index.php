<?php
session_start();

    
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}

    $bdd= "ProjetCD";
    $host= "localhost";
    $user= "root"; // Utilisateur
    $pass= ""; // mp
    $nomtable= "ProjetCD"; // Connection bdd
    
    echo "<head>";
    echo "<title>MELOSHOP</title>";
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
    echo            "<li><a href='panier.php'>Panier</a></li>";

    echo        "</ul>";
    echo    "</nav>";
    echo "</header>";

    $link = mysqli_connect($host, $user, $pass, $bdd) or die("Impossible de se connecter à la base de données");
    $query = "SELECT * FROM $nomtable";

    $result= mysqli_query($link,$query);
	
	echo "<h2 class='slogan'>Vous rêvez de ce CD ? N'hésitez plus ...</h2>";
    echo "<div class='main-content'>";
	echo "<div class='mesCD'>";
    while ($donnees=mysqli_fetch_assoc($result)) {
        $ch1 = $donnees["Image"];
        $ch2 = $donnees["Titre"];
        $ch3 = $donnees["Auteur"];
        $ch4 = $donnees["Prix"];
        $id = $donnees["ID"];
        echo "<form method='post' action=''>";
        echo    "<input type='hidden' name='action' value='ajouter'>";
        echo    "<input type='hidden' name='id' value='$id'>";
		echo "<div class='unCD'>";
        echo 	"<picture>";
        echo   		"<a href='selection_cd.php?id=$id'><img src='$ch1' alt='' /></a>";
        echo 	"</picture>";
        echo 	"<h1>$ch2</h1>";
        echo 	"<p class='chanteur'> $ch3 </p>";
		echo    	"<div class='shop'>";
		echo 			"<p> Prix : $ch4 € </p>";
		echo            "<input type='submit' value='Acheter'>";
        echo            "</form>";
        echo '<br />';
		echo    	"</div>";
        echo 	"<br />";
		echo "</div>";
    }
	echo "</div>";
    echo "</div>";

    if(isset($_POST['action']) && $_POST['action']=="ajouter"){
        $id = $_POST['id'];
        array_push($_SESSION['panier'], $id);
        echo "CD ajouté au panier";
    }
    echo "<h2 class='connexion-admin'>Vous êtes administrateur et souhaiter vous connecter ? C'est par ici !</h2>";
    echo "<a href='connexion.html' class='connexion-btn'>CONNEXION</a>";

    echo "</body>";
?>

