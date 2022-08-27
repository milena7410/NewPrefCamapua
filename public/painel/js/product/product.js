$('#types').multiSelect();

$(".summernote").summernote({
    lang: "pt-BR"
});
$("#produtoForm").validator();

//preco por metro
$('.productPerMeter').on('click', function () {
    var perMeter = $('.productPerMeter:checked').val();
    changeInputPerMeter(perMeter);
});

$('.promotionActive').on('click', function () {
    checkInputActivePricePromo();
});

//BUSCA TODAS AS SUBCATEGORIAS POR CATEGORIA
$('#product-categories').on('change', function () {
    var category = $(this).val();
    findSubcategoriesByCategory(category);
});

$('#add-product-size').on('click', function () {
    var html = tableProductSize();
    $('#product-size-input').append(html);
});

$(document).on('click', '.remove-prod-size', function () {
    $(this).closest('.form-group').remove();
});

$(".summernote").summernote({
    lang: "pt-BR"
});
$("#produtoForm").validator();

$('#imageMain').attr('required', false);

$('.customProduct').on('click', function () {
    $('#imageMain').attr('required', false);
});
