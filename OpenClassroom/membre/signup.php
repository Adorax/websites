<?php 
    session_start(); 
    //== Functions =============================================================
    function checkNotExiste($req) {
        while ($data = $req->fetchObject()) {
        if (strtoupper("{$data->username_membre}") == strtoupper($user)){
            echo "This username already existes.";
        } else {
            echo "This email already existes.";
        }
        return false;
        }
        return true;
    }
    function registerUser($db) {
        global $user, $email;
        $options = ['cost' => 12];
        $req = $db->prepare('INSERT INTO membre (username_membre, password_membre, email_membre) VALUES(:user, :password, :email)');
        $req->execute(array(
	    'user' => $user,
	    'password' => password_hash($_POST['pwd'], PASSWORD_BCRYPT, $options),
    	'email' => $email
        ));
    }
    //== Main ==================================================================   
    if (isset($_POST['signup'])){
        $user = htmlspecialchars($_POST['user']);
        $email = htmlspecialchars($_POST['email']);
        if ($_POST['pwd'] == $_POST['cpwd']) {
            require_once('../connectDB.php');
            $req = $db->prepare('SELECT username_membre, email_membre FROM membre 
            where upper(username_membre) = upper(:user) OR upper(email_membre) = upper(:email);');
            $req->execute(array(
            	'user' => "$user",
            	'email' => "$email"
            ));
    
            if (checkNotExiste($req)) {
                if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email) ){
                    if (preg_match("#^[a-zA-Z0-9_-]{5,15}$#", $user)){
                      if(preg_match("#^.{8,}$#", $_POST['pwd'])){
                            registerUser($db);
                            $_SESSION['user'] = $user;
                            $_SESSION['email'] = $email;
                            header('Location: ../miniChat.php');
                      }  else { echo "Password must avec atleast 8 characteres.";}
                    } else {echo "Username have to contain only letter, number, - or/and _ " ;}
                } else { echo "Incorrect email";}
    
            }
            $req->closeCursor();
    
           // test usename, email, force pwd
        } else {

            echo "<script> alert('Passwords dosen\'t match'); </script>";
            
        }
        //Pour remplir les champs dans le cas où l'utilisateur entre quelque chose de faux
        $_SESSION['memUser'] = $user;
        $_SESSION['memEmail'] = $email;
    }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    
    <title>MiniChat</title>
    <link rel="stylesheet" href="../style.css">

  </head>
  <body>
    <form method="post" action="signup.php">
        <label  class="formLogin" for="email">Email : </label><input class="formLogin" type="text" name="email" value="<?php echo isset($_SESSION['memEmail'])?$_SESSION['memEmail']:""; ?>" /> <br>
        <label for="user">Username : </label><input class="formLogin" type="text" name="user" value="<?php echo isset($_SESSION['memUser'])?$_SESSION['memUser']:""; ?>" /> <br>
        <label for="pwd">Password : </label><input class="formLogin" type="password" name="pwd"/> <br>
        <label for="cpwd">Confirm password : </label><input class="formLogin" type="password" name="cpwd"/> <br>
        
        <input type="submit" name="signup" value="Submit"/>
    </form>
  </body>  
</html>
