$(document).ready(function () {

    //ejemplo codigo select dependientes
    $('select[name="state"]').on('change', function () {
        var stateID = $(this).val();
        if (stateID) {
            $.ajax({
                url: '/myform/ajax/' + stateID,
                type: "GET",
                dataType: "json",
                success: function (data) {

                    $('select[name="nombre_articulo"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="nombre_articulo"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        } else {
            $('select[name="nombre_articulo"]').empty();
        }
    });

    //select para tray return
    $("select[name=article_id]").change(function () {
        var articleID = $(this).val();
        if (articleID) {
            $.ajax({
                url: '/admin/trays/tray_return/ajax/' + articleID,
                dataType: "json",
                type: "GET"
            }).done(function (data) {

                var json_string = JSON.stringify(data);

                var obj = $.parseJSON(json_string);

                $('#tipo').val(obj.cant);
            });
        }
    });
});