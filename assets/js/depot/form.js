/**
 * Created by jerem on 19/04/2017.
 */

$( document ).ready(function() {
    var btnAddExemplaire = $('#BtAddExemplaires');
    var cardExemplaires = $('#ContentExemplaires');
    var nbExemplaires = 0; // Variable globale afin d'avoir un id unique

    $(document).submit(function() {
        event.preventDefault();

        $.ajax({
                url: '/apero/controleurs/exemplaire.php',
                type: 'POST',
                dataType: 'json',
                data: {event: 'add', data: $('#Informations :input').serialize(),  exemplaires: serializeArray(cardExemplaires.find('>div'))}
            })
            .done(function () {
                console.log("success");
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
        var select_livre = bc_select().attr('name', 'livre_id#'+id);
        var label_livre = bc_label().text('Exemplaire');
        input_field_livre
            .append(icon_livre)
            .append(select_livre)
            .append(label_livre);
        row.append(input_field_livre);

        // Prix
        var input_field_prix = bc_input_field().addClass('col s5');
        var icon_prix = bc_icon().text('euro_symbol');
        var input_prix = bc_input_text().attr('name', 'prix#'+id);;
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
        $('.delete_exemplaire').click(function () {
            $(this).closest('.row').remove();
        });
    }
});
