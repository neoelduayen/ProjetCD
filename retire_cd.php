<?php
    $bdd= "nelduayen_bd"; // Base de données
    $host= "lakartxela.iutbayonne.univ-pau.fr";
    $user= "nelduayen_bd"; // Utilisateur
    $pass= "nelduayen_bd"; // mp
    $nomtable= "ProjetCD"; /* Connection bdd */
    $link=mysqli_connect($host,$user,$pass,$bdd) or die( "Impossible de se connecter à la base de données");
    $id = $_POST['IdAlbum'];
    $nomImage= $_POST['Image'];
    $query = "DELETE FROM $nomtable WHERE ID = '$id'";
    if (mysqli_query($link, $query)) {
        unlink("./vignettes/$nomImage.jpg");
        echo '<body onLoad="alert(\'CD supprimé de la base de données\')">';
        echo '<meta http-equiv="refresh" content="0;URL=page_membre.php">';
    }
    else {
        echo '<body onLoad="alert(\'Une erreur est survenue.\')">';
        echo '<meta http-equiv="refresh" content="0;URL=page_membre.php">';
    }
?>