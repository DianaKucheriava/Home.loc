$(document).ready(function() {
    $('select[name="id_country"]').on('change', function() {
        var id_country = $(this).val();
        if(id_country) {
            $.ajax({
                url: '/register/ajax/'+id_country,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $('select[name="id_region"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="id_region"]').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                }
            });
        }else{
            $('select[name="id_region"]').empty();
        }
    });
});
$(document).ready(function() {
    $('select[name="id_region"]').on('change', function() {
        var id_region = $(this).val();
        if(id_region) {
            $.ajax({
                url: '/register/'+id_region,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $('select[name="id_city"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="id_city"]').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                }
            });
        }else{
            $('select[name="id_city"]').empty();
        }
    });
});