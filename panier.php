<?php
session_start();

$bdd= "nelduayen_bd"; // Base de données
$host= "lakartxela.iutbayonne.univ-pau.fr";        
$user= "nelduayen_bd"; // Utilisateur
$pass= "nelduayen_bd"; // mp
$nomtable= "ProjetCD"; // Connection bdd

    echo "<head>";
    echo "<title>Panier</title>";
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

if (isset($_SESSION['panier']) && count($_SESSION['panier']) > 0) {
    echo "<h1 class='slogan'>Votre Panier</h1>";

    $link = mysqli_connect($host, $user, $pass, $bdd) or die("Impossible de se connecter à la base de données");

    
    $panierIds = array_unique($_SESSION['panier']);
    $inClause = implode(',', $panierIds);
    $query = "SELECT * FROM $nomtable WHERE ID IN ($inClause)";
    $result = mysqli_query($link, $query);
    echo "<div class='main-content'>";
    echo "<div class='mesCd'>";
    $totalPrix = 0;
    while ($donnees = mysqli_fetch_assoc($result)) {
        $id = $donnees["ID"];
        $ch1 = $donnees["Image"];
        $ch2 = $donnees["Titre"];
        $prix = $donnees["Prix"];
        $quantite = array_count_values($_SESSION['panier'])[$id];

        $sousTotal = $prix * $quantite;
        $totalPrix += $sousTotal;
        echo "<div class='unCd'>";
        echo    "<picture>";
        echo        "<img src='$ch1' alt='' />";
        echo    "</picture>";
        echo    "<h2>$ch2</h2>";
        echo    "<p>Quantité: $quantite</p>";
        echo    "<p>Prix unitaire: $prix €</p>";
        echo    "<p>Sous-total: $sousTotal €</p>";
        echo    "<form method='post' action=''>";
        echo        "<input type='hidden' name='action' value='supprimer'>";
        echo        "<input type='hidden' name='id' value='$id'>";
        echo        "<input type='submit' value='Supprimer du panier'>";
        echo    "</form>";
        echo "</div>";
    }
    echo "</div>";
    echo "</div>";
    echo "<div class='total-panier'>";
    echo    "<h1>Prix total: $totalPrix €</h1>";
    echo "</div>";
    
    echo "<form method='get' action='paiement.php' class='total-panier'>";
    echo    "<input type='submit' value='Aller vers le paiement'>";
    echo "</form>";
} 
else {
    echo "<h1 class='vide'>Votre panier est vide.</h1>";
}

if (isset($_POST['action']) && $_POST['action'] == "supprimer") {
    $id = $_POST['id'];
    $_SESSION['panier'] = array_diff($_SESSION['panier'], array($id));
    echo '<meta http-equiv="refresh" content="0;URL=panier.php">';
}

echo "</body>";
?>
