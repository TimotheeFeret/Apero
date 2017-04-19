/**
 * Created by jerem on 19/04/2017.
 */

$( document ).ready(function() {

    $('.datepicker').pickadate({
        selectMonths: true,
        selectYears: 15,
        max: new Date(2007,12,31)
    });

    $(document).submit(function() {
        event.preventDefault();
    });
});
