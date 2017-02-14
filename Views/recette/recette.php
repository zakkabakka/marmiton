<script type="text/javaScript">
var i = 1;
function fAddText() {
    var Contenu = document.getElementById('Cible').innerHTML;
          Contenu = Contenu + '<br/><div class="input-field col s3"><input name="quantites[' + i +']" id="quantite" type="text" class="validate" required><label for="quantite">Quantité</label></div>' + 
            '<div class="input-field col s3"><select name="mesures[' + i +']" id="mesures0"></select></div>' +
            '<div class="input-field col s6"><input name="ingredients[' + i +']" id="ingredient" type="text" class="validate" required><label for="ingredient">Ingredient</label></div>';
          document.getElementById('Cible').innerHTML = Contenu;
          i++;
          //appel AJAX qui va retourner le select...
}
</script>
<div class="containerPage">
    <div class="encart" align="center">
        <div class="white" style="width: 70%; margin-top: 4%; border-radius: 50px;">
            <br>
            <h3>Ajout d'une recette</h3>
            <br>
        </div>
    </div>
    <div class="rowpage">
        <?php if($what == 'add_form'): ?>
            <?php include __DIR__.'/../form/recette_add.form.php'; ?>
        <?php elseif($what == 'add_success'): ?>
            <?php include __DIR__.'/../success/recette_add.success.php'; ?>
        <?php endif; ?>
    </div>
</div>
