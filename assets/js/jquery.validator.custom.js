/**
 * Created by jerem on 03/05/2017.
 */


$.validator.addMethod('numbers_with_dashes', function (value) {
    return /^\d+(-\d+)*$/.test(value);
}, 'Veuillez saisir des nombres séparés par des tirets.');

$.validator.addMethod('money', function (value) {
    return /^\d{0,4}([.|,]\d{1,2})??$/.test(value);
}, 'Veuillez saisir un prix valide.'); 