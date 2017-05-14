<?php
include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/assets/php/BaseComponent.php';
include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'modeles/famille.php';
include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'modeles/etat.php';
include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'modeles/livre.php';

// Données pour alimenter les selects
$famille = new Famille();
$famille->setNomTable('v_famille');
$familles = $famille->get();

$etat = new Etat();
$etat->setNomTable('v_etat');
$etats = $etat->get();

$livre = new Livre();
$livre->setNomTable('v_stock');
$livres = $livre->get();
?>

<div class="row">
    <form class="col s12" autocomplete="off">
        
        <div id="Informations">
            <div class="row">
                <!--            Famille acheteuse-->
                <div class="input-field">
                    <i class="material-icons prefix">people</i>
                    <select name="famille_acheteuse_id" id="famille_acheteuse_id" required></select>
                    <label>Famille acheteuse</label>
                </div>
            </div>
        </div>


        <!--        Exemplaires achetés-->
        <?php
        BaseComponent::listEdit('Exemplaires achetés', 'Ajouter un exemplaire', 'Exemplaires');
        ?>

        <button class="btn waves-effect waves-light right" type="submit">
            Valider - Total <span class="total">0 €</span>
        </button>

    </form>
</div>

<script>
    var familles = <?php echo json_encode($familles); ?>;
    var livres = <?php echo json_encode($livres); ?>;
</script>
<script type="application/javascript" src="assets/js/base_components.js"></script>
<script type="application/javascript" src="assets/js/achat/form.js"></script>