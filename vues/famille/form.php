<?php
$emptyTab = "<li class=\"tab empty\"><a href=\"#empty\"></a></li>";

// Données pour select
include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/modeles/etablissement.php';
include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/modeles/classe.php';
include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/modeles/adhesion.php';
include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/assets/php/Utility.php';
include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/modeles/famille.php';

// Données pour alimenter les selects
$etablissement = new Etablissement();
$etablissements = $etablissement->get();

$adhesion = new Adhesion();
$adhesions = $adhesion->get();

$classe = new Classe();
$classe->setNomTable('v_classe');
$classes = Utility::arrayGroupBySameValue($classe->get(), 'etablissement_id'); // Regroupe les éléments par id d'établissement permttant une manipulation en JS simplifiée

// Données de la famille
$data = null;
if(!empty($_GET['id'])) {
    $famille = new Famille($_GET['id']);
    $data = $famille->get($_GET['id'])[0];
    $data['enfants'] = $famille->getEnfants();
}

?>

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
                        <input class="autocomplete" id="code_postal" name="code_postal" type="text" required>
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

            <div class="input-field">
                <i class="material-icons prefix">card_membership</i>
                <select name="adhesion_id" id="adhesion_id" required></select>
                <label for="adhesion_id">Status</label>
            </div>
        </div>

        <!--        Liste des enfants-->
        <span class="new badge lg-badge"
              data-badge-caption="Appuyez sur la touche '+' ou '-' de votre clavier pour gérer les enfants"></span>
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
    var id = <?php echo json_encode((empty($_GET['id']) ? null : $_GET['id'])); ?>;
    var emptyTab = <?php echo json_encode($emptyTab); ?>;
    var eventPage = <?php echo json_encode(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME)); ?>;
    var data = <?php echo json_encode($data); ?>;
    var etablissements = <?php echo json_encode($etablissements); ?>;
    var classes = <?php echo json_encode($classes); ?>;
    var adhesions = <?php echo json_encode($adhesions); ?>;
</script>
<script type="application/javascript" src="assets/js/base_components.js"></script>
<script type="application/javascript" src="assets/js/famille/form.js"></script>