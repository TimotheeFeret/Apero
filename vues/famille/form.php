<?php $emptyTab = "<li class=\"tab empty\"><a href=\"#empty\"></a></li>" ?>

<div class="row">
    <form class="col s12">
        <div class="row" id="Informations">
            <div class="input-field">
                <i class="material-icons prefix">account_circle</i>
                <input id="nom" name="nom" type="text" class="validate" required>
                <label for="nom">Nom</label>
            </div>

            <div class="input-field">
                <i class="material-icons prefix">place</i>
                <input id="adresse" name="adresse" type="text" class="validate" required>
                <label for="adresse">Adresse</label>
            </div>

            <div class="input-field">
                <i class="material-icons prefix">phone</i>
                <input id="telephone" name="telephone" type="text" class="validate" required>
                <label for="telephone">Téléphone</label>
            </div>
        </div>

<!--        Liste des enfants-->
        <h5>Enfants</h5>
        <div id="CardEnfant" class="card">
            <div class="card-tabs ">
                <ul id="TabsEnfants" class="tabs tabs-fixed-width white-text">
                   <?php echo $emptyTab ?> <!-- On est obligé de mettre un tab à la création -->-->
                </ul>
            </div>
            <div class="card-content grey lighten-5" id="Enfants">
            </div>

            <div class="card-action">
                <a href="#" id="BtAddEnfant">Ajouter un enfant</a>
                <a href="#" id="BtDeleteEnfant">Supprimer cet enfant</a>
            </div>
        </div>

        <button class="btn waves-effect waves-light right" type="submit">
            <?php echo $submit_text ?>
        </button>
    </form>
</div>

<script>
    var emptyTab = <?php echo json_encode($emptyTab); ?>;
</script>
<script type="application/javascript" src="assets/js/base_components.js"></script>
<script type="application/javascript" src="assets/js/famille/form.js"></script>