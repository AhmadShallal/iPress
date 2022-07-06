jQuery(document).ready(function($) {

    $('#nl-form').submit(function(e) {
        e.preventDefault();
        // serilaize data
        var nlData = $('#nl-form').serialize();

        // Submit form

        $.ajax({
            type: 'POST',
            url: $('#nl-form').attr('action'),
            data: nlData
        }).done(function(response) {
            // if success
            $('#form-msg').removeClass('error');
            $('#form-msg').addClass('success');

            // set form text

            $('#form-msg').text(response);

            // clear fields

            $('#email').val('');
        }).fail(function(data) {
            // if error
            $('#form-msg').removeClass('success');
            $('#form-msg').addClass('error');

            if (data.responseText !== '') {
                $('#form-msg').text(data.responseText);
            } else {
                $('#form-msg').text('Email Not Sent..');
            }

        });
    });

});