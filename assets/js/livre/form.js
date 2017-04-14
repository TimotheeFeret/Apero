/**
 * Created by jerem on 14/04/2017.
 */

$( document ).ready(function() {
    $('.datepicker').pickadate({
        selectMonths: false,
        selectYears: 15
    });

    $(document).submit(function() {
        event.preventDefault();
    });
});
