/**
 * Created by l2cri on 08.11.16.
 */
$(function() {
    $('#form-calc').submit(function(){
        var _this = $(this);

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

        return false;
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