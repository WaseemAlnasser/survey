


(function ($) {
    "use strict";
    $(document).ready(function () {

        $("#sortable").sortable({
            axis: "y",
            placeholder: "sortable-placeholder",
            out: function(event,ui){
                setTimeout(function(){
                    var allShortableList = $("#sortable li");
                    allShortableList.each(function (index,value) {
                        var el = $(this);
                        el.find('.field-required').attr('name','field_required['+index+']');
                        el.find('.field-placeholder').attr('name','field_placeholder['+index+']');
                        el.find('.field-name').attr('name','field_name['+index+']');
                        el.find('.field-label').attr('name','field_label['+index+']');
                        el.find('.field-options').attr('name','select_options['+index+']');
                    });
                },500);
            }
        }).disableSelection();
        $("#sortable_02").sortable({
            connectWith: '#sortable',
            helper: "clone",
            remove: function (e, li) {
                var value = li.item.prop('type');
                var random = Math.floor(Math.random(9999) * 999999);
                var formFiledLength = $('#sortable li').length - 1;

                var markup = render_drag_drop_form_field_markup(value,random,formFiledLength);
                li.item.clone()
                    .prop('id', value + '_' + random)
                    .text('')
                    .append(markup)
                    .insertAfter(li.item);
                $(this).sortable('cancel');
                return li.item.clone();
            }
        }).disableSelection();

        $('.field-placeholder').on('change paste keyup', function (e) {
            $(this).parent().parent().parent().prev().find('.placeholder-name').text($(this).val());
        });
        $('body').on('click', '.remove-fields', function (e) {
            $(this).parent().remove();
            $( "#sortable" ).sortable( "refreshPositions" );
        });

        function render_drag_drop_form_field_markup(type,random,formFiledLength){
            var markup = '';
            markup += '<span class="ui-icon ui-icon-arrowthick-2-n-s"></span>\n <span class="remove-fields">x</span>\n<a data-bs-toggle="collapse" href="#collapseExample-' + random + '" role="button" aria-expanded="false" aria-controls="collapseExample">\n' +
                type + ': <span class="placeholder-name"></span>\n</a>\n' +
                '<div class="collapse" id="collapseExample-' + random + '">\n' +
                '<div class="card card-body pt-3">\n' +
                '<input type="hidden" class="form-control" name="field_type[]" value="' + type + '">' +
                '<div class="form-group">\n' +
                '<label>Name</label>\n' +
                '<input type="text" class="form-control field-name" required name="field_name['+formFiledLength+']" placeholder="enter field name" >\n</div>\n'
                   + '<div class="form-group">\n <label>Label</label>\n' +
                    ' <input type="text" class="form-control field-label" required  name="field_label['+formFiledLength+']" placeholder="enter label" >\n</div>\n';
            if (type == 'text' || type == 'textarea') {
                markup += '<div class="form-group">\n' +
                    '<label>Placeholder</label>\n' +
                    '<input type="text" class="form-control field-placeholder" required name="field_placeholder['+formFiledLength+']" placeholder="enter placeholder" >\n</div>\n';
            }else{
                markup += '<input type="hidden" class="field-placeholder" name="field_placeholder['+formFiledLength+']" value="" >\n' ;
            }
            markup += '<div class="form-group">\n<label ><strong>Required</strong></label>\n<label class="switch">\n' +
                '<input type="checkbox" class="field-required" name="field_required['+formFiledLength+']" >\n' +
                '<span class="slider-yes-no"></span>\n</label>\n</div>';
            if(type == 'select' || type == 'radio' || type == 'checkbox' || type == 'multiselect'){
                markup += '<div class="form-group">\n' +
                    '<label>Options</label>\n' +
                    '<textarea name="select_options['+formFiledLength+']" required  class="form-control field-options f max-height-120" cols="30" rows="10" ></textarea>\n' +
                    '<small>separate option with comma "," </small>\n' +
                    '</div>\n' ;
            }else{
            markup += '<input type="hidden" class="field-options" name="select_options['+formFiledLength+']" value="" >\n' ;
            }

            markup += '</div>\n  </div>';

            return markup;
        }
    });
    // $('#save-survey').on('submit',function (e) {
    //     e.preventDefault();
    //   // print the form data as an array on a console
    //     var formData = $(this).serializeArray();
    //     console.log(formData);
    // });
}(jQuery));

