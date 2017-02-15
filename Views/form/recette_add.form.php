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
<div class="row">
            <form class="col s12" action="add" method="post">
                <input type="hidden" name="submited" value="true">
                <?php include 'user_add.form.php'; ?>
                <h5>Votre Recette</h5>
                <div class="row">
                    <div class="input-field col s8">
                        <input name="nom" id="name" type="text" class="validate">
                        <label for="name">Nom de la recette</label>
                    </div>
                    <div class="input-field col s4">
                        <input disabled id="Temps" type="text" class="validate">
                        <label for="Temps">Temps de préparation</label>
                    </div>
                    <div class="input-field col s4">
                        <select disabled>
                            <option value="" disabled selected>Choisir une option</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                        <label>Type de plat</label>
                    </div>
                    <div class="input-field col s4">
                        <select disabled>
                            <option value="" disabled selected>Choisir une option</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                        <label>Difficulté</label>
                    </div>
                    <div class="input-field col s4">
                        <select disabled>
                            <option value="" disabled selected>Choisir une option</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                        <label>Cout</label>
                    </div>
                </div>
                <div class="row" id="Cible">
                    <div class="input-field col s3">
                        <input name="quantites[0]" id="quantite0" type="text" class="validate">
                        <label for="quantite0">Quantité</label>
                    </div>
                    <div class="input-field col s3">
                        <select name="mesures[0]" id="mesures0">
                            
                        </select>
                    </div>
                    <div class="input-field col s6">
                        <input name="ingredients[0]" id="ingredient0" type="text" class="validate">
                        <label for="ingredient0">Ingredient</label>
                    </div>
                </div>
                <a class="btn-floating btn-large waves-effect waves-light right red" onclick="fAddText()">
                    <i class="material-icons">add</i></a><br><br>
                <div align="center">
                    <button class="btn waves-effect waves-light orange darken-3" type="submit" name="action">Envoyer la
                        recette
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
        </div>