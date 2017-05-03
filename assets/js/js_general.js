/**
 * Created by jerem on 19/04/2017.
 */

// Initialise les select de la page
function initSelect() {
    $('select').material_select();

    // To fix required select
    $("select[required]").css({display: "block", height: 0, padding: 0, width: 0, position: 'absolute'});
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
});