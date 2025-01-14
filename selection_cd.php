<?php
	session_start();

    $bdd= "projetcd"; // Base de données
    $host= "localhost";
    $user= "root"; // Utilisateur
    $pass= ""; // mp
    $nomtable= "projetcd"; // Connection bdd

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
if (isset($_GET['id'])) {
    $cd_id = mysqli_real_escape_string($link, $_GET['id']);
    $query = "SELECT * FROM $nomtable WHERE ID = $cd_id";
    $result = mysqli_query($link, $query);

    if ($donnees = mysqli_fetch_assoc($result)) {
        $ch1 = $donnees["Image"];
        $ch2 = $donnees["Titre"];
        $ch3 = $donnees["Auteur"];
        $ch4 = $donnees["Genre"];
		$ch5 = $donnees["Prix"];
        $id = $donnees["ID"];
        echo "<div class='main-content'>";
        echo "<form method='post' action=''>";
        echo    "<input type='hidden' name='action' value='ajouter'>";
        echo    "<input type='hidden' name='id' value='$id'>";
		echo "<div class='monCD'>";
        echo 	"<picture>";
        echo   		"<img src='$ch1' alt='' />";
        echo 	"</picture>";
		echo 	"<div class='description'>";
        echo 		"<p> Titre : <B>$ch2</B> </p>";
        echo 		"<p> Auteur : $ch3 </p>";
		echo 		"<p> Genre : $ch4 </p>";
		echo    	"<p> Prix : $ch5 € <input type='submit' value='Acheter'></p>";
		echo 	"</div>";
		echo "</div>";
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
}

echo "</body>";
?>