<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 23/02/2016
 * Time: 14:03
 */
require_once 'connect.php';


    $json = file_get_contents('php://input');
    $obj = json_decode($json);

    $sql = "SELECT id, libelleVille FROM ville WHERE codePostal=".$obj->codePostal;

    $result = $connect->query($sql);

    $data = json_encode($result->fetchAll());


    echo $data;
