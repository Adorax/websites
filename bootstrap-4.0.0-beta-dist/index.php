<?php
session_start();
$_SESSION['name'] = "Julius";
setcookie('pays', 'Suisse', time() + 3600 * 24 * 365, null, null, false, true);
include('include/header.php'); 
include ('controler/connectDb.php')
?>
<nav class="navbar sticky-top navbar-light bg-light" id = "navbar">
  <a class="navbar-brand" href="#">Full width</a>
</nav>
<div class="container-fluid red">
    <div class="container blue">
        <div class="row">
<a class="heartcenter col-md-12 beerRotate" href="alix.php?nom=Jöhr&amp;prenom=Alix"><i class="fa fa-snowflake-o fa-spin fa-5x" aria-hidden="true"></i></a>
        </div>
        <div>
            <?php
                $nb_modifs = $bdd->exec('UPDATE jeux_video SET possesseur = \'Florent\' WHERE possesseur = \'Michel\'');
                echo $nb_modifs . ' entrées ont été modifiées ! <br>';
                
                $nvprix = 1;
                $possesseur = "Michel";
                $req = $bdd->prepare('UPDATE jeux_video SET prix = :nvprix WHERE possesseur = :possesseur');
                $req->execute(array(
                	'nvprix' => $nvprix,
                	'possesseur' => $possesseur
                	));
                echo "Prix modifié ..";

                $query = $bdd->query('SELECT * FROM jeux_video where console ="PS2"');

                // On affiche chaque entrée une à une
                while ($data = $query->fetch()) {
                ?>
                     <p>Bonjour <?php echo $data[possesseur]; ?>  </p>
                <?php
                }
                
                $query->closeCursor();
                
                
            ?>
        </div>
        <div class="row">
          <form class="form-group heartcenter col-md-12" action="action_page.php" method="post">
              Ton nom : <input type="text" name="nom" value=""> <br>
              Ton Prénom : <input type="text" name="prenom" value=""> <br>
              <button type="submit" name="button"> Valider ! </button>
            </form>
        </div>
        <div class="row">
<a class="heartcenter col-md-12 beerRotate" href="alix.php?nom=Jöhr&amp;prenom=Alix"><i class="fa fa-snowflake-o fa-spin fa-5x" aria-hidden="true"></i></a>
        </div>
        <div class="row">
<a class="heartcenter col-md-12 beerRotate" href="alix.php?nom=Jöhr&amp;prenom=Alix"><i class="fa fa-snowflake-o fa-spin fa-5x" aria-hidden="true"></i></a>
        </div>
        <div class="row">
            <img src="img/img0.jpg"> ko</img>
        </div>
              <nav class="navbar sticky-top navbar-light bg-light">
        <a class="navbar-brand" href="#">Sticky top</a>
      </nav>
                <div class="row">
            <img src="img/img0.jpg"> ok</img>
        </div>
                <div class="row">
            <img src="img/img0.jpg">ko</img>
        </div>
    </div>
</div>


  </script>
<?php
include('include/footer.php'); ?>
