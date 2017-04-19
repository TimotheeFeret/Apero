<div class="row">
    <form class="col s12">

        <div class="row">

            <!--            Famille acheteuse-->
            <div class="input-field">
                <i class="material-icons prefix">people</i>
                <select>
                    <option value="" disabled selected>Choisissez une famille</option>
                    <option value="1">Famille 1</option>
                    <option value="2">Famille 2</option>
                    <option value="3">Famille 3</option>
                </select>
                <label>Famille acheteuse</label>
            </div>
        </div>

        <!--        Exemplaires achetés-->
        <h5>Exemplaires achetés</h5>
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content">

                        <div class="row">

                            <!--                            Formulaire pour l'ajout d'un exemplaire-->
                            <div class="input-field col s4">
                                <i class="material-icons prefix">book</i>
                                <select>
                                    <option value="" disabled selected>Choisissez un livre</option>
                                    <option value="1">Livre 1</option>
                                    <option value="2">Livre 2</option>
                                    <option value="3">Livre 3</option>
                                </select>
                                <label>Livre de référence</label>
                            </div>

                            <div class="input-field col s4">
                                <i class="material-icons prefix">bookmark</i>
                                <select>
                                    <option value="" disabled selected>Choisissez un exemplaire</option>
                                    <option value="1">Exemplaire 1</option>
                                    <option value="2">Exemplaire 2</option>
                                    <option value="3">Exemplaire 3</option>
                                </select>
                                <label>Exemplaire</label>
                            </div>

                            <div class="input-field col s4">
                                <i class="material-icons prefix">euro_symbol</i>
                                <input id="prix_livre_1" type="text" class="validate" required disabled>
                                <label for="prix_livre_1">Prix</label>
                            </div>
                        </div>
                    </div>

                    <div class="card-action">
                        <a href="#">Ajouter un exemplaire</a>
                    </div>
                </div>
            </div>
        </div>

        <button class="btn waves-effect waves-light right" type="submit">
            Valider - Total 34,99 €
        </button>

    </form>
</div>

<script type="application/javascript" src="assets/js/depot/form.js"></script>