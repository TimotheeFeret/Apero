<div class="row">

    <form id="form" class="col s12" novalidate="novalidate">
        <div class="row">
            <div class="input-field">
                <i class="material-icons prefix">book</i>
                <input id="id" name="id" type="text" required="" aria-required="true">
                <label for="id">ISBN</label>
            </div>

            <div class="input-field">
                <i class="material-icons prefix">font_download</i>
                <input id="nom_livre" name="nom_livre" type="text" required aria-required="true">
                <label for="nom_livre">Nom</label>
            </div>

            <div class="input-field">
                <i class="material-icons prefix">euro_symbol</i>
                <input id="prix"  name="prix" type="text" required aria-required="true">
                <label for="prix">Prix</label>
            </div>

            <div class="input-field">
                <i class="material-icons prefix">date_range</i>
                <input id="annee_usage" name="annee_usage" type="text" required aria-required="true">
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
    var event = <?php echo json_encode(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME)); ?>;
</script>
<script type="application/javascript" src="assets/js/livre/form.js"></script>