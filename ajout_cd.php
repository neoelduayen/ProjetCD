<?php
$vide = "";
if ($_POST['Titre'] != $vide && $_POST['Auteur'] != $vide){
    if ($_POST['Genre'] != $vide && $_POST['Prix'] != $vide) {
        $titre = $_POST['Titre'];
        $auteur = $_POST['Auteur'];
        $genre = $_POST['Genre'];
        $prix = $_POST['Prix'];
        $emp_image = $titre;

        $bdd= "projetcd"; // Base de données
        $host= "localhost";
        $user= "root"; // Utilisateur
        $pass= ""; // mp
        $nomtable= "projetcd"; /* Connection bdd */
        
        $link=mysqli_connect($host,$user,$pass,$bdd) or die( "Impossible de se connecter à la base de données");
        $query = "SELECT count(id) AS nb FROM $nomtable";
        $result= mysqli_query($link,$query);
        $row = mysqli_fetch_array($result);
        $id=$row['nb'];
        $id += 1;
        $sql = "INSERT INTO ProjetCD (ID, Titre, Auteur, Genre, Prix, Image) VALUES ($id,'$titre','$auteur','$genre',$prix,'vignettes/$emp_image.jpg')";
        if (mysqli_query($link, $sql)) {
            $fic = $_FILES["image"]['tmp_name'];
            $nom = $titre;
            move_uploaded_file($fic,"./vignettes/$nom.jpg");
            echo '<body onLoad="alert(\'CD ajouté à la base de données\')">';
            echo '<meta http-equiv="refresh" content="0;URL=page_membre.php">';
        }
        else {
            echo '<body onLoad="alert(\'Des données saisies sont invalides\')">';
            echo '<meta http-equiv="refresh" content="0;URL=page_membre.php">';
        }
    }
    else{
        echo '<body onLoad="alert(\'Tout les champs ne sont pas remplis.\')">';
        echo '<meta http-equiv="refresh" content="0;URL=page_membre.php">';
    }
}
else{
    echo '<body onLoad="alert(\'Tout les champs ne sont pas remplis.\')">';
    echo '<meta http-equiv="refresh" content="0;URL=page_membre.php">';
}
