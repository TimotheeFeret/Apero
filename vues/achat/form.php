<?php
include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/assets/php/BaseComponent.php';
?>

<div class="row">
    <form class="col s12">
        
        <div id="Informations">
            <div class="row">
                <!--            Famille acheteuse-->
                <div class="input-field">
                    <i class="material-icons prefix">people</i>
                    <select name="famille_acheteuse_id" required>
                        <option value="" disabled selected>Choisissez une famille</option>
                        <option value="1">Famille 1</option>
                        <option value="2">Famille 2</option>
                        <option value="3">Famille 3</option>
                    </select>
                    <label>Famille acheteuse</label>
                </div>
            </div>
        </div>


        <!--        Exemplaires achetés-->
        <?php
        BaseComponent::listEdit('Exemplaires achetés', 'Ajouter un exemplaire', 'Exemplaires');
        ?>

        <button class="btn waves-effect waves-light right" type="submit">
            Valider - Total 34,99 €
        </button>

    </form>
</div>

<script type="application/javascript" src="assets/js/base_components.js"></script>
<script type="application/javascript" src="assets/js/achat/form.js"></script>