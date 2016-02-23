<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 19/02/2016
 * Time: 10:01
 */

require_once 'connect.php';

$json = file_get_contents('php://input');
$obj = json_decode($json);

$email = $obj->email;
$password = md5($obj->password);
$sexe = $obj->sexe;
$pseudo = $obj->pseudo;
$codePostal = $obj->codePostal;
$ville = $obj->ville;
$str = explode("T",$obj->dateNaissance);
$dateNaissance = $str[0];


$req = $connect->prepare("INSERT INTO user (email, password, sexe, pseudo, code_postal, ville, dateDeNaissance) VALUES ( :email, :password, :sexe, :pseudo, :codePostal, :ville, :dateNaissance)");
$req->execute(array(
    "email" => $email,
    "password" => $password,
    "sexe" => $sexe,
    "pseudo" => $pseudo,
    "codePostal" => $codePostal,
    "ville" => $ville,
    "dateNaissance" => $dateNaissance
));
