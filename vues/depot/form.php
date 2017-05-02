<div class="row">
    <form class="col s12">

        <div class="row">

<!--            Famille déposante-->
            <div class="input-field">
                <i class="material-icons prefix">people</i>
                <select>
                    <option value="" disabled selected>Choisissez une famille</option>
                    <option value="1">Famille 1</option>
                    <option value="2">Famille 2</option>
                    <option value="3">Famille 3</option>
                </select>
                <label>Famille déposante</label>
            </div>
        </div>

<!--        Exemplaires déposés-->
        <h5>Exemplaires déposés</h5>
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div id="CardExemplaires" class="card-content">

                        <div class="row">
<!--                            Formulaire pour l'ajout d'un exemplaire-->
                            <div class="input-field col s5">
                                <i class="material-icons prefix">book</i>
                                <select>
                                    <option value="" disabled selected>Choisissez un livre</option>
                                    <option value="1">Livre 1</option>
                                    <option value="2">Livre 2</option>
                                    <option value="3">Livre 3</option>
                                </select>
                                <label>Livre de référence</label>
                            </div>

                            <div class="input-field col s3">
                                <i class="material-icons prefix">grade</i>
                                <select>
                                    <option value="" disabled selected>Choisissez un état</option>
                                    <option value="1">Etat 1</option>
                                    <option value="2">Etat 2</option>
                                    <option value="3">Etat 3</option>
                                </select>
                                <label>État du livre</label>
                            </div>

                            <div class="input-field col s3">
                                <i class="material-icons prefix">euro_symbol</i>
                                <input id="prix_livre_1" type="text" class="validate" required>
                                <label for="prix_livre_1">Prix</label>
                            </div>

                            <div class="input-field col s1">
                                <a class="waves-effect waves-light btn"><i class="material-icons">delete</i></a>
                            </div>
                        </div>
                        
                    </div>

                    <div class="card-action">
                        <a id="BtAddExemplaire" href="#">Ajouter un exemplaire</a>
                    </div>
                </div>
            </div>
        </div>

        <button class="btn waves-effect waves-light right" type="submit">
            Valider
        </button>

    </form>
</div>

<script type="application/javascript" src="assets/js/base_components.js"></script>
<script type="application/javascript" src="assets/js/depot/form.js"></script>