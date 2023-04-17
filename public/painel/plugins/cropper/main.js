$(function () {

    'use strict';

    var $image = $('#image');
    var widthImage = parseInt($('#widthImage').val());
    var heightImage = parseInt($('#heightImage').val());

    var ratioImage = widthImage / heightImage;

    var options = {
        aspectRatio: ratioImage,
        preview: '.img-preview',
        viewMode: 1,
        dragMode: 'move',
        minContainerHeight: 500,
        minCropBoxWidth: 200
    };

    // Cropper
    $image.cropper(options);


    // Import image
    var $inputImage = $('#inputImage');
    var URL = window.URL || window.webkitURL;
    var blobURL;
    if (URL) {
        $inputImage.change(function () {
            var files = this.files;
            var file;

            if (!$image.data('cropper')) {
                return;
            }

            if (files && files.length) {
                file = files[0];

                if (/^image\/\w+$/.test(file.type)) {
                    blobURL = URL.createObjectURL(file);
                    $image.one('built.cropper', function () {

                        // Revoke when load complete
                        URL.revokeObjectURL(blobURL);
                    }).cropper('reset').cropper('replace', blobURL);
                    $inputImage.val(blobURL);
                } else {
                    window.alert('Por Favor, Selecione uma Imagem.');
                }
            }
        });
    } else {
        $inputImage.prop('disabled', true).parent().addClass('disabled');
    }

    $('#cut').on('click', function () {
        if($('#inputImage').val() == ''){
            alert('Por favor, Selecione uma imagem para prosseguir');
            return;
        }
        blockWait();
        var result = $image.cropper('getCroppedCanvas').toDataURL("image/jpeg");
        $('#inputImageFile').val(result);
        $('#formCustomize').submit();

    });

    $('.calc_value_per_meter').on('focusout', function () {
        var valueWidth = numeral().unformat($('#larguraCustomizada').val()) / 100;
        var valueHeight = numeral().unformat($('#alturaCustomizada').val()) / 100;

        if (valueHeight == 0) {
            valueHeight = valueWidth;
        }

        if (valueWidth == 0) {
            valueWidth = valueHeight;
        }

        var ratio = valueWidth / valueHeight;


        $image.cropper('setAspectRatio', ratio);
    });

});

function blockWait() {
    $.blockUI({
        message:'Por favor, aguarde. Fazendo o upload de seu arquivo.Isto levará alguns minutos.',
        css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
        }
    });
}

function unblockWait(){
    $.unblockUI();
}