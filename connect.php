<?php
//Fichier de config pour les acces BDD

try{
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $connect = new PDO("mysql:host=localhost;dbname=angular;charset=utf8", "root", "", $options);
} catch (Exception $e){
    die('Erreur' . $e->getMessage());
}
