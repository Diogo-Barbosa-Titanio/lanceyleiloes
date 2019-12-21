$(document).ready(function () {

    $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.cep').mask('00000-000');
    $('.telefone').mask('(00) 0000-0000');
    $('.data_hora').mask('00/00/0000 00:00:00');
    $('.data').mask('00/00/0000');
    $('.hora').mask('00:00:00');
    $('.dinheiro').mask('#.##0,00', {reverse: true});

    let CLMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    };

    let clOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(CLMaskBehavior.apply({}, arguments), options);
        }
    };

    $('.celular').mask(CLMaskBehavior, clOptions);

    $('.rg').mask('99.999.999-9');

    $( '.data' ).datepicker( $.datepicker.regional[ 'pt-BR' ] );

});
