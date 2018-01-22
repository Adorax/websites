<?php
if (isset($_POST['user']) && isset($_POST['pwd']) && $_POST['user']!="" && $_POST['pwd']!=""){
    $myfile = fopen('.htpasswd', 'a');
    $user = $_POST['user'];
    $pwd = crypt($_POST['pwd']);
    $line = fputs($myfile, "$user:$pwd");
     
    fclose($myfile);
    echo "Successful sign up :D";
} else {
    ?>
    <form method="post" action="signupAdmin.php">
        <label for="user">Username : </label><input type="text" name="user"/>
        <label for="pwd">Password : </label><input type="password" name="pwd"/>
        <input type="submit" name="signup" value="Submit"/>
    </form>
    <?php
}

/**
 * Dans ce cas, nous souhaitons augmenter le "cost" par défaut pour BCRYPT à la valeur 12.
 * Notez que nous passons également à l'algorithme BCRYPT, qui produit toujours un résultat
 * de 60 caractères.
 */
/*
$options = [
    'cost' => 12,
];


$pw = password_hash("rasmuslerdorf", PASSWORD_BCRYPT, $options);
echo "<br> //";

$newpw = "rasmuslerdorf";


if(password_verify($newpw, $pw) ) {
    
    echo "COOL";
    
}
*/
?>