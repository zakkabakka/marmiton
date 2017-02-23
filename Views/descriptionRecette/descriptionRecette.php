<script type="text/javascript">
	function nextEtape(nb) {
    var Contenu = document.getElementById('etape'+nb).innerHTML;
        document.getElementById('etape').innerHTML = Contenu;
	}

</script>
<div style="width: 70%; margin-left: 15%">
<p>recette créé par <?php echo $recetteDataID[0]['pseudo'] ?></p>
<center><h2><?php echo $recetteDataID[0]['nom_recette'] ?></h2></center>
<br><br>
<center><h5>categorie: <b><?php echo $recetteDataID[0]['categorie'] ?></b></h5></center><br>
<!-- boucle a faire -->
<h5>Ingredient utilisé pour la preparation de la recette :</h5><br>
<ul class="collection">
<?php 
  for ($i=0; $i < count($recetteDataID); $i++) { 
   ?>
    <li class="collection-item"><center><p><?php echo $recetteDataID[$i]['quantite'] ?> <?php echo $recetteDataID[$i]['mesure'] ?> de <?php echo $recetteDataID[$i]['nom'] ?></p></center></li>
   <?php
  }
?>
</ul>
<br><h5>Les étapes de preparation</h5><br>


<div class="row" id="etape">
    <div class="col s12 m12">
        <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">etape <?php if ($etapeData[0]['etape'] == count($etapeData)) {
                  echo "final";
                } else {
                  echo $etapeData[0]['etape']; 
                  }?></span>
              <p><?php echo $etapeData[0]['contenu']; ?></p>
            </div>
            <?php if ($etapeData[0]['etape'] != count($etapeData)) {
              ?>
              <div class="card-action">
              <a onclick="nextEtape(<?php echo $etapeData[1]['etape']?>)">Passer a la prochaine etape</a>
            </div>
              <?php
                }?>
        </div>
    </div>
</div>
<?php 
for ($i=1; $i < count($etapeData); $i++) { 
?>
<div class="row" id="etape<?php echo $etapeData[$i]['etape']; ?>" style="visibility: hidden;">
    <div class="col s12 m12">
        <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">etape <?php if ($etapeData[$i]['etape'] == count($etapeData)) {
                  echo "final";
                } else {
                  echo $etapeData[$i]['etape']; 
                  }?></span>
              <p><?php echo $etapeData[$i]['contenu']; ?></p>
            </div>
            <?php if ($etapeData[$i]['etape'] < count($etapeData)) {
              ?>
              <div class="card-action">
              <a onclick="nextEtape(<?php echo $etapeData[$i+1]['etape']; ?>)">Passer a la prochaine etape</a>
            </div>
              <?php
                }?>
        </div>
    </div>
</div>
<?php
}
?>

<form action="/description/recette/<?php echo $recetteDataID[0]['id_recette']?>" method="post">
  <h5>Notez la recette *</h5><br>

    <div class="rating"><!--
      --><a href="#1" name="note1" title="Give 1 stars">☆</a><!--
      --><a href="#2" name="note2" title="Give 2 stars">☆</a><!--
      --><a href="#3" name="note3" title="Give 3 stars">☆</a><!--
      --><a href="#4" name="note4" title="Give 4 stars">☆</a><!--
      --><a href="#5" name="note5" title="Give 5 stars">☆</a>
    </div>

  <br><h5>Mettre un commentaire</h5><br>
      <div class="input-field" style="width: 60%; margin-top: 2%">
          <input id="first_name2" type="text" name="commentaire" class="validate">
      </div>
      <a class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>Commenter</a><br><br>
</form>
<br><br><h5>Voir les commentaires</h5><br>
 <?php foreach($CommentaireData as $commentaire): ?>
<div class="row" id="etape">
    <div class="col s12 m12">
        <div class="card-panel teal">
            <div class="card-content white-text">
              <span class="card-title"><?php echo $commentaire['commentaire'];?></span>
              <p>commenter par zakka</p>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

</div>


