<?php
require_once('connect.php');

if(isset($_POST)){
    if(isset($_POST['id']) && !empty($_POST['id'])
    && isset($_POST['nom']) && !empty($_POST['nom'])
    && isset($_POST['prix']) && !empty($_POST['prix'])
    && isset($_POST['quantite']) && !empty($_POST['quantite'])){
        $id = strip_tags($_GET['id']);
        $nom = strip_tags($_POST['nom']);
        $prix = strip_tags($_POST['prix']);
        $quantite = strip_tags($_POST['quantite']);

        $sql = "UPDATE `megalimentation2` SET `nom`=:nom, `prix`=:prix, `quantite`=:quantite WHERE `id`=:id;";

        $query = $db->prepare($sql);

        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':prix', $prix, PDO::PARAM_STR);
        $query->bindValue(':quantite', $quantite, PDO::PARAM_INT);
        $query->bindValue(':id', $id, PDO::PARAM_INT);

        $query->execute();

        header('Location: Exo_alimentation.php');
    }
}

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM `megalimentation2` WHERE `id`=:id;";

    $query = $db->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    $result = $query->fetch();
}

require_once('close.php');
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Liste des produits</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <h1>Modifier un produit</h1>
    <form method ="POST">
        <p>
            <label for="nom">nom</label>
            <input type="text" name="nom" id="nom" value="<?= $result['nom'] ?>">
        </p>
        <p>
            <label for="prix">prix</label>
            <input type="text" name="prix" id="prix" value="<?= $result['prix'] ?>">
        </p>
        <p>
            <label for="quantité">quantité</label>
            <input type="text" name="quantite" id="quantite" value="<?= $result['quantite'] ?>">
        </p>
        <p>
            <button>Enregistrer</button>
        </p>
        <input type="hidden" name="id" value="<?= $result['id'] ?>">
    </form>
</body>
</html>