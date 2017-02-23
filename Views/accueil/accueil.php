<div class="containerPage">
    <div class="encart" align="center">
        <form action="search/recette" method="get">
            <div class="white" style="width: 70%; margin-top: 4%; border-radius: 50px;">
                <br>
                <div class="input-field" style="width: 60%; margin-top: 2%">
                    <input id="first_name2" type="text" name="search" class="validate">
                    <label class="active" for="first_name2">Rechercher une recette</label>
                </div>
                <a class="btn-floating btn-large waves-effect waves-light orange darken-3"><i
                        class="material-icons">search</i></a><br><br>
            </div>
        </form>
    </div>
        <br><center><a class="waves-effect waves-light btn" style="width: 80%" href="recette/add">Ajouter une recette</a></center>
    <?php
    
     $recetteID = NULL;
     if (isset($recetteData)) {
         for ($g=0; $g < count($recetteData); $g++) {
            for ($i=0; $i < count($recetteData[$g]); $i++) { 
                if ($recetteID != $recetteData[$g][$i]['id_recette']) {
                    $recetteID = $recetteData[$g][$i]['id_recette'];
                    ?>
        <div class="rowpage">
            <div class="col s12 m7">
                <div class="card horizontal">
                    <div class="card-image">
                        <img src="http://www.photos-gratuites.org/wp-content/gallery/photo-plat/photo-plat6.jpg">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            Crée par <?php echo $recetteData[$g][$i]['pseudo']; ?>
                            <center><h4 style="color: teal"><?php echo $recetteData[$g][$i]['nom_recette']; ?></h4></center>
                            <center>categorie:<h5><b><?php echo $recetteData[$g][$i]['categorie']; ?></b></h5></center>
                            <br><br>
                            <b>Ingredient de la recette:</b>
                            <?php 
                            for ($y=0; $y < count($recetteData[$g]); $y++) { 
                            if ($recetteID == $recetteData[$g][$y]['id_recette']) {
                            ?>
                                <p><?php echo $recetteData[$g][$y]['quantite']; ?> <?php echo $recetteData[$g][$y]['mesure']; ?> de <?php echo $recetteData[$g][$y]['nom']; ?></p>
                            <?php
                               }
                            }
                            ?>
                            <p></p>
                        </div>
                        <div class="card-action">
                            <a href="description/recette/<?php echo $recetteID ?>">Acceder a la recette</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            } 
        }
        }
    }
    ?>
</div>