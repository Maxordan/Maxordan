<?php
session_start();
//Including the connection to the base
require_once('connect.php');

if(isset($GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    //Writing our request
    $sql = 'SELECT * FROM `megalimentation2` WHERE `id`=:id';
    //Preparing the request
    $query = $db->prepare($sql);

    //attaching the values
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    //Executing the request
    $query->execute();

    //stocking the result in a table association
    $nom = $query->fetch();

    if(!$nom){
        header('Location: Exo_alimentation.php');
    }
}else{
    header('Location: Exo_alimentation.php');
}

require_once('close.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=10.0">
        <title>Liste des produits</title>
</head>
<body>
    <h1>Détails du produit <?= $nom['nom'] ?></h1>
    <p>id : <?= $nom['id'] ?></p>
    <p>nom : <?= $nom['nom'] ?></p>
    <p>prix : <?= $nom['prix'] ?></p>
    <p>quantité : <?= $nom['quantité'] ?></p>
    <p><a href="edit.php?id=<?= $nom['id'] ?>">Modifier</a>
    <a href="delete.php?id=<?= $nom['id'] ?>">Supprimer</a></p>
</body>
</html>












