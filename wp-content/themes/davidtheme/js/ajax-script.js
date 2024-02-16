$(function () {
    $('.form_success').hide();
    let loader = $('<div class="loader"></div>').appendTo('form').hide();
    $('#submit-form').on('click', function (e) {
        e.preventDefault();
       
        if ($("[name='name_full']").val().trim() == "" || $("[name='nit']").val().trim() == "") {
            alert("Ingresa todos los campos requeridos");
        } else if ($("[name='term']:checked").val() == undefined) {
            alert("Acepte terminos y condiciones");
        } else {

            loader.show();

            var data = {
                action: 'insert_data_ajax',
                name_full: $("[name='name_full']").val().trim(),
                nit: $("[name='nit']").val().trim(),
                name_point: $("[name='name_point']").val().trim(),
                name_equitment: $("[name='name_equitment']").val().trim(),
                name_city: $("[name='city']").val().trim(),
                name_promotor: $("[name='name_promotor']").val().trim(),
                rtc: $("[name='rtc']").val().trim(),
                capitan: $("[name='capitan']").val().trim(),
            };

            $.ajax({
                url: ajax_object.ajax_url,
                type: 'POST',
                data: data,
                success: function (response) {
                    console.log(response);
                    $('#form_point_sale').trigger("reset");
                    $('.container_form').hide();
                    $('.form_success').show();
                    loader.hide();
                },
                error: function (error) {
                    console.error(error);
                    loader.hide();
                }
            });
        }
    });

})