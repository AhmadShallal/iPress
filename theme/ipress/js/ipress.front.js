jQuery(document).ready(function() {

    //////////////////////////////////////////////
    /// Header News Ticker
    /////////////////////////////////////////////

    var ticker = jQuery('.chw-widget ul');
    ticker.children(':first').show().siblings().hide();

    setInterval(function() {
        ticker.children(':first').slideUp(function() {
            jQuery(this).appendTo(ticker);
            ticker.children(':first').slideDown();

        });
    }, 3000);



    ticker.children().hover(function() {
        jQuery(this).stop();
    });

});