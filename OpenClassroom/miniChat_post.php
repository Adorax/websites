<?php
$pseudo = $_POST['pseudo'] ;
setcookie('pseudo', $pseudo, time() + 365*24*3600, null, null, false, true);

include ('connectDB.php');

$id = '';
$pseudo = htmlspecialchars($_POST['pseudo']);
$message = htmlspecialchars($_POST['message']);

if ($pseudo != '' && $message!= '') {
    $req = $db->prepare('INSERT INTO minichat (date, pseudo, message) VALUES(NOW(), :pseudo, :message)');
    $req->execute(array(
    	'pseudo' => $pseudo,
    	'message' => $message
    ));
    echo 'Le jeu a bien été ajouté !';
}

header('Location: miniChat.php');
