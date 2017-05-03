/**
 * Created by jerem on 14/04/2017.
 */

$(document).ready(function () {
    $(document).submit(function () {
        event.preventDefault();
        $.ajax({
                url: '/apero/controleur/livre.php',
                type: 'POST',
                dataType: 'json',
                data: {event: event, id: id, data: $('form').serialize()},
            })
            .done(function () {
                console.log("success");
            })
    });

    $('form').validate({
        rules: {
            id: {
                numbers_with_dashes: true,
                minlength: 5,
            },

            prix: {
                money: true
            }
        }
    });
});
