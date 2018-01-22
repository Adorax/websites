<?php $title = 'Minichat'; ?>

<!-- permet d'enregister un long contenu pour le mettre dans un variable ensuite avec ob_get_clean() -->
<?php ob_start(); ?> 

   <form action="../controler/ctlerMiniChat_post.php" method="post">
        <label for="pseudo">Pseudo : </label> &emsp;<input type="text" name="pseudo" value = "<?= "$pseudo"; ?>" /><br>
        <label for="message">Message : </label>&emsp;<input type="text" name="message"/><br>

        <button type="submit" name="button">Envoyer</button>

        <br>
          
      </form>
    
    
    <?php
        echo "<div><table >";
        echo "<tr> <th> Date </th> <th> Pseudo </th> <th> Message </th> </tr>" ;
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


<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br />
            <em><a href="post.php?id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>