<?php
session_start();
if (isset($_SESSION['user'])) {
  
} else {
  
}
$pseudo = isset($_COOKIE['pseudo']) ? $_COOKIE['pseudo'] : "";
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    
    <title>MiniChat</title>
    <link rel="stylesheet" href="../view/css/style.css">

  </head>
  <body>
    <div class="right">
      <?php
      if (isset($_SESSION['user'])) {
        echo "<a class='page' href=".$_SERVER['PHP_SELF']."/membre/logout.php>logout</a>";
      } else {
        echo "<a class='page' href=".$_SERVER['PHP_SELF']."/membre/login.php>login</a>";
        echo "<a class='page' href=".$_SERVER['PHP_SELF']."/membre/signup.php>signup</a>";
      }
      ?>
    </div>
    <form action="../controler/ctlerMiniChat_post.php" method="post">
        <label for="pseudo">Pseudo : </label> &emsp;<input type="text" name="pseudo" value = "<?= "$pseudo"; ?>" /><br>
        <label for="message">Message : </label>&emsp;<input type="text" name="message"/><br>

        <button type="submit" name="button">Envoyer</button>

        <br>
          
      </form>
    
    
    <?php
        echo "<div><table >";
        echo "<tr> <th> Date </th> <th> Pseudo </th> <th> Message </th> </tr>" ;
        // On affiche chaque entrée une à une
        while ($data = $qMsg->fetchObject()) {
            echo "<tr>";
            echo "<td> {$data->date} </td><td> {$data->pseudo} </td><td> {$data->message} </td><td> <a href </td>";
            echo "</tr>";
        }
        echo "</table></div>";  

        
        $data = $qNbMsg->fetch();
        $nbMsg = $data['nbMsg']/10;
        
        echo "<br> <div class = 'noPage'>";
        for($i = 1; $i<$nbMsg+1; $i++){
          echo "<a class='page' href='miniChat.php?page=$i'> $i</a>";
        }
        echo "</div>";
        $qNbMsg->closeCursor();
    ?>
    <div class="right"><a href="">Rafraîchir</a></div>
  </body>
</html>
