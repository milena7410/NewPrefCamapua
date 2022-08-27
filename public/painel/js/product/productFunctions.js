var itemPorSz = $('.sizes').length;
var countAdditions = $('.additions').length;

function findSubcategoriesByCategory(category){
    $.get('/admin/get-subcategories/' + category, function (data) {
        if (data.length > 0) {
            var option = '<option value="">SELECIONE UMA SUBCATEGORIA</option>';
            $.each(data, function (i, subcategories) {
                option += '<option value="' + subcategories.id + '">' + subcategories.category + '</option>';
            });

            $('#product-subcategories').html(option);
            changeFormSubcategories(1);
        } else {
            changeFormSubcategories(0);
        }
    });
}

function checkInputActivePricePromo(){
    var promotionalActive = $('.promotionActive:checked').val();

    if (promotionalActive == 0) {
        $('#pricePromotionalInput').hide();
        $('#productPromotionalPrice').attr('required', false);
    } else {
        $('#pricePromotionalInput').show();
        $('#productPromotionalPrice').attr('required', true);
    }
}

//mostra ou esconde <select> subcategorias no formulario
function changeFormSubcategories(status) {
    if (status == 1) {
        $('#product-subcategories').attr('required', true);
        $('#subcategoryDiv').show();
    } else {
        $('#product-subcategories').attr('required', false);
        $('#subcategoryDiv').hide();
    }
}

function changeInputPerMeter(perMeter){
    $('#pricePerMeterInput').toggle();
    if(perMeter == 1){
        $('#pricePerMeter').attr('required',true);
        $('#pricePerMeterInput').show();
        $('#typesForm').hide();
        //$('#types').attr('required', false);
    }
    else{
        $('#pricePerMeter').attr('required',false);
        $('#pricePerMeterInput').hide();
        $('#typesForm').show();
        //$('#types').attr('required', true);
    }
}

function tableProductSize() {
    var html = '';
    html += '<div class="form-group">';
    html += '<label for="" class="col-sm-1 control-label"></label>';

    html += '<div class="col-sm-2 has-feedback">';
    html += '    <label for="">Tamanho/Resolução do Produto</label>';
    html += '    <input class="form-control priceProdSize" placeholder="Informe o Tamanho/Resolução" name="productSize[' + itemPorSz + '][size]" type="text">';
    html += '</div>';

    html += '<div class="col-sm-2 has-feedback">';
    html += '    <label for="">Preço do Tamanho</label>';
    html += '    <input class="form-control decimal priceProductSize"  placeholder="Informe o Preço" name="productSize[' + itemPorSz + '][price]" type="text">';
    html += '</div>';

    html += '<div class="col-sm-2 has-feedback">';
    html += '    <label for="">Tamanho em Promoção?</label>';
    html += '    <select class="form-control activePromoSize"  required="required" name="productSize[' + itemPorSz + '][active_promo]">';
    html += '       <option value="0">NAO</option><option value="1">SIM</option>';
    html += '    </select>';
    html += '</div>';

    html += '<div class="col-sm-2 has-feedback">';
    html += '    <label for="">Preço do Tamanho em Promoção</label>';
    html += '    <input class="form-control decimal priceProductSize"  placeholder="Informe o Preço Promocional"' +
        ' name="productSize[' + itemPorSz + '][price_promo]" type="text">';
    html += '</div>';

    html += '<div class="col-sm-1">';
    html += '<label style="color: transparent;">Remover</label>';
    html += '   <button type="button" class="btn btn-danger remove-prod-size">';
    html += '       <i class="glyphicon glyphicon-remove"></i> ';
    html += '   </button>';
    html += '</div>';

    html += '</div>';
    itemPorSz++

    return html;
}

function tableProductAddition() {
    var html = '';
    html += '<div class="form-group">';

    html += '<div class="col-sm-6 has-feedback">';
    html += '    <label for="">Acréscimo</label>';
    html += '    <input class="form-control additions" placeholder="Informe a descrição do Acréscimo" name="additions[' + countAdditions + '][addition]" type="text">';
    html += '</div>';

    html += '<div class="col-sm-2 has-feedback">';
    html += '    <label for="">Informe o Preço do Acréscimo</label>';
    html += '    <input class="form-control decimal" placeholder="Informe o Preço do Acréscimo" name="additions[' + countAdditions + '][price]" type="text">';
    html += '</div>';

    html += '<div class="col-sm-1">';
    html += '<label style="color: transparent;">Remover</label>';
    html += '   <button type="button" class="btn btn-danger remove-prod-addition">';
    html += '       <i class="glyphicon glyphicon-remove"></i> ';
    html += '   </button>';
    html += '</div>';

    html += '</div>';
    countAdditions++;

    return html;
}