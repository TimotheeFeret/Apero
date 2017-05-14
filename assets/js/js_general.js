/**
 * Created by jerem on 19/04/2017.
 */

// Initialise les select de la page
function initSelect(select) {
    select = select ? select : 'select'
    $(select).material_select();

    // To fix required select
    $("select[required]").css({display: 'block', height: 0, padding: 0, width: 0});
}

function initTabs() {
    $('ul.tabs').tabs();
}

function replaceUndesirableCharatersForDB(text) {
    text = text.replace('%20%E2%82%AC', ''); // ' €'
    text = text.replace(' €', '');
    text = text.replace('€', '');
    return text;
}

function serialize(form) {
    var data = form.serialize();
    return replaceUndesirableCharatersForDB(data);
}

/**
 * Serialize les données d'un tableau jQuery ; les éléments doivent avoir un name du type : nom_generique#id_element
 * @param arrayJquery Tableau jQuery dans lequel se trouve les donneés à sérializer
 */
function serializeArray(arrayJquery) {
    var data = {};   var i = 0;

    // Parcours les données
    $.each(arrayJquery, function (indexData, valData) {
        var datum = {};

        // Parcours les informations des données
        $.each($(valData).find("input, select[type!='hidden']"), function (indexDatum, valDatum) {
            var name = $(valDatum).attr('name');

            if(name == undefined)
                return;

            name = name.split('#')[0];

            var toAdd = replaceUndesirableCharatersForDB($(valDatum).val());
            datum[name] = toAdd;
        });
        data[i++] = datum;
    });
    return JSON.stringify(data);
}

/**
 * Ajoute les options à un select
 * @param select jquery select à initialiser
 * @param data array options à ajouter
 * @param keyValue string clé de la valeur de l'option
 * @param keyLibelle string clé du libelle à afficher
 * @param defaultOption string message à afficher par défaut
 * @param extraAttributes array key value permet d'ajouter des attributs supplémentaires aux options
 */
function addOptionsToSelect(select, data, keyValue, keyLibelle, defaultOption, extraAttributes) {
    select.append($('<option>', { value: '', text: defaultOption, disabled: 'disabled', selected: 'selected'}));
    $.each(data, function (index, val) {
        var option = $('<option>', { value: val[keyValue], text: val[keyLibelle]});

        $.each(extraAttributes, function (extraIndex, extraVal) {
            option.attr(extraIndex, val[extraVal]);
        });

        select.append(option);
    });
}

function initForm(form, data) {
    $.each(form.find('input, select'), function (index, val) {
        var name = $(val).attr('name');
        if(name == undefined) return;

        val = $(val);

        if(val.is('input')) {
            val.val(data[name]);

        } else if(val.is('select')) {
            var nameForData = name.replace('[]', '');

            // Si c'est un string selectionne l'option
            if(typeof data[name] == 'string') {
                val.find('option[value='+data[name]+']').attr('selected', 'selected');

            // Si c'est un objet selectionne les options
            } else if (typeof data[nameForData] == 'object') {
                $.each($(data[nameForData]), function (dataindex, dataval) {
                    var name = val.attr('name');
                    val.find('option[value=' + dataval[nameForData] + ']').attr('selected', 'selected');
                });
            }

            initSelect(val);
        }
    });
}

function pad(n, width, z) {
    z = z || '0';
    n = n + '';
    return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
}

function responseAjax(data) {
    if (data.error != undefined) {
        Materialize.toast(data.error, 5000, 'red');
    } else {
        window.location.replace(document.referrer)
    }
}

$( document ).ready(function() {
    initSelect();

    $('.tooltipped').tooltip({delay: 50});

    // Parcours les différents tables
    $.each($('table'), function (index, val) {

        if ($(val).find('tbody tr').length == 0) {
            return;
        }

        var order = [];
        var lastColumn = $('thead tr th').last().text() == '' ? $('thead tr th').length - 1 : ''; // Permet de récupèrer l'index des boutons si le header est vide

        // Parcours les headers
        $.each($(val).find('thead tr th'), function (i, v) {
            if ($(v).hasClass('no-order')) {
                order.push(i);
            }
        });

        // Initialisation des datatables
        $(val).DataTable({
            "oLanguage": {
                "sUrl": '//cdn.datatables.net/plug-ins/1.10.15/i18n/French.json'
            },

            "columnDefs": [
                {orderable: false, targets: order},
                {"width": "350", "targets": lastColumn}
            ]
        });

        $.fn.dataTable.moment('DD/MM/YYYY');
    });

    // Sur le clic du bouton 'delete'
    $('.delete').on('click', function () {
        var id = $(this).closest('tr').attr('data-id');
        var element = (window.location.href).split('/');
        element = element[element.length - 2];

        $.ajax({
                url: '/apero/controleurs/' + element + '.php',
                type: 'POST',
                dataType: 'json',
                data: {event: 'delete', id: id}
            })
            .done(function (data) {
                if (data.error != undefined) {
                    Materialize.toast(data.error, 5000, 'red');
                } else {
                    location.reload();
                }
            });
    })


    // EVENEMENTS DE GESTION (VIEW, EDIT)
    // Permet d'ouvrir la page de détails d'un élément
    $('.details').on('click', function () {
        var id = $(this).closest('tr').attr('data-id');
        var currentURL = window.location.href.split('/').slice(0, -1).join('/');
        window.location.href = currentURL + '/show?id=' + id;
    });

    // Permet d'ouvrir la page de modification d'un élément
    $('.edit').on('click', function () {
        var id = $(this).closest('tr').attr('data-id');
        var currentURL = window.location.href.split('/').slice(0, -1).join('/');
        window.location.href = currentURL + '/update?id=' + id;
    });
});

$.validator.setDefaults({
    errorClass: 'invalid',
    validClass: "valid",
    errorPlacement: function (error, element) {
        $(element)
            .closest("form")
            .find("label[for='" + element.attr("id") + "']")
            .attr('data-error', error.text());
    },
});