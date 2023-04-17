$(document).ready(function () {
    $('.summernote').summernote({
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'hr', 'video']],
            ['view', ['fullscreen', 'codeview']],
            ['help', ['help']],
            ['fontsize', ['fontsize']]
        ],
        popover: {
            image: [
                ['custom', ['imageAttributes']],
                ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                ['remove', ['removeMedia']]
            ]
        },
        lang: 'pt-BR',
        imageAttributes: {
            imageDialogLayout: 'default', // default|horizontal
            icon: '<i class="note-icon-pencil"/>',
            removeEmpty: false // true = remove attributes | false = leave empty if present
        },
        displayFields: {
            imageBasic: true,  // show/hide Title, Source, Alt fields
            imageExtra: false, // show/hide Alt, Class, Style, Role fields
            linkBasic: true,   // show/hide URL and Target fields for link
            linkExtra: false   // show/hide Class, Rel, Role fields for link
        }
    });

    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        language: "pt-BR"
    });
});

$(function () {
    $('#secretariasSelect').multiSelect({
        selectableHeader: "<input type='text' class='form-control' style='margin-bottom: 10px' autocomplete='off' placeholder='Informe a Secretaria'>",
        selectionHeader: "<input type='text' class='form-control' style='margin-bottom: 10px' autocomplete='off' placeholder='Informe a Secretaria'>",
        afterInit: function (ms) {
            var that = this,
                $selectableSearch = that.$selectableUl.prev(),
                $selectionSearch = that.$selectionUl.prev(),
                selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

            that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                .on('keydown', function (e) {
                    if (e.which === 40) {
                        that.$selectableUl.focus();
                        return false;
                    }
                });

            that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                .on('keydown', function (e) {
                    if (e.which == 40) {
                        that.$selectionUl.focus();
                        return false;
                    }
                });
        },
        afterSelect: function () {
            this.qs1.cache();
            this.qs2.cache();
        },
        afterDeselect: function () {
            this.qs1.cache();
            this.qs2.cache();
        }
    });

});