<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();

// On récupère nos variables de session
if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
// On teste pour voir si nos variables ont bien été enregistrées
echo '<html>';
echo '<head>';
echo '<title>Back-office</title>';
echo '</head>';

$bdd= "nelduayen_bd"; // Base de données
$host= "lakartxela.iutbayonne.univ-pau.fr";
$user= "nelduayen_bd"; // Utilisateur
$pass= "nelduayen_bd"; // mp
$nomtable= "ProjetCD"; /* Connection bdd */

$link=mysqli_connect($host,$user,$pass,$bdd) or die( "Impossible de se connecter à la base de
données");
$query = "SELECT * FROM $nomtable";
    $result= mysqli_query($link,$query);
    while ($donnees=mysqli_fetch_assoc($result)) {
        $ch1=$donnees["ID"];
        $ch2=$donnees["Titre"];
        $ch3=$donnees["Prix"];
        echo "<p>$ch1, $ch2, $ch3 €</p>";
    }
echo '<body>';
// echo 'Votre login est '.$_SESSION['login'].' et votre mot de passe est '.$_SESSION['pwd'].'.';
echo 'Bienvenue sur votre session.';
echo '<br />';
echo'<form action="ajout_cd.php" method="post">';
echo 'Titre : <input type="text" name="Titre"><br />';
echo 'Auteur : <input type="text" name="Auteur"><br />';
echo 'Genre : <input type="text" name="Genre"><br />';
echo 'Prix : <input type="text" name="Prix">';
echo '<input type="submit" value="Ajouter"></form>';
// On affiche un lien pour fermer notre session
echo '<a href="./logout.php">Déconnexion</a>';
}
else {
echo "Vous n'avez pas le droit de vous connecter à cette page.";
}
?>