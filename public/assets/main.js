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
        errorPlacement: function (error, element) {

            $(element).parents('.form-group').addClass('has-error');

            error.insertAfter(element).addClass('control-label');
        },
        success: function(error, element){
            $(element).parents('.form-group').addClass('has-success').removeClass('has-error');
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
                $result.replaceWith("Ошибка: "+jqXHR.responseText);
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