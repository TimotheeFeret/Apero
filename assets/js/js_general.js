/**
 * Created by jerem on 19/04/2017.
 */

// Initialise les select de la page
function initSelect() {
    $('select').material_select();

    // To fix required select
    $("select[required]").css({display: 'block', height: 0, padding: 0, width: 0});
}

function initTabs() {
    $('ul.tabs').tabs();
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
        $.each($(valData).find("input[type!='hidden']"), function (indexDatum, valDatum) {
            var name = $(valDatum).attr('name');

            if(name == undefined)
                return;

            name = name.split('#')[0];

            datum[name] =  $(valDatum).val();
        });
        data[i++] = datum;
    });
    return JSON.stringify(data);
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
        var lastColumn = $('thead tr th').length - 1;

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
    });


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