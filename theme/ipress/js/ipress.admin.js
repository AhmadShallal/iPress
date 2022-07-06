jQuery(document).ready(function($) {

    var mediaUploader;

    var upmain = $('#upload-logo');
    var revmain = $('#remove-logo');
    var upfooter = $('#upload-footer-logo');
    var revfooter = $('#remove-footer-logo');
    var headerlogo = $('#site-logo');
    var footerlogo = $('#footer-logo');

    function logoHandler(up, rev, logo) {
        up.on('click', function(e) {
            e.preventDefault();
            if (mediaUploader) {
                mediaUploader.open();
                return;
            }

            mediaUploader = wp.media.frames.file_frame = wp.media({
                title: 'Select a Logo for Home Page',
                button: {
                    text: 'Choose Logo'
                },
                multiple: false
            });

            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                logo.val(attachment.url);
                $('.admin-form').submit();
            });

            mediaUploader.open();

        });

        rev.on('click', function(e) {
            e.preventDefault();
            var answer = confirm('Are you sure you want to remove site logo?');
            if (answer == true) {
                logo.val('');
                $('.admin-form').submit();
            }
            return;
        });
    }

    logoHandler(upmain, revmain, headerlogo);
    logoHandler(upfooter, revfooter, footerlogo);

});