<?php
// Données pour select
include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'modeles/etablissement.php';
include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'modeles/section.php';

// Données pour alimenter les selects
$section = new Section();
$section->setNomTable('v_section');
$sections = $section->get();

// Données de l'établissement
$data = null;
if(!empty($_GET['id'])) {
    $etablissement = new Etablissement($_GET['id']);
    $data = $etablissement->get($_GET['id']);
    if (empty($data[0])) {
        die('
        <div class="row center-align text-grey" style="margin-top: 100px;">
            <div class="col s12">
                <i class="material-icons md-80">highlight_off</i>
            </div>
            
            <div class="col s12">
                <h1>Établissement inexistant</h1>
            </div>
        </div>');
    } else {
        $data = $data[0];
    }

    $data['section_id'] = $etablissement->getSections();
}
?>

<div class="row">
    <form class="col s12" autocomplete="off">
        <div class="row">
            <div class="input-field">
                <i class="material-icons prefix">account_circle</i>
                <input id="nom" name="nom" type="text" required>
                <label for="nom">Nom</label>
            </div>

            <div class="input-field">
                <i class="material-icons prefix">phone</i>
                <input id="telephone" name="telephone" type="text" required>
                <label for="telephone">Téléphone</label>
            </div>

            <div class="input-field">
                <i class="material-icons prefix">people</i>
                <select name="section_id[]" id="section_id" required multiple></select>
                <label for="section_id">Sections</label>
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
    var sections = <?php echo json_encode($sections); ?>;
    var data = <?php echo json_encode($data); ?>;
</script>
<script type="application/javascript" src="assets/js/etablissement/form.js"></script>