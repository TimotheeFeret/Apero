/**
 * Created by jerem on 02/05/2017.
 */

function bc_row(){
    return $('<div>', { class: 'row'});
}

function bc_input_field() {
    return $('<div>', { class: 'input-field'});
}

function bc_icon() {
    return $('<i>', { class: 'material-icons prefix'});
}

function bc_input_text() {
    return $('<input>', { type: 'text', class: 'validate', required: 'true'});
}

function bc_input_date() {
    return $('<input>', { type: 'date', class: 'datepicker validate', required: 'true'});
}

function bc_select() {
    return $('<select>', { required: 'required'});
}

function bc_label() {
    return $('<label>');
}

function bc_button() {
    return $('<a>', {class: 'waves-effect waves-light btn'});
}