<?php
session_start();

$fichier = fopen('files/fichier.txt', 'r+');
$nbVues = fgets($fichier);
$nbVues++;
fseek($fichier, 0);
fputs($fichier, $nbVues);
fclose($fichier);
echo 'Page a été vu :'. $nbVues . ' fois.';

include('include/header.php') ?>

<div class="container-fluid red">
    <div class="container blue ">
        <div class="row">
            <article class="col-md-12 heartcenter"> 
                <h2>Coucou <?php echo htmlspecialchars($_POST['prenom']) . " " . strip_tags($_POST['nom']); ?> </h2>
              
            </article>
        </div>
        <div class="row">
            <article class="col-md-12 heartcenter"> 
                <img src="img/img99.jpg" class="img-fluid" alt="Responsive image">
            </article>
        </div>

    </div>
</div>
<nav class="navbar fixed-bottom navbar-light bg-light">
  <a class="navbar-brand" href="#">Fixed bottom</a>
</nav>
<?php $nom = strip_tags($_POST['nom']);
$prenom = strip_tags($_POST['prenom']);
$name = $_SESSION['name'];
$pays = isset($_COOKIE['pays']) ? ($_COOKIE['pays']): "";
?>
<script type="text/javascript">
  alert('<?php echo "Bonjour ".$prenom." ".$nom . " And tu etais aussi : " . $name . " de : " . $pays; ?>');
</script>


<?php
include('include/footer.php')?>
