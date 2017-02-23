<script type="text/javascript">
	var i = 1;

	function nextEtape() {
		 var Contenu = '<div class="col s12 m6"><div class="card blue-grey darken-1"><div class="card-content white-text"><span class="card-title">' + i +'</span><p>' + i +'</p></div><div class="card-action"><a onclick="nextEtape()">Passer a la prochaine etape</a></div></div></div>';
        document.getElementById('etape').innerHTML = Contenu;
        i++;
	}

</script>

<center><h2><?php echo $recetteData[$i]['nom_recette'] ?></h2></center>
<br><br>
<center><h5><?php echo $recetteData[$i]['categorie'] ?></h5></center>
<!-- boucle a faire -->
	<b><?php echo $recetteData[$i]['quantite'] ?> <?php echo $donnee['mesure'] ?> de <?php echo $donnee['ingredient'] ?></b><br>

<br><h5>Les étapes de preparation</h5><br>


<div class="row" id="etape" style="width: 80%; margin-left: 10">
    <div class="col s12 m6">
        <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">etape nb</span>
              <p>contenue</p>
            </div>
            <div class="card-action">
              <a onclick="nextEtape()">Passer a la prochaine etape</a>
            </div>
        </div>
    </div>
</div>
