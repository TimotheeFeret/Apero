<div class="row">
    <form class="col s12">
        <div class="row">
            <div class="input-field">
                <i class="material-icons prefix">account_circle</i>
                <input id="nom" type="text" class="validate" required>
                <label for="nom">Nom</label>
            </div>

            <div class="input-field">
                <i class="material-icons prefix">phone</i>
                <input id="telephone" type="text" class="validate" required>
                <label for="telephone">Téléphone</label>
            </div>
        </div>
        
        <button class="btn waves-effect waves-light right" type="submit">
            <?php echo $submit_text ?>
        </button>
    </form>
</div>
<script type="application/javascript" src="assets/js/etablissement/form.js"></script>