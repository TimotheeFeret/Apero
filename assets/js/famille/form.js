/**
 * Created by jerem on 19/04/2017.
 */

$( document ).ready(function() {
    var tabEnfants = $('#TabsEnfants');
    var contentEnfant = $('#CardEnfant').find('.card-content');
    var nbEnfants = 0; // Variable globale afin d'avoir un id unique
    var btnAddEnfant = $('#BtAddEnfant');
    var btnDelEnfant = $('#BtDeleteEnfant');

    initBtnSupprimerEnfant();

    var data = JSON.stringify({enfant: {id: 'test', name: 'nametest'}});

    // EVENTS
    // A la soumission du formulaire
    $(document).submit(function() {
        event.preventDefault();

        // Sérialize les données des enfants
        var enfants = {};   var i = 0;
        // Parcours les enfants
        $.each($('#Enfants>div'), function (indexEnfant, valEnfant) {
            var enfant = {};

            // Parcours les informations des enfants
            $.each($(valEnfant).find("input[type!='hidden']"), function (indexInfo, valInfo) {
                var name = $(valInfo).attr('name');

                if(name == undefined)
                    return;

                name = name.split('#')[0];

                enfant[name] =  $(valInfo).val();
            });
            enfants[i++] = enfant;
        });
        enfants = JSON.stringify(enfants);

        $.ajax({
            url: '/apero/test/test.php',
            type: 'POST',
            dataType: 'json',
            data: {data: {'famille': $('#Informations :input').serialize(),  'enfants': enfants}},
        })
        .done(function () {
            console.log("success");

        })
    });

    /**
     * Ajoute le formulaire d'ajout d'un enfant
     */
    btnAddEnfant.click(function() {
        event.preventDefault();

        $('li.empty').remove(); // Supprime le tab obligatoire

        var id = 'enfant_'+(++nbEnfants);
        
        tabEnfants.append(constructTabEnfant(id));
        contentEnfant.append(constructFormEnfant(id));

        initBtnSupprimerEnfant();
        initDateNaissance();
        initSelect();
        initEventsFormEnfants();
        initTabs();

        tabEnfants.tabs('select_tab', id);
    });

    /**
     * Supprime le formulaire d'ajout d'un enfant
     */
    btnDelEnfant.click(function() {
        event.preventDefault();

        if(tabEnfants.find('li').length == 1)
            tabEnfants.append(emptyTab) // Ajoute le tab obligatoire

        $('li.tab>a.active').closest('li.tab').remove(); // Suppresion de l'onglet
        $('.tab_content.active').closest('.tab_content').remove(); // Supression du formulaire
        initTabs();

        var id = tabEnfants.find('li:first a').attr('href');

        if( id != undefined ) {
            id = id.replace('#', '');
            tabEnfants.tabs('select_tab', id);
        }

        initBtnSupprimerEnfant();
    });

    // FUNCTIONS

    /**
     * Supprime l'enfant courant
     */
    function initBtnSupprimerEnfant() {
        if(tabEnfants.find('li').length == 0) {
            btnDelEnfant.fadeOut();
        } else {
            btnDelEnfant.fadeIn();
        }
    }

    /**
     * Ajout les evenements lié au formulaire d'un enfant
     * @param id
     */
    function initEventsFormEnfants(id) {

        /**
         * Quand ecrit dans prénom enfant, ajoute son prénom dans le nom de l'onglet
         */
        $('.prenom_enfant').on('keyup', function() {
            var prenomTypped = $(this).val();
            var idTab = $(this).closest('.tab_content').attr('id');
            var tab = $('li.tab a[href="#'+idTab+'"]');

            if( prenomTypped == '' ) {
                tab.text('Inconnu');
            } else {
                tab.text(prenomTypped);
            }

            $('ul.tabs').tabs();
        });
    }

    /**
     * Création d'un onglet pour les enfants
     * @returns jQuery Un onglet enfant
     */
    function constructTabEnfant(idEnfant) {
        var li = $('<li>', { class: 'tab'});
        var a = $('<a>', { href: "#"+idEnfant, text: 'Inconnu'});

        return li.append(a);
    }

    /**
     * Création du formulaire pour ajouterun enfant
     * @param idEnfant Suffixe des ids des éléments
     * @returns jQuery Le formulaire jQuery
     */
    function constructFormEnfant(idEnfant) {
        var div = $('<div>', {id: idEnfant, class: 'tab_content'});
        var row = $('<div>', { class: 'row'});
        var input_field = $('<div>', { class: 'input-field'});
        var icon = $('<i>', { class: 'material-icons prefix'});
        var input_text = $('<input>', { type: 'text', class: 'validate', required: 'true'});
        var input_date = $('<input>', { type: 'date', class: 'datepicker validate', required: 'true'});
        var select = $('<select>');
        var label = $('<label>');

        // Nom
        var input_field_nom = input_field.clone().addClass('col s6');
        input_field_nom.append(icon.clone().text('account_circle'));
        input_field_nom.append(input_text.clone().attr('name', 'nom#'+idEnfant));
        input_field_nom.append(label.clone().attr('for', 'nom#'+idEnfant).text('Nom'));

        // Prénom
        var input_field_prenom = input_field.clone().addClass('col s6');
        input_field_prenom.append(input_text.clone().attr('name', 'prenom#'+idEnfant).addClass('prenom_enfant'));
        input_field_prenom.append(label.clone().attr('for', 'prenom#'+idEnfant).text('Prénom'));

        // Date de naissance
        var input_field_date_naissance = input_field.clone();
        input_field_date_naissance.append(icon.clone().text('date_range'));
        input_field_date_naissance.append(input_date.clone().attr({name: 'date_naissance#'+idEnfant, id: 'date_naissance#'+idEnfant}));
        input_field_date_naissance.append(label.clone().attr('for', 'date_naissance#'+idEnfant).text('Date de naissance'));

        // Sections
        var input_field_section = input_field.clone();
        input_field_section.append(icon.clone().text('class'));
        input_field_section.append(select.clone().attr('name', 'section#'+idEnfant));
        input_field_section.append(label.clone().attr('for', 'section#'+idEnfant).text('Section'));

        row.append(input_field_nom);
        row.append(input_field_prenom);
        div.append(row);

        div.append(input_field_date_naissance);
        div.append(input_field_section);

        return div;
    }

    function initDateNaissance() {
        $('.datepicker').pickadate({
            selectMonths: true,
            selectYears: 15,
            max: new Date(2007,12,31)
        });
    }
});
