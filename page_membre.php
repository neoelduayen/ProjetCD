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

    $bdd= "projetcd"; // Base de données
    $host= "localhost";
    $user= "root"; // Utilisateur
    $pass= ""; // mp
    $nomtable= "projetcd"; // Connection bdd

$link=mysqli_connect($host,$user,$pass,$bdd) or die( "Impossible de se connecter à la base de
données");
$query = "SELECT * FROM $nomtable";
$result= mysqli_query($link,$query);
echo "<h2 class='membre-txt'>Bienvenue sur votre page membre.</h2>";
echo "<div class='main-content'>";
echo "<div class='mesCD'>";
while ($donnees=mysqli_fetch_assoc($result)) {
    $ch1=$donnees["Image"];
    $ch2=$donnees["Titre"];
    $ch3 = $donnees["Auteur"];
    $ch4 = $donnees["Prix"];
    $id = $donnees["ID"];
        echo "<form action='retire_cd.php' method='post'>";
		echo "<div class='unCD'>";
        echo 	"<picture>";
        echo   		"<img src='$ch1' alt='' />";
        echo 	"</picture>";
        echo 	"<h1>$ch2</h1>";
        echo 	"<p class='chanteur'> $ch3 </p>";
		echo    	"<div class='shop'>";
		echo 			"<p> Prix : $ch4 € </p>";
		echo            "<input type='submit' value='Supprimer' name='test'><input type='hidden' name='IdAlbum' value='$id'><input type='hidden' name='Image' value='$ch2'></form>";
        echo '<br />';
		echo    	"</div>";
        echo 	"<br />";
        echo "</div>";
    }
    echo "</div>";
    echo "</div>";

echo "<div class='membre-txt-ajout'>";
echo "<h2>Formulaire d'ajout de CD : </h2>";
echo'<form ENCTYPE="multipart/form-data" action="ajout_cd.php" method="post" class="form">';
echo 'Titre : <input type="text" name="Titre"><br />';
echo 'Auteur : <input type="text" name="Auteur"><br />';
echo 'Genre : <input type="text" name="Genre"><br />';
echo 'Prix : <input type="text" name="Prix"><br />';
echo 'Image : <input type="file" name="image"/><br />';
echo '<input type="submit" value="Ajouter" class="ajouter"></form>';
echo '</div>';
// On affiche un lien pour fermer notre session
echo '<a href="./logout.php" class="logout">Déconnexion</a>';
}

else {
echo "Vous n'avez pas le droit de vous connecter à cette page.";
}
?>