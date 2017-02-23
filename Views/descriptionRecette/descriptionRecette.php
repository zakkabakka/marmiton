<script type="text/javascript">
	var i = 1;
  <?php $i = 1 ?>
	function nextEtape() {
		 var Contenu = '<div class="col s12 m12"><div class="card blue-grey darken-1"><div class="card-content white-text"><span class="card-title">etape <?php if ($etapeData[$i]['etape'] == count($etapeData)) { echo "final";} else {echo $etapeData[$i]['etape']; }?></span><p><?php echo $etapeData[$i]['contenu']; ?></p></div><?php if ($etapeData[$i]['etape'] != count($etapeData)) {
              ?><div class="card-action"><a onclick="nextEtape()">Passer a la prochaine etape</a></div><?php
                }?></div></div>';
        document.getElementById('etape').innerHTML = Contenu;
        <?php $i++; ?>
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
              <a onclick="nextEtape()">Passer a la prochaine etape</a>
            </div>
              <?php
                }?>
        </div>
    </div>
</div>

</div>


