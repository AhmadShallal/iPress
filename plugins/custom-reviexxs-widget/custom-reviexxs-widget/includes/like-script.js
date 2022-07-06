jQuery(document).ready(function() {


    jQuery(".post-like a").click(function() {

            heart = jQuery(this);

            // Retrieve post ID from data attribute
            post_id = heart.data("post_id");

            // Ajax call
            jQuery.ajax({
                type: "post",
                url: ajax_var.url,
                data: "action=post-like&nonce=" + ajax_var.nonce + "&post_like=&post_id=" + post_id,
                success: function(count) {
                    // If vote successful
                    heart.html('');
                    heart.addClass("voted");
                    if (count != "already") {

                        heart.siblings(".count").text(count + ' Votes');
                    }
                }
            });

            return false;
        })
        /*
        function votemeaddvote(postId) {
            jQuery.ajax({
                type: 'POST',
                url: votemeajax.ajaxurl,
                data: {
                    action: 'voteme_addvote',
                    postid: postId
                },

                success: function(data, textStatus, XMLHttpRequest) {

                    var linkid = '#voteme-' + postId;
                    jQuery(linkid).html('');
                    jQuery(linkid).append(data);
                },
                error: function(MLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        }*/
});