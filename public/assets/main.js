/**
 * Created by l2cri on 08.11.16.
 */
$(function() {
    //validation
    $('#form-calc').validate({
        rules: {
            num1: {
                required: true,
                digits: true
            },
            num2: {
                required: true,
                digits: true
            }
        },
        messages: {
            num1: {
                required: 'Введите первое число',
                digits: 'пожалуйста, вводите только цифры'
            },
            num2: {
                required: 'Введите второе число',
                digits: 'пожалуйста, вводите только цифры'
            }
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `help-block` class to the error element
            error.addClass( "help-block" );

            // Add `has-feedback` class to the parent div.form-group
            // in order to add icons to inputs
            element.parents( ".col-sm-5" ).addClass( "has-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }

            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if ( !element.next( "span" )[ 0 ] ) {
                $( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
            }
        },
        success: function ( label, element ) {
            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if ( !$( element ).next( "span" )[ 0 ] ) {
                $( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
            $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
        },
        unhighlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
            $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
        },
        submitHandler: function(form){
            var _this = $(form);

            var url = _this.attr('action'),
                data = _this.serialize(),
                $result =  $('#result-calc');

            submitFormByAjax(url, data).done(function(data) {
                var res = $.parseJSON(data);
                $result.html(res.result);
            })
            .fail(function(jqXHR) {
                $result.html("Ошибка");
            });
        }
    })
});

function submitFormByAjax(url, data, dataType){

    dataType = typeof dataType !== 'undefined' ? dataType : 'html';

    return $.ajax({
        type: "POST",
        url: url,
        data: data,
        dataType: dataType
    });
}