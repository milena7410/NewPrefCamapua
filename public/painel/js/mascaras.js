$(function () {
    $('.decimal').mask("#.##0,00", {reverse: true});
    $('.data').mask('99/99/9999');
    $('.dataHora').mask('99/99/9999 99:99:99');
    $('.hora').mask('99:99:99');
    $('.cpf').mask('999.999.999-99');
    $('.cep').mask('99999-999');
    $('.telefone').mask('(99)99999-9999');
});