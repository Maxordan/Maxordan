
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ajouter produits</title>
    </head>
    <body>
        <form action="" method="POST">
            <label for="nom">nom</label>
            <input type="text" name="nom" id="nom">
            <label for="prix">prix</label>
            <input type="text" name="prix" id="prix">
            <label for="quantite">quantité</label>
            <input type="text" name="quantite" id="quantite">
            <button>Enregistrer</button>
        </form>
    </body>
</html>
<?php
require_once('connect.php');

if(isset($_POST)){
    if(isset($_POST['nom']) && !empty($_POST['nom'])
        && isset($_POST['prix']) && !empty($_POST['prix'])
        && isset($_POST['quantite']) && !empty($_POST['quantite'])){
            $nom = strip_tags($_POST['nom']);
            $prix = strip_tags($_POST['prix']);
            $quantite = strip_tags($_POST['quantite']);

            //The request to permitting to add a product into the list
            $sql = "INSERT INTO megalimentation2(nom, prix, quantite) VALUES(:nom, :prix, :quantite)";

            $query = $db->prepare($sql);

            $query->bindValue(':nom', $nom);
            $query->bindValue(':prix', $prix);
            $query->bindValue(':quantite', $quantite);
            
            $query->execute();
            
            $_SESSION['message'] = "produit ajouté avec succès !";
            // header('Location: Exo_alimentation.php');
    }
}

require_once('close.php');
?>