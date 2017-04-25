/**
 * Created by jerem on 19/04/2017.
 */

// Initialise les select de la page
function initSelect() {
    $('select').material_select();
}

function initTabs() {
    $('ul.tabs').tabs();
}

$( document ).ready(function() {
    initSelect();
    // initTabs();
    
    $('.tooltipped').tooltip({delay: 50});
});