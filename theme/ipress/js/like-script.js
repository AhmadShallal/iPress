jQuery(document).ready(function() {
    console.log('HI from widget js');

    jQuery(".post-like a").on('click', function() {

        var heart = jQuery(this);

        // Retrieve post ID from data attribute
        var post_id = heart.data("post_id");

        // Ajax call
        jQuery.ajax({
            type: "POST",
            url: ajax_var.url,
            data: "action=post-like&nonce=" + ajax_var.nonce + "&post_like=&post_id=" + post_id,
            success: function(count) {
                alert('A');
                // If vote successful
                if (count != "already") {
                    heart.addClass("voted");
                    heart.siblings(".count").text(count);

                }


            }
        });

        return false;
    })
})