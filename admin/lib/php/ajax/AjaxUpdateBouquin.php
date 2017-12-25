<?php
header('Content-type: application/json');
require '../dbconnect.php';
require '../classes/Connexion.class.php';
require '../classes/Bouquin.class.php';//faire classe bouquin
require '../classes/BouquinDB.class.php';
$cnx = Connexion::getInstance($dsn,$user,$pass);

try{    
    $update = new BouquinDB($cnx);
    extract($_GET,EXTR_OVERWRITE);
    $param = 'id='.$id.'&champ='.$champ.'&nouveau='.$nouveau;
    $update->updateInfoLivre($champ, $nouveau, $id);
    
}catch(PDOException $e){
    print $e->getMessage();
}
