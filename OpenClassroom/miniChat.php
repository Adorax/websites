<?php
session_start();
include ('connectDB.php');
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
    <link rel="stylesheet" href="style.css">

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
    <form action="miniChat_post.php" method="post">
        <label for="pseudo">Pseudo : </label> &emsp;<input type="text" name="pseudo" value = "<?php echo "$pseudo"; ?>" /><br>
        <label for="message">Message : </label>&emsp;<input type="text" name="message"/><br>

        <button type="submit" name="button">Envoyer</button>

        <br>
          
      </form>
    
    
    <?php
        $page = isset($_GET['page']) ? $_GET['page']*10-10 : 0;
        $sql = "SELECT DATE_FORMAT(date, '%d/%m/%Y %Hh%imin%ss') AS date, pseudo, message FROM minichat ORDER BY ID DESC LIMIT $page, 10 ;";
        $query = $db->query($sql);
      
      
      



        echo "<div><table >";
        echo "<tr> <th> Date </th> <th> Pseudo </th> <th> Message </th> </tr>" ;
        // On affiche chaque entrée une à une
        while ($data = $query->fetchObject()) {
            echo "<tr>";
            echo "<td> {$data->date} </td><td> {$data->pseudo} </td><td> {$data->message} </td>";
            echo "</tr>";
        }
        echo "</table></div>";      
        
        $sqlCount = "SELECT count(*) AS nbMsg from minichat;";
        $query = $db->query($sqlCount);
        $data = $query->fetch();
        $nbMsg = $data['nbMsg']/10;
        
        echo "<br> <div class = 'noPage'>";
        for($i = 1; $i<$nbMsg+1; $i++){
          echo "<a class='page' href='miniChat.php?page=$i'> $i</a>";
        }
        echo "</div>";
        $query->closeCursor();
    ?>
    <div class="right"><a href="">Rafraîchir</a></div>
  </body>
</html>
