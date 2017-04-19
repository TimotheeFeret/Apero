<div class="row">
    <form class="col s12">
        <div class="row">
            <div class="input-field">
                <i class="material-icons prefix">account_circle</i>
                <input id="nom" type="text" class="validate" required>
                <label for="nom">Nom</label>
            </div>

            <div class="input-field">
                <i class="material-icons prefix">place</i>
                <input id="adresse" type="text" class="validate" required>
                <label for="adresse">Adresse</label>
            </div>

            <div class="input-field">
                <i class="material-icons prefix">phone</i>
                <input id="telephone" type="text" class="validate" required>
                <label for="telephone">Téléphone</label>
            </div>
        </div>

<!--        Liste des enfants-->
        <h5>Enfants</h5>
        <div class="card">
            <div class="card-tabs ">
                <ul class="tabs tabs-fixed-width white-text">
                    <li class="tab"><a href="#test4">Test 1</a></li>
                </ul>
            </div>
            <div class="card-content grey lighten-5">
                <div id="test4">
                    <span>
                        <div class="row">
                            <div class="input-field col s6">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="nom_enfant_1" type="text" class="validate" required>
                                <label for="nom_enfant_1">Nom</label>
                            </div>

                            <div class="input-field col s6">
                                <input id="prenom_enfant_1" type="text" class="validate" required>
                                <label for="prenom_enfant_1">Prénom</label>
                            </div>
                        </div>

                        <div class="input-field">
                            <i class="material-icons prefix">date_range</i>
                            <input id="date_naissance_enfant_1" type="date" class="datepicker">
                            <label for="date_naissance_enfant_1">Date de naissance</label>
                        </div>

                        <div class="input-field">
                            <i class="material-icons prefix">class</i>
                            <select>
                                <option value="" disabled selected>Choisissez une section</option>
                                <option value="1">Section 1</option>
                                <option value="2">Section 2</option>
                                <option value="3">Section 3</option>
                            </select>
                            <label>Section</label>
                        </div>
                    </span>
                </div>
            </div>

            <div class="card-action">
                <a href="#">Ajouter un enfant</a>
            </div>
        </div>

        <button class="btn waves-effect waves-light right" type="submit">
            <?php echo $submit_text ?>
        </button>
    </form>
</div>

<script type="application/javascript" src="assets/js/famille/form.js"></script>