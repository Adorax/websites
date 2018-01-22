<?php 
session_start();

// Détruit toutes les variables de session
$_SESSION = array();

session_destroy();

header('Location: ../miniChat.php');


// Suppression des cookies de connexion automatique
//setcookie('login', '');
//setcookie('pass_hache', '');
