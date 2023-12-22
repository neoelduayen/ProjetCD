<?php
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
echo            "<li><a href='panier.php'>Panier</a></li>";

echo        "</ul>";
echo    "</nav>";
echo "</header>";

function simulerPaiement($numeroCarte, $dateValidite) {
    // Vérifier la longueur des numéros de carte
    if (strlen($numeroCarte) !== 16) {
        return 4;
    }

    // Vérifier que le premier et le dernier chiffre sont identiques
    if ($numeroCarte[0] !== $numeroCarte[15]) {
        return 3;
    }

    // Vérifier la date de validité (supérieure à la date du jour + 3 mois)
    $dateDuJour = new DateTime();
    $dateValiditeObj = DateTime::createFromFormat('m/y', $dateValidite);

    if ($dateValiditeObj === false || $dateValiditeObj < $dateDuJour->add(new DateInterval('P3M'))) {
        return 2;
    }

    // Si toutes les conditions sont remplies, le paiement est validé
    return 1;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement</title>
</head>
<body>

<h2 class="paiement-txt">Paiement</h2>
<form method="post" action="traiter_paiement.php" class="paiement">
    <label for="numero_carte">Numéro de carte :</label>
    <input type="text" name="numero_carte" required maxlength="16"><br>

    <label for="date_validite">Date de validité (MM/YY) :</label>
    <input type="text" name="date_validite" required pattern="\d{2}/\d{2}"><br>

    <input type="submit" value="Valider le paiement" class="paiement-valide">
</form>

</body>
</html>