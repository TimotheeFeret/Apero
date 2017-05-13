/**
 * Created by jerem on 13/05/2017.
 */

$( document ).ready(function() {
    $('#BtImprimerFacture').on('click', function () {

        $.ajax({
                url: '/apero/modeles/documents/facture.php',
                type: 'POST',
                dataType: 'json',
                data: {id: id},
            })
            .done(function (data) {
                window.open(data,'_blank');
            })
    });
});
