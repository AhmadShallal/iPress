jQuery(document).ready(function($) {

    var li = $('.tweets ul li');
    var tweet = jQuery('.tweets .tweet');
    var date = jQuery('.tweets .date');
    var ind;
    var now;

    tweet.first().show();
    date.first().show();

    li.on('click', function() {
        $(this).not('.active').addClass('active').siblings('li').removeClass('active');
        ind = $(this).index();
        //alert(ind);
        nowTweet = tweet.eq(ind);
        nowDate = date.eq(ind);
        //alert(now);
        nowTweet.show().siblings('.tweet').hide();
        nowDate.show().siblings('.date').hide();
    });

});