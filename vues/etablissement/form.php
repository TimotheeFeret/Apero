<div class="row">
    <form class="col s12">
        <div class="row">
            <div class="input-field">
                <i class="material-icons prefix">account_circle</i>
                <input id="nom" name="nom" type="text" class="validate" required>
                <label for="nom">Nom</label>
            </div>

            <div class="input-field">
                <i class="material-icons prefix">phone</i>
                <input id="telephone" name="telephone" type="text" class="validate" required>
                <label for="telephone">Téléphone</label>
            </div>

            <div class="input-field">
                <i class="material-icons prefix">people</i>
                <select name="sections" required multiple>
                    <option value="" disabled selected>Choisissez des sections</option>
                    <option value="1">Classe 1</option>
                    <option value="2">Classe 2</option>
                    <option value="3">Classe 3</option>
                </select>
                <label>Sections</label>
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
</script>
<script type="application/javascript" src="assets/js/etablissement/form.js"></script>