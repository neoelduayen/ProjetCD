<?php
session_start();

$bdd = "nelduayen_bd";
$host = "lakartxela.iutbayonne.univ-pau.fr";
$user = "nelduayen_bd";
$pass = "nelduayen_bd";
$nomtable = "ProjetCD";

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

$link = mysqli_connect($host, $user, $pass, $bdd) or die("Impossible de se connecter à la base de données");
if (isset($_GET['id'])) {
    $cd_id = mysqli_real_escape_string($link, $_GET['id']);
    $query = "SELECT * FROM $nomtable WHERE ID = $cd_id";
    $result = mysqli_query($link, $query);

    if ($donnees = mysqli_fetch_assoc($result)) {
        $ch1 = $donnees["Image"];
        $ch2 = $donnees["Titre"];
        $ch3 = $donnees["Auteur"];
        $ch4 = $donnees["Genre"];
        $id = $donnees["ID"];

        echo "<form method='post' action=''>";
        echo    "<input type='hidden' name='action' value='ajouter'>";
        echo    "<input type='hidden' name='id' value='$id'>";
		echo "<div class='unCD'>";
        echo 	"<picture>";
        echo   		"<img src='$ch1' alt='' />";
        echo 	"</picture>";
        echo 	"<h1><a href='selection_cd.php?id=$id'>$ch2</a></h1>";
        echo 	"<p class='chanteur'> $ch3 </p>";
		echo    	"<div class='shop'>";
		echo 			"<p> Prix : $ch4 € </p>";
		echo            "<input type='submit' value='Acheter'>";
        echo            "</form>";
        echo '<br />';
		echo    	"</div>";
        echo 	"<br />";
		echo "</div>";
    } else {
        echo "CD non trouvé";
    }
} else {
    echo "L'ID du CD est introuvable";
}

if (isset($_POST['action']) && $_POST['action'] == "ajouter") {
    $id = $_POST['id'];
    array_push($_SESSION['panier'], $id);
    echo "CD ajouté au panier";
}

echo "</body>";
?>