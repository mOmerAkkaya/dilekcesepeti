jQuery(document).ready(function($){
    $("#saveComment").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            comment: jQuery('#comment').val(),
        };
        var type = "GET";
        var ajaxurl = '/comment/store';
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var todo = formData.comment + ' Yorumunuz kaydedildi Eklendi';
                jQuery('#sonuc').append(todo);
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
});