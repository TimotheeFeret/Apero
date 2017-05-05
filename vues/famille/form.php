<?php $emptyTab = "<li class=\"tab empty\"><a href=\"#empty\"></a></li>" ?>

<div class="row">
    <form class="col s12">
        <div class="row" id="Informations">
            <div class="input-field">
                <i class="material-icons prefix">account_circle</i>
                <input id="nom" name="nom" type="text" required>
                <label for="nom">Nom</label>
            </div>

            <div class="row">
                <div class="col s6">
                    <div class="input-field">
                        <i class="material-icons prefix">location_city</i>
                        <input id="code_postal" name="code_postal" type="text" required>
                        <label for="code_postal">Code postal</label>
                    </div>
                </div>

                <div class="col s6">
                    <div class="input-field">
                        <input id="ville" name="ville" type="text" required>
                        <label for="ville">Ville</label>
                    </div>
                </div>
            </div>

            <div class="input-field">
                <i class="material-icons prefix">place</i>
                <input id="adresse" name="adresse" type="text" required>
                <label for="adresse">Adresse</label>
            </div>

            <div class="input-field">
                <i class="material-icons prefix">phone</i>
                <input id="telephone" name="telephone" type="text" required>
                <label for="telephone">Téléphone</label>
            </div>
        </div>

        <!--        Liste des enfants-->
        <span class="new badge large" data-badge-caption="Appuyez sur la touche '+' ou '-' de votre clavier pour gérer les enfants"></span>
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
    var eventPage = <?php echo json_encode(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME)); ?>;
</script>
<script type="application/javascript" src="assets/js/base_components.js"></script>
<script type="application/javascript" src="assets/js/famille/form.js"></script>