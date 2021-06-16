<?php //Connection to the database
try{
    $db = new PDO('mysql:host=localhost;dbname=produits', 'root','');
    $db->exec('SET NAMES "UTF8"');
}catch (PDOException $e){
    echo 'erreur : '. $e->getMessage();
    die();
}
