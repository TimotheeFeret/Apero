/**
 * Created by jerem on 03/05/2017.
 */

$.validator.addMethod('isbn', function (value) {
    return /^[0-9]{3}-[0-9]-[0-9]{4}-[0-9]{4}-[0-9]$/.test(value);
}, 'Veuillez saisir un ISBN valide.');

$.validator.addMethod('money', function (value) {
    return /^\d{0,4}([.|,]\d{1,2})(\s€)?$/.test(value);
}, 'Veuillez saisir un prix valide.');

$.validator.addMethod('year', function (value) {
    return /^20[0-9]{2}$/.test(value);
}, 'Veuillez saisir une année valide.');

$.validator.addMethod('zip_code', function (value) {
    return /^[0-9]{5}$/.test(value);
}, 'Veuillez saisir un code postal valide.');

$.validator.addMethod('phone', function (value) {
    return /^(0)[1-9] ([0-9][0-9]\s){3}[0-9][0-9]$/.test(value);
}, 'Veuillez saisir un numéro de téléhpone valide.');