<?php
session_start();
$_SESSION['name'] = "Julius";
setcookie('pays', 'Suisse', time() + 3600 * 24 * 365, null, null, false, true);
include('include/header.php'); ?>
<nav class="navbar sticky-top navbar-light bg-light" id = "navbar">
  <a class="navbar-brand" href="#">Full width</a>
</nav>
<div class="container-fluid red">
    <div class="container blue">
        <div class="row">
<a class="heartcenter col-md-12 beerRotate" href="alix.php?nom=Jöhr&amp;prenom=Alix"><i class="fa fa-snowflake-o fa-spin fa-5x" aria-hidden="true"></i></a>
        </div>
        <div class="row">
<a class="heartcenter col-md-12 beerRotate" href="alix.php?nom=Jöhr&amp;prenom=Alix"><i class="fa fa-snowflake-o fa-spin fa-5x" aria-hidden="true"></i></a>
        </div>
        <div class="row">
          <form class="form-group heartcenter col-md-12" action="alix.php" method="post">
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
