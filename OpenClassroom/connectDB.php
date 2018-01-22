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
