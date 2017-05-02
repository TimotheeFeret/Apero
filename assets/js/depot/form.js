/**
 * Created by jerem on 19/04/2017.
 */

$( document ).ready(function() {
    var nbExemplaire = 0; // Variable globale afin d'avoir un id unique
    var btnAddExemplaire = $('#BtAddExemplaire');
    var cardExemplaire = $('#CardExemplaires');

    $(document).submit(function() {
        event.preventDefault();
    });

    /**
     * Ajoute le formulaire d'ajout d'un exemplaire
     */
    btnAddExemplaire.click(function() {
        event.preventDefault();

        var id = 'exemplaire_'+(++nbExemplaire);

        cardExemplaire.append(constructRowExemplaire(id));

        initSelect();
    });

    function constructRowExemplaire(idExemplaire) {
        var row = bc_row();

        // Livre de référence
        var input_field_livre = bc_input_field().addClass('col s5');
        var icon_livre = bc_icon().text('book');
        var select_livre = bc_select();
        var label_livre = bc_label().text('Livre de référence');
        input_field_livre
            .append(icon_livre)
            .append(select_livre)
            .append(label_livre);
        row.append(input_field_livre);

        // État
        var input_field_etat = bc_input_field().addClass('col s3');
        var icon_etat = bc_icon().text('grade');
        var select_etat = bc_select();
        var label_etat = bc_label().text('État de l\'exemplaire');
        input_field_etat
            .append(icon_etat)
            .append(select_etat)
            .append(label_etat);
        row.append(input_field_etat);
        
        // Prix
        var input_field_prix = bc_input_field().addClass('col s3');
        var icon_prix = bc_icon().text('euro_symbol');
        var input_prix = bc_input_text();
        var label_prix = bc_label().text('Prix');
        input_field_prix
            .append(icon_prix)
            .append(input_prix)
            .append(label_prix)
        row.append(input_field_prix);
        
        // Supprimer
        var input_field_supprimer = bc_input_field().addClass('col s1');
        var icon_supprimer = bc_icon().text('delete');
        var button_supprimer = bc_button().append(icon_supprimer.removeClass('prefix'));
        input_field_supprimer
            .append(button_supprimer);
        row.append(input_field_supprimer);

        return row;
    }
});
