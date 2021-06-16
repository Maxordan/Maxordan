<?php
//including connection to the base
require_once('connect.php');
//Writing the request:
$sql = 'SELECT * FROM `megalimentation2`';
//Preparing the request:
$query = $db->prepare($sql);
//execute the request:
$query->execute();
//Stocking the result in a table association:
$result = $query->fetchALL(PDO::FETCH_ASSOC);

require_once('close.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exo Alimentation</title>
    <link rel="stylesheet" href="style.css/style.css">
</head>

<body>
<div id="barre">
<h1 id="Titre">MEGALIMENTATION</h1>
</div>
<table id="table">
    <thead>
        <tr>
            <th>id</th>
            <th>nom</th>
            <th>prix</th>
            <th>quantité</th>
            <th>actions</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach($result as $nom){
    ?>
        <tr>
            <td><?= $nom['id'] ?></td>
            <td><?= $nom['nom'] ?></td>
            <td><?= $nom['prix'] ?></td>
            <td><?= $nom['quantite'] ?></td>
            <td><a href="details.php?id=<?= $nom['id'] ?>">Voir</a>
            <a href="edit.php?id=<?= $nom['id'] ?>">Modifier</a>
            <a href="delete.php?id=<?= $nom['id'] ?>">Supprimer</a></td>
        </tr>
    <?php
        }
    ?>
    </tbody>
</table>
<a href="add.php">Ajouter</a>

</body>
</html>