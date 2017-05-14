/**
 * Created by jerem on 28/04/2017.
 */

$(document).ready(function () {
    $(document).submit(function () {
        event.preventDefault();
        $.ajax({
            url: '/apero/controleurs/etablissement.php',
            type: 'POST',
            dataType: 'json',
                data: {event: eventPage, id: id, data: serialize($('form'))}
        })
            .done(function (data) {
                responseAjax(data);
        })
    });

    /**
     * Initialisation des selects
     */
    addOptionsToSelect($('#section_id'), sections, 'id', 'nom', 'Choisissez des sections');
    initSelect();

    /**
     * Initialisation du formulaire
     */
    if(data != null) {
        initForm($('form'), data);
    }

    $('#telephone').formatter({
        'pattern': '{{99}} {{99}} {{99}} {{99}} {{99}}'
    });

    // VALIDATION DE SAISIE
    $('form').validate({
        rules: {
            telephone: {
                phone: true
            }
        }
    });
});