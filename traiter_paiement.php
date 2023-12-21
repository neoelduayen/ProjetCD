<?php
session_start();
include ('paiement.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numeroCarte = $_POST["numero_carte"];
    $dateValidite = $_POST["date_validite"];

    $resultatPaiement = simulerPaiement($numeroCarte, $dateValidite);

    switch ($resultatPaiement) {
        case 1:
            echo '<body onLoad="alert(\'Paiement effectué avec succès\')">';
                
            $_SESSION['panier'] = array();
    
            echo '<meta http-equiv="refresh" content="0;URL=panier.php">';
            break;

        case 2:
            echo '<body onLoad="alert(\'Erreur : La date de validité de la carte est expirée.\')">';
            echo '<meta http-equiv="refresh" content="0;URL=paiement.php">';
            break;

        case 3:
            echo '<body onLoad="alert(\'Erreur : Le premier et le dernier chiffre du numéro de carte ne sont pas identiques.\')">';
            echo '<meta http-equiv="refresh" content="0;URL=paiement.php">';
            break;

        case 4: 
            echo '<body onLoad="alert(\'Erreur : Le numéro de carte doit contenir 16 chiffres.\')">';
            echo '<meta http-equiv="refresh" content="0;URL=paiement.php">';
            break;
    }
}
?>