<div class="row">
            <form class="col s12" action="add" method="post">
                <input type="hidden" name="submited" value="true">
                <div class="row">
                    <h5>Utilisateur</h5>
                    <div class="col s12">
                        <div class="input-field inline" style="width: 40%">
                            <input name="pseudo" id="pseudo" type="text" class="validate">
                            <label for="pseudo" data-error="wrong" data-success="right">pseudo</label>
                        </div>
                        <div class="input-field inline" style="width: 58%">
                            <input name="email" id="email" type="email" class="validate">
                            <label for="email" data-error="wrong" data-success="right">Email</label>
                        </div>
                    </div>
                </div>
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
                    <div class="input-field col s6">
                        <input name="quantite0" id="quantite" type="text" class="validate">
                        <label for="quantite">Quantité</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="ingredient0" id="ingredient" type="text" class="validate">
                        <label for="ingredient">Ingredient</label>
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