<?php
    require('../model/connectDB.php');
    
    $qAddMsg = addMessage();
    


$pseudo = $_POST['pseudo'] ;
setcookie('pseudo', $pseudo, time() + 365*24*3600, null, null, false, true);

$pseudo = htmlspecialchars($_POST['pseudo']);
$message = htmlspecialchars($_POST['message']);

if ($pseudo != '' && $message!= '') {
    $qAddMsg->execute(array(
    	'pseudo' => $pseudo,
    	'message' => $message
    ));
}

header('Location: ctlerMiniChat.php');