<div class="row">
    <form class="col s12">
        <div class="row">
            <div class="input-field">
                <i class="material-icons prefix">book</i>
                <input id="isbn" type="text" class="validate" required>
                <label for="isbn">ISBN</label>
            </div>

            <div class="input-field">
                <i class="material-icons prefix">font_download</i>
                <input id="nom_livre" type="text" class="validate" required>
                <label for="nom_livre">Nom</label>
            </div>

            <div class="input-field">
                <i class="material-icons prefix">euro_symbol</i>
                <input id="prix" type="text" class="validate" required>
                <label for="prix">Prix</label>
            </div>

            <div class="input-field">
                <i class="material-icons prefix">date_range</i>
                <input id="annee_usage" type="text" class="validate" required>
                <label for="annee_usage">Année d'usage</label>
            </div>
        </div>

        <button class="btn waves-effect waves-light right" type="submit">
            <?php echo $submit_text ?>
        </button>
    </form>


</div>

<script type="application/javascript" src="assets/js/livre/form.js"></script>