<?php
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "c9";
    $dbport = 3306;

try {
    $bdd = new PDO('mysql:host='.$servername.';dbname='.$database.';charset=utf8', $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : '.$e->getMessage());
}

