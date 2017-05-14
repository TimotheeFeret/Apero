/**
 * Created by jerem on 14/04/2017.
 */

$(document).ready(function () {
    $(document).submit(function () {
        event.preventDefault();

        $.ajax({
                url: '/apero/controleurs/livre.php',
                type: 'POST',
                dataType: 'json',
                data: {event: eventPage, id: id, data: serialize($('form'))},
            })
            .done(function (data) {
                if (data.error != undefined) {
                    Materialize.toast(data.error, 5000, 'red');
                } else {
                    window.loca
                }
            })
    });

    /**
     * Initialisation du formulaire
     */
    if(data != null) {
        initForm($('form'), data);
    }

    $('#isbn').formatter({
        'pattern': '{{999}}-{{9}}-{{9999}}-{{9999}}-{{9}}',
        'persistent': true
    });

    $('#prix').formatter({
        'pattern': '{{99}}.{{99}} €'
    });

    $('#annee_usage').formatter({
        'pattern': '{{9999}}'
    });

    // VALIDATION DE SAISIE
    $('form').validate({
        rules: {
            isbn: {
                isbn: true,
                minlength: 5,
            },

            prix: {
                money: true
            },
            
            annee_usage: {
                year: true
            }
        }
    });
});
