$(document).ready(function () {
    $('button.cta-add').click(function (e) {
        e.preventDefault();
        let type = $(`#${this.id}`).attr('data-type');
        let counter = $(`#counter-${type}`).val();
        let counter_cumul = parseInt(counter) + 1;
        let optionSelect = setOption(type);
        $(`#box-hidden .nominal-select`).html(optionSelect);
        $('#box-hidden .nominal-select').attr('name', `${type}[${counter_cumul}][operation]`);
        $('#box-hidden .nominal-select').attr('id', `${type}_operation_${counter_cumul}`);
        $('#box-hidden .quantite').attr('name', `${type}[${counter_cumul}][quantite]`);
        $('#box-hidden .quantite').attr('id', `${type}_quantite_${counter_cumul}`);
        $(`.box-${type}`).append($("#box-hidden").html());
        saisie();
        suppression();
    });
    saisie();
});

function setOption(type) {
    let str = '';
    let tab = [];
    switch (type) {
        case 'billet':
            tab = [5, 10, 20, 50, 100, 200, 500];
            break;
        case 'piece':
            tab = [1, 2];
            break;
        case'centime':
            tab = [1, 2, 5, 10, 20, 50];
            break;
    }
    for (let k of tab) {
        str += `<option value="${k}">${k}</option>`;
    }
    return str;
}

function saisie() {
    $('.form-control').on("input", function (e) {
        e.preventDefault();
        let type = (this.id).split('_')[0];
        calcul(type);
        totalCaisse();
    });
}

function suppression() {
    $(".delete").click(function (e) {
        e.preventDefault();
        let type = $(this).parent().parent('.row').parent().attr('data-type');
        $(this).parent().parent('.row').remove();
        calcul(type);
        totalCaisse();
    });
}

function calcul(type){
    let total = 0;
    $(`.box-${type} input.form-control`).each(function (index, item) {
        let quantite_id = item.id;
        let quantite_value = item.value || 0;
        let indice = quantite_id.split('_')[2];
        total = parseInt(total) + parseInt(quantite_value * $(`#${type}_operation_${indice}`).val());
    });
    $(`#total-${type}`).val(total);
    $(`.${type}-value`).html(`${total}€`);
}

function totalCaisse(){
    let total = 0;
    total = parseInt($('#total-piece').val()) + parseInt($('#total-billet').val()) + parseInt($('#total-centime').val());
    $('#total-caisse').html(`${total}€`);
}
