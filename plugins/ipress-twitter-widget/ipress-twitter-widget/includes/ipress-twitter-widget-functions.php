<?php




function getTweets($handler,$num){

    $settings = array(
        'oauth_access_token' => "1022479972102021121-4aCXlnAL5DmCGntKBhPCGy9bkzLp6e",
        'oauth_access_token_secret' => "8Acakcsbye8ItaOkilYQfa8SuPYQthOD1d9QT8th7REB0",
        'consumer_key' => "OZh7sfDQC6Gtz8CYfzo4GLVz3",
        'consumer_secret' => "kM9i97kIEg9lcyLjGSEZj82Eikab6fsvQqhTy4UC0TJ7aGuH4h"
    );

    //$number = $num - 1;

    $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
    $getfield = '?screen_name='.$handler.'&count='.$num.'&trim_user=true&exclude_replies=true';
    $requestMethod = 'GET';
    
    $twitter = new TwitterAPIExchange($settings);
    $resp = $twitter->setGetfield($getfield)
        ->buildOauth($url, $requestMethod)
        ->performRequest(true, array(CURLOPT_CAINFO => plugin_dir_path(__FILE__)."/cacert.pem"));
    //var_dump($resp);
    $response = json_decode($resp);
    $out = '';
    foreach($response as $tweet)
    
    {
    
      $out .= 
        '<div class="tweet py-3 pl-4 pr-5">'
      
        .$tweet->text.
        '</div>
        <div class="date pl-4">'
        .$tweet->created_at.
        '</div>';
    
    }
    
    echo $out;
}



/*
string(2218) "[{"created_at":"Wed Jun 22 00:31:00 +0000 2011","id":83331115363999744,"id_str":"83331115363999744","text":"Some intense lightning storms at the Olympic Village in Greece http:\/\/bit.ly\/l0m9IG","truncated":false,"entities":{"hashtags":[],"symbols":[],"user_mentions":[],"urls":[]},"source":"\u003ca href=\"http:\/\/bitly.com\" rel=\"nofollow\"\u003ebitly bitlink\u003c\/a\u003e","in_reply_to_status_id":null,"in_reply_to_status_id_str":null,"in_reply_to_user_id":null,"in_reply_to_user_id_str":null,"in_reply_to_screen_name":null,"user":{"id":35518511,"id_str":"35518511"},"geo":null,"coordinates":null,"place":null,"contributors":null,"is_quote_status":false,"retweet_count":23,"favorite_count":18,"favorited":false,"retweeted":false,"lang":"en"},{"created_at":"Wed Jun 22 00:27:45 +0000 2011","id":83330296174477312,"id_str":"83330296174477312","text":"A stunning Vietnamese cave, what I wouldn't give to be there http:\/\/bit.ly\/j4hvdN","truncated":false,"entities":{"hashtags":[],"symbols":[],"user_mentions":[],"urls":[]},"source":"\u003ca href=\"http:\/\/bitly.com\" rel=\"nofollow\"\u003ebitly bitlink\u003c\/a\u003e","in_reply_to_status_id":null,"in_reply_to_status_id_str":null,"in_reply_to_user_id":null,"in_reply_to_user_id_str":null,"in_reply_to_screen_name":null,"user":{"id":35518511,"id_str":"35518511"},"geo":null,"coordinates":null,"place":null,"contributors":null,"is_quote_status":false,"retweet_count":12,"favorite_count":9,"favorited":false,"retweeted":false,"lang":"en"},{"created_at":"Fri Apr 08 12:49:08 +0000 2011","id":56337782364307457,"id_str":"56337782364307457","text":"42 stunning black and white photos - http:\/\/bit.ly\/gwhjfT","truncated":false,"entities":{"hashtags":[],"symbols":[],"user_mentions":[],"urls":[]},"source":"\u003ca href=\"http:\/\/bitly.com\" rel=\"nofollow\"\u003ebitly bitlink\u003c\/a\u003e","in_reply_to_status_id":null,"in_reply_to_status_id_str":null,"in_reply_to_user_id":null,"in_reply_to_user_id_str":null,"in_reply_to_screen_name":null,"user":{"id":35518511,"id_str":"35518511"},"geo":null */