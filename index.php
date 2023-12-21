<?php
    session_start();

    $bdd = "nelduayen_bd"; // Base de données
    $host = "lakartxela.iutbayonne.univ-pau.fr";
    $user = "nelduayen_bd"; // Utilisateur
    $pass = "nelduayen_bd"; // Mot de passe
    $nomtable = "ProjetCD"; /* Table bdd */

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
    $query = "SELECT * FROM $nomtable";
    $result = mysqli_query($link, $query);

    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = array();
    }

    while ($donnees = mysqli_fetch_assoc($result)) {
        $ch1 = $donnees["Image"];
        $ch2 = $donnees["Titre"];
        $ch3 = $donnees["Auteur"];
        $id = $donnees["ID"];
    
        echo "<form method='post' action=''>"; 
        echo    "<input type='hidden' name='action' value='ajouter'>";
        echo    "<input type='hidden' name='id' value='$id'>";
        echo    "<picture>";
        echo        "<img src='$ch1' alt='' />";
        echo    "</picture>";
        echo    "<h1><a href='selection_cd.php?id=$id'>$ch2</a></h1>";
        echo    "<h2>$ch3</h2>";
        echo    "<label for='quantite'>Quantité :</label>";
        echo    "<input type='number' name='quantite' value='1' min='1'>";
        echo    "<input type='submit' value='Ajouter au panier'>";
        echo "</form>";
        echo '<br />';
    }

    if(isset($_POST['action']) && $_POST['action']=="ajouter"){
        $id = $_POST['id'];
        $quantite = isset($_POST['quantite']) ? intval($_POST['quantite']) : 1;

        for ($i = 0; $i < $quantite; $i++) {
            array_push($_SESSION['panier'], $id);
        }
    }

    echo "</body>";
?>

