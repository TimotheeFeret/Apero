/**
 * Created by jerem on 19/04/2017.
 */

$( document ).ready(function() {
    var tabEnfants = $('#TabsEnfants');
    var contentEnfant = $('#CardEnfant').find('.card-content');
    var nbEnfants = 0; // Variable globale afin d'avoir un id unique
    var btnAddEnfant = $('#BtAddEnfant');
    var btnDelEnfant = $('#BtDeleteEnfant');

    refreshBtnSupprimerEnfant();

    // EVENTS
    // A la soumission du formulaire
    $(document).submit(function() {
        event.preventDefault();
        console.log('submit');

        $.ajax({
            url: '/apero/controleurs/famille.php',
            type: 'POST',
            dataType: 'json',
                data: {
                    event: eventPage,
                    data: serialize($('#Informations :input')),
                    enfants: serializeArray($('#Enfants>div'))
                }
        })
        .done(function () {
            console.log("success");
        });
    });

    /**
     * Initialisation des selects
     */
    addOptionsToSelect($('#adhesion_id'), adhesions, 'id', 'libelle', 'Choisissez un status');
    initSelect();

    /**
     * Initialisation du formulaire
     */
    if(data != null) {
        initForm($('form'), data);
        initEnfants(data['enfants']);
    }

    /**
     * Sur l'appuie d'une touche au clavier
     */
    $(document).on('keyup', function (e) {
        switch (e.keyCode) {
            case 107: // '+ ver. num'
            case 187: // '+ ligne de chiffre'
                addEnfant();
                break;

            case 109: // '- ver. num'
            case 54: // '- ligne de chiffre'
                delEnfant();
                break;
            default:
        }
    });

    /**
     * Ajoute le formulaire d'ajout d'un enfant
     */
    btnAddEnfant.click(function() {
        event.preventDefault();
        addEnfant();
    });


    /**
     * Supprime le formulaire d'ajout d'un enfant
     */
    btnDelEnfant.click(function() {
        event.preventDefault();
        delEnfant();
    });

    // FUNCTIONS
    function initEnfants(enfants) {
        $.each(enfants, function (index, val) {
            addEnfant(val);
        });
    }

    function addEnfant(data) {
        $('li.empty').remove(); // Supprime le tab obligatoire

        var id = 'enfant_'+(++nbEnfants);
        var prenom = data == undefined ? null : data['prenom'];

        tabEnfants.append(constructTabEnfant(id, prenom));
        contentEnfant.append(constructFormEnfant(id, data));

        refreshBtnSupprimerEnfant();
        initDateNaissance();
        initSelect();
        initEventsFormEnfants();
        initTabs();

        tabEnfants.tabs('select_tab', id);
    }

    function delEnfant() {
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

        refreshBtnSupprimerEnfant();
    }

    /**
     * Met à jour l'état du bouton 3SUPPRIMER
     */
    function refreshBtnSupprimerEnfant() {
        if($('#Enfants div').length == 0) {
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

        /**
         * Adapte les classes en fonction de l'établissement selectionné
         */
        $('.etablissement').on('change', function () {
            var idEtablissement = $(this).val();
            if(idEtablissement == '') return;
            var selectClasse = $(this).closest('.tab_content').find('select.classe');
            refreshClasses(idEtablissement, selectClasse);
        });
    }

    function refreshClasses(idEtablissement, selectClasse, selectedValue) {
        selectClasse.empty();
        addOptionsToSelect(selectClasse, classes[idEtablissement], 'section_id', 'section_nom', 'Choisissez une classe');
        selectClasse.attr('disabled', false);

        if(selectedValue != undefined) {
            selectClasse.find('option[value='+selectedValue+']').attr('selected', 'selected');
        }

        initSelect(selectClasse);
    }

    /**
     * Création d'un onglet pour les enfants
     * @returns jQuery Un onglet enfant
     */
    function constructTabEnfant(idEnfant, prenom) {
        var li = $('<li>', { class: 'tab'});
        var a = $('<a>', { href: "#"+idEnfant, text: (prenom ? prenom : 'Inconnu')});

        return li.append(a);
    }

    /**
     * Création du formulaire pour ajouterun enfant
     * @param idEnfant Suffixe des ids des éléments
     * @param données de l'enfant (optionnel)
     * @returns jQuery Le formulaire jQuery
     */
    function constructFormEnfant(idEnfant, data) {
        var div = $('<div>', {id: idEnfant, class: 'tab_content'});

        // Nom
        var nom = data == undefined ? $('#nom').val() : data['nom'];
        var input_field_nom = bc_input_field().addClass('col s6');
        input_field_nom.append(bc_icon().text('account_circle'));
        input_field_nom.append(bc_input_text().attr({name: 'nom#' + idEnfant, id: 'nom#' + idEnfant}).val(nom));
        input_field_nom.append(bc_label().addClass(nom ? 'active' : '').attr('for', 'nom#'+idEnfant).text('Nom'));

        // Prénom
        var prenom = data == undefined ? null : data['prenom'];
        var input_field_prenom = bc_input_field().addClass('col s6');
        input_field_prenom.append(bc_input_text().val(prenom).attr({
            name: 'prenom#' + idEnfant,
            id: 'prenom#' + idEnfant
        }).addClass('prenom_enfant'));
        input_field_prenom.append(bc_label().attr('for', 'prenom#'+idEnfant).text('Prénom'));

        // Date de naissance
        var dateNaissance = data == undefined ? null : data['date_naissance'];
        var input_field_date_naissance = bc_input_field();
        input_field_date_naissance.append(bc_icon().text('date_range'));
        input_field_date_naissance.append(bc_input_date().attr({name: 'date_naissance#'+idEnfant, id: 'date_naissance#'+idEnfant, 'data-value': dateNaissance}));
        input_field_date_naissance.append(bc_label().attr('for', 'date_naissance#'+idEnfant).text('Date de naissance'));

        // Etablissements
        var etablissement = data == undefined ? null : data['etablissement_id'];
        var input_field_etablissement = bc_input_field().addClass('col s6');
        input_field_etablissement.append(bc_icon().text('school'));
        var selectEtablissement = bc_select();
        addOptionsToSelect(selectEtablissement, etablissements, 'id', 'nom', 'Choissisez un établissement');
        input_field_etablissement.append(selectEtablissement.attr('name', 'etablissement#' + idEnfant).addClass('etablissement'));
        input_field_etablissement.append(bc_label().attr('for', 'etablissement#' + idEnfant).text('Établissement'));

        // Classes
        var selectClasse = bc_select();
        var input_field_classe = bc_input_field().addClass('col s6');
        input_field_classe.append(selectClasse.attr({name: 'classe#'+idEnfant, disabled: 'disabled'}).addClass('classe'));
        input_field_classe.append(bc_label().attr('for', 'classe#'+idEnfant).text('Classe'));

        if(etablissement != undefined) {
            selectEtablissement.find('option[value=' + etablissement + ']').attr('selected', 'selected');
            console.log(data['section_id']);
            refreshClasses(etablissement, selectClasse, data['section_id']);
        }


        div.append(
            bc_row()
                .append(input_field_nom)
                .append(input_field_prenom)
        );

        div.append(input_field_date_naissance);

        div.append(
            bc_row()
                .append(input_field_etablissement)
                .append(input_field_classe)
        );


        return div;
    }

    function initDateNaissance() {
        $('.datepicker').pickadate({
            selectMonths: true,
            selectYears: 15,
            max: new Date(2007,12,31),
            format: 'dd/mm/yyyy'
        });
    }

    $('#code_postal').formatter({
        'pattern': '{{99999}}'
    });

    $('#telephone').formatter({
        'pattern': '{{99}} {{99}} {{99}} {{99}} {{99}}',
    });

    // VALIDATION DE SAISIE
    $('form').validate({
        rules: {
            code_postal: {
                zip_code: true
            },

            telephone: {
                phone: true
            },

            adhesion_id: {
                required: true
            }
        }
    });
});
