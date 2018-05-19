$(document).ready(function () {
    $(document).ready(function() {
        $('select[name="state"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    url: '/myform/ajax/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        
                        $('select[name="nombre_articulo"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="nombre_articulo"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="nombre_articulo"]').empty();
            }
        });
    });

});