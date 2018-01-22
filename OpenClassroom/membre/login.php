<?php 
session_start(); 

    //== Functions =============================================================
    function checkExiste($req) {
            $data = $req->fetchObject();

        global $pwd;
        if($data && password_verify($pwd, $data->password_membre) ) {
            $_SESSION['user'] = "{$data->username_membre}";
            $_SESSION['email'] = "{$data->email_membre}";
            header('Location: ../miniChat.php');
        } else {
            echo "<script> alert('Incorrect username or password.'); </script>";
            $_SESSION['memUser'] = $_POST['user'];
        }
    }

    //== Main ==================================================================   
    if (isset($_POST['login'])){

        $user = htmlspecialchars($_POST['user']);
        $pwd = $_POST['pwd'];
        
        require_once('../connectDB.php');
        $req = $db->prepare('SELECT username_membre, email_membre, password_membre FROM membre 
        where upper(username_membre) = upper(:user);');
        $req->execute(array(
        	'user' => "$user"
        ));

        checkExiste($req);
        $req->closeCursor();
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    
    <title>MiniChat - Login</title>
    <link rel="stylesheet" href="../style.css">

  </head>
  <body>
    <form method="post" action="login.php">
        <label for="user">Username </label><input class="formLogin" type="text" name="user" value="<?php echo isset($_SESSION['memUser'])?$_SESSION['memUser']:""; ?>" /> <br>
        <label for="pwd">Password </label><input class="formLogin" type="password" name="pwd"/> <br>
        <!-- Il faudrait stocker pwd hashé dans un cookie  
        <label for="autoConnect">Automatic connection </label><input class="formLogin" type="checkbox" name="autoConnect"/> <br>
        Sinon on peut utilier une connexion grace à facebook, voir cours openclassroom "concevez-votre-site-web-avec-php-et-mysql" -->
        
        <input type="submit" name="login" value="Submit"/>
    </form>
  </body>  
</html>