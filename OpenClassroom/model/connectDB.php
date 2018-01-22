<?php
define(DBHOST,getenv('IP'));
define(DBUSERNAME, getenv('C9_USER'));
define(DBPASSWORD, '');
define(DBNAME, 'c9');

try {
    $db = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME.';charset=utf8', DBUSERNAME, DBPASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : '.$e->getMessage());
}

function getMessage(){
    global $db;
    $page = isset($_GET['page']) ? $_GET['page']*10-10 : 0;
    $sql = "SELECT DATE_FORMAT(date, '%d/%m/%Y %Hh%imin%ss') AS date, pseudo, message FROM minichat ORDER BY ID DESC LIMIT $page, 10 ;";
    $q = $db->query($sql);
    
    return $q;
}

function addMessage(){
    global $db;
    $query = $db->prepare('INSERT INTO minichat (date, pseudo, message) VALUES(NOW(), :pseudo, :message)');
    return $query;
}

function getNbMsg() {
    global $db;    
    $sqlCount = "SELECT count(*) AS nbMsg from minichat;";
    $query = $db->query($sqlCount);
    
    return $query;
}
