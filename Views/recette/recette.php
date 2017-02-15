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
