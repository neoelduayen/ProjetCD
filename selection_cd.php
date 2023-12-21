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
echo            "<li><a href='panier.php'>Panier</a></li>";
echo            "<li><a href='realisations.php'>Réalisations</a></li>";
echo            "<li><a href='services.php'>Services</a></li>";
echo            "<li><a href='contact.php'>Contact</a></li>";
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

        echo "<div>";
        echo    "<picture>";
        echo        "<img src='$ch1' alt='' />";
        echo    "</picture>";
        echo    "<h1>$ch2</h1>";
        echo    "<h2>$ch3</h2>";
        echo    "<h2>$ch4</h2>";
        echo    "<form method='post' action=''>";
        echo        "<input type='hidden' name='action' value='ajouter'>";
        echo        "<input type='hidden' name='id' value='$cd_id'>";
        echo        "<label for='quantite'>Quantité :</label>";
        echo        "<input type='number' name='quantite' value='1' min='1'>";
        echo        "<input type='submit' value='Ajouter au panier'>";
        echo    "</form>";
        echo "</div>";
    } else {
        echo "CD not found";
    }
} else {
    echo "CD ID not provided";
}

if (isset($_POST['action']) && $_POST['action'] == "ajouter") {
    $id = $_POST['id'];
    $quantite = isset($_POST['quantite']) ? intval($_POST['quantite']) : 1;

    for ($i = 0; $i < $quantite; $i++) {
        array_push($_SESSION['panier'], $id);
    }
}

echo "</body>";
?>