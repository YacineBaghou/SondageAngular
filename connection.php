<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 23/02/2016
 * Time: 16:37
 */
session_start();

require_once 'connect.php';



$json = file_get_contents('php://input');
$obj = json_decode($json);

$email = $obj->email;
$password = md5($obj->password);

$req = $connect->prepare("SELECT * FROM user WHERE email= :email and password= :password" );
$req->execute(array(
    "email" => $email,
    "password" => $password
));

$_SESSION['user'] = $req->fetchAll();
var_dump($_SESSION['user']);
