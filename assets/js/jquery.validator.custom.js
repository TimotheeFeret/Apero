/**
 * Created by jerem on 03/05/2017.
 */

$.validator.addMethod('numbers_with_dashes', function (value) {
    return /^\d+(-\d+)*$/.test(value);
}, 'Veuillez saisir des nombres séparés par des tirets.');

$.validator.addMethod('money', function (value) {
    return /^\d{0,4}([.|,]\d{1,2})??$/.test(value);
}, 'Veuillez saisir un prix valide.');

$.validator.addMethod('year', function (value) {
    return /^20[0-9]{2}$/.test(value);
}, 'Veuillez saisir une année valide.');

$.validator.addMethod('zip_code', function (value) {
    return /^[0-9]{5}$/.test(value);
}, 'Veuillez saisir un code postal valide.');

$.validator.addMethod('phone', function (value) {
    return /^(0|\+33|0033)[1-9][0-9]{8}$/.test(value);
}, 'Veuillez saisir un numéro de téléhpone valide.');