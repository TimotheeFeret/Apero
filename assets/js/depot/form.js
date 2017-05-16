/**
 * Created by jerem on 19/04/2017.
 */

$( document ).ready(function() {
    var btnAddExemplaire = $('#BtAddExemplaires');
    var cardExemplaires = $('#ContentExemplaires');
    var nbExemplaires = 0; // Variable globale afin d'avoir un id unique

    /**
     * Initialisation du formulaire
     */
    addOptionsToSelect($('#famille_vendeuse_id'), familles, 'id', 'nom', 'Choisissez une famille');
    initSelect();

    $(document).submit(function() {
        event.preventDefault();

        $.ajax({
                url: '/apero/controleurs/exemplaire.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    event: 'add',
                    data: serialize($('#Informations :input')),
                    exemplaires: serializeArray(cardExemplaires.find('>div'))
                }
            })
            .done(function (data) {
                if (data.error === undefined) {
                    getBonDepot();
                }
            });

    });
    
    // EVENTS
    /**
     * Sur l'appuie du bouton "AJOUTER UN EXEMPALIRE"
     */
    btnAddExemplaire.click(function() {
        event.preventDefault();
        addExemplaire();
    });

    /**
     * Sur l'appuie d'une touche au clavier
     */
    $(document).on('keyup', function (e) {
        switch (e.keyCode) {
            case 107: // '+ ver. num'
            case 187: // '+ ligne de chiffre'
                addExemplaire();
                break;

            case 109: // '- ver. num'
            case 54: // '- ligne de chiffre'
                cardExemplaires.find('.row').last().remove(); // Supprime le dernier exemplaire
                break;
            default:
        }
    });

    // FUNCTIONS
    function getBonDepot() {
        $.ajax({
                url: '/apero/modeles/documents/depot.php',
                type: 'POST',
                dataType: 'json',
                data: {id: $('#famille_vendeuse_id').val()},
            })
            .done(function (data) {
                window.open(data, '_blank');
            });
    }

    function refreshPrix(row) {
        var prix = row.find('select.exemplaire').find('option:selected').attr('data-prix');
        var decote = row.find('select.etat').find('option:selected').attr('data-decote');

        if(prix == undefined || decote == undefined) return;

        var input_prix = row.find('.prix');
        var prixCalculated = prix * ((100-decote)/100);
        prixCalculated = Math.round(prixCalculated * 100) / 100;
        prixCalculated = prixCalculated.toLocaleString('en-EN', {minimumFractionDigits: 2});
        prixCalculated = pad(prixCalculated, 5);
        input_prix.val(prixCalculated + ' €');

        Materialize.updateTextFields();
    }

    /**
     * Ajoute un exemplaire
     */
    function addExemplaire() {
        cardExemplaires.append(constructRowExemplaire());

        initSelect();
        initEventsExemplaire();
    }

    /**
     * Contruit la ligne pour les informations de l'exemplaire
     * @returns {jQuery} la ligne jQuery
     */
    function constructRowExemplaire() {
        var id = 'exemplaire_'+(++nbExemplaires);

        var row = bc_row();

        // Livre de référence
        var input_field_livre = bc_input_field().addClass('col s6');
        var icon_livre = bc_icon().text('book');
        var select_livre = bc_select().attr('name', 'livre_id#'+id).addClass('exemplaire');
        var label_livre = bc_label().text('Exemplaire');
        addOptionsToSelect(select_livre, livres, 'id', 'nom_prix', 'Choisissez un livre', {'data-prix': 'prix'});
        input_field_livre
            .append(icon_livre)
            .append(select_livre)
            .append(label_livre);
        row.append(input_field_livre);

        // Etat
        var input_field_etat = bc_input_field().addClass('col s3');
        var icon_etat = bc_icon().text('star_rate');
        var select_etat = bc_select().attr('name', 'etat_id#'+id).addClass('etat');
        var label_etat = bc_label().text('État');
        addOptionsToSelect(select_etat, etats, 'id', 'etat_decote', 'Choisissez un état', {'data-decote': 'decote'});
        input_field_etat
            .append(icon_etat)
            .append(select_etat)
            .append(label_etat);
        row.append(input_field_etat);

        // Prix
        var input_field_prix = bc_input_field().addClass('col s2');
        var icon_prix = bc_icon().text('euro_symbol');
        var input_prix = bc_input_text().attr({'name': 'prix#'+id, 'autocomplete': 'off'}).addClass('prix');
        var label_prix = bc_label().text('Prix');
        input_field_prix
            .append(icon_prix)
            .append(input_prix)
            .append(label_prix)
        row.append(input_field_prix);

        // Supprimer
        var input_field_supprimer = bc_input_field().addClass('col s1');
        var icon_supprimer = bc_icon().text('delete');
        var button_supprimer = bc_button().addClass('delete_exemplaire').append(icon_supprimer.removeClass('prefix'));
        input_field_supprimer
            .append(button_supprimer);
        row.append(input_field_supprimer);

        return row;
    }

    /**
     * Supprime l'exemplaire
     */
    function initEventsExemplaire() {
        $('.prix').formatter({
            'pattern': '{{99}}.{{99}} €'
        });

        $('.delete_exemplaire').click(function () {
            $(this).closest('.row').remove();
        });

        $('.exemplaire').on('change', function () {
            refreshPrix($(this).closest('.row'));
        });

        $('.etat').on('change', function () {
            refreshPrix($(this).closest('.row'));
        });
    }
});
