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
            document_id: jQuery('#document_id').val(),

        };
        var type = "post";
        var ajaxurl = '/comment/store';
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var todo = 'Yorumunuz kaydedildi.';
                jQuery('#sonuc').append(todo);
                $("#saveComment").attr('disabled', 'disabled');
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
});