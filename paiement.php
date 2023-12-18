<?php

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

<h2>Paiement</h2>
<form method="post" action="traiter_paiement.php">
    <label for="numero_carte">Numéro de carte :</label>
    <input type="text" name="numero_carte" required maxlength="16"><br>

    <label for="date_validite">Date de validité (MM/YY) :</label>
    <input type="text" name="date_validite" required pattern="\d{2}/\d{2}"><br>

    <input type="submit" value="Valider le paiement">
</form>

</body>
</html>