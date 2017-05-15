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
    addOptionsToSelect($('#famille_acheteuse_id'), familles, 'id', 'nom', 'Choissisez une famille');
    initSelect();

    $(document).submit(function() {
        event.preventDefault();

        $.ajax({
                url: '/apero/controleurs/exemplaire.php',
            type: 'POST',
            dataType: 'json',
                data: {
                    event: 'update',
                    data: serialize($('#Informations :input')),
                    exemplaires: serializeArray(cardExemplaires.find('>div'))
                }
        })
            .done(function (data) {
                if (data.error === undefined) {
                    getBonAchat();
                }
        });
        
    });

    function getBonAchat() {
        $.ajax({
            url: '/apero/modeles/documents/achat.php',
            type: 'POST',
            dataType: 'json',
            data: {id: $('#famille_acheteuse_id').val()},
            })
            .done(function (data) {
                window.open(data, '_blank');
        });
    }

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

        // Exemplaire
        var input_field_livre = bc_input_field().addClass('col s6');
        var icon_livre = bc_icon().text('book');
        var select_livre = bc_select().attr('name', 'livre_id#'+id).addClass('exemplaire');
        var label_livre = bc_label().text('Exemplaire');
        addOptionsToSelect(select_livre, livres, 'id', 'nom_etat', 'Choissisez un livre', {'data-prix': 'prix'});
        input_field_livre
            .append(icon_livre)
            .append(select_livre)
            .append(label_livre);
        row.append(input_field_livre);

        // Prix
        var input_field_prix = bc_input_field().addClass('col s5');
        var icon_prix = bc_icon().text('euro_symbol');
        var input_prix = bc_input_text().attr('name', 'prix#'+id).addClass('prix');
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

    function refreshTotal() {
        var total = 0;
        $.each($('.prix'), function (index, val) {
            var prix = $(val).val();

            if (prix == '') return;

            prix = Number(prix.replace(/[^0-9\.]+/g, "")); // Convert to number

            total += prix;
        });
        total = total.toLocaleString('en-EN', {minimumFractionDigits: 2});
        var pad = "00000";
        total = pad.substring(0, pad.length - total.length) + total;
        $('.total').text(total + ' €');
    }

    /**
     * Supprime l'exemplaire
     */
    function initEventsExemplaire() {
        $('.delete_exemplaire').click(function () {
            $(this).closest('.row').remove();
            refreshTotal();
        });

        $('.prix').formatter({
            'pattern': '{{99}}.{{99}} €'
        });

        $('.prix').on('keyup', function () {
            refreshTotal();
        });

        $('.exemplaire').on('change', function () {
            refreshTotal();
            var row = $(this).closest('.row');
            var prix = row.find('select.exemplaire').find('option:selected').attr('data-prix');

            if(prix == undefined) return;

            var input_prix = row.find('.prix');

            if (input_prix.val() != '') return;

            prix = prix.toLocaleString('en-EN', {minimumFractionDigits: 2});
            var pad = "00000";
            prix = pad.substring(0, pad.length - prix.length) + prix;
            input_prix.val(prix + ' €');

            Materialize.updateTextFields();
        });
    }
});