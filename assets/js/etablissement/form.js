/**
 * Created by jerem on 28/04/2017.
 */

$(document).ready(function () {
    $(document).submit(function () {
        event.preventDefault();
        $.ajax({
            url: '/apero/controleur/etablissement.php',
            type: 'POST',
            dataType: 'json',
            data: {event: event, id: id, data: $('form').serialize()},
        })
        .done(function () {
            console.log("success");
        })
    });
});