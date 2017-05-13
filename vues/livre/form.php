<?php
include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'modeles/livre.php';

// Données du livre
$data = null;
if(!empty($_GET['id'])) {
    $livre = new Livre($_GET['id']);
    $data = $livre->get($_GET['id'])[0];
}
?>

<div class="row">

    <form id="form" class="col s12" novalidate="novalidate" autocomplete="off">
        <div class="row">
            <div class="input-field">
                <i class="material-icons prefix">book</i>
                <input id="isbn" name="isbn" type="text" required>
                <label for="isbn">ISBN</label>
            </div>

            <div class="input-field">
                <i class="material-icons prefix">font_download</i>
                <input id="nom_livre" name="nom_livre" type="text" required>
                <label for="nom_livre">Nom</label>
            </div>

            <div class="input-field">
                <i class="material-icons prefix">euro_symbol</i>
                <input id="prix"  name="prix" type="text" required>
                <label for="prix">Prix</label>
            </div>

            <div class="input-field">
                <i class="material-icons prefix">date_range</i>
                <input id="annee_usage" name="annee_usage" type="text" required>
                <label for="annee_usage">Année d'usage</label>
            </div>
        </div>

        <button class="btn waves-effect waves-light right" type="submit">
            <?php echo $submit_text ?>
        </button>
    </form>


</div>

<script>
    var id = <?php echo json_encode( (empty($_GET['id']) ? null : $_GET['id']) ); ?>;
    var eventPage = <?php echo json_encode(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME)); ?>;
    var data = <?php echo json_encode($data); ?>;
</script>
<script type="application/javascript" src="assets/js/livre/form.js"></script>