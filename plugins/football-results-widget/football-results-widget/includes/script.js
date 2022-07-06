jQuery(document).ready(function($) {

    var results = jQuery('.football-result .results');
    var num = results.find('.results .number');


    results.each(function() {
        jQuery(this).find('.number').each(function(index) {
            var now = jQuery(this);
            var other = jQuery(this).siblings('.number');

            if (now.text() > other.text()) {

                now.css('color', 'red');
            } else {
                other.css('color', 'red');
            }
        });
    });

});


// parent('.results').find('.number').siblings() == addBack()