<?php
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
<?php $nom = strip_tags($_POST['nom']);
$prenom = strip_tags($_POST['prenom']);
?>
<script type="text/javascript">
  alert('<?php echo "Bonjour ".$prenom." ".$nom ; ?>');
</script>
<script type="text/javascript">
  alert("Ça va ?");
</script>
<script type="text/javascript">
  alert("Moi ça va");
</script>
<script type="text/javascript">
  alert("Bon j'arrête de t'embêter");
</script>
<script type="text/javascript">
  alert("mmh non en faite :D");
</script>
<script type="text/javascript">
  alert("...");
</script>
<?php
include('include/footer.php')?>
