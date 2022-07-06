<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ipress
 */

/* if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
 */

/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
?>

<div class="side col-md-3 col-12 flex-column ">
            <!-- social media -->
            <?php
             $twitter = esc_attr( get_option( 'twitter_handler' ) );
             $facebook = esc_attr( get_option( 'facebook_handler' ) );
             $rss = esc_attr( get_option( 'rss_handler' ) );
             $dribbble = esc_attr( get_option( 'dribbble_handler' ) );             
            ?>
            <table>
                <tbody class="side-section social-media">
                    <tr class="mw-100">
                        <td class="align-middle subscribe-section twitter d-inline-block my-1 mw-50 text-truncate clear-fix">

                            <div class="d-inline-block float-left text-center p-3">
                                <div class="front">
                                    <a href="#"><i class="icon-sm fa fa-twitter"></i></a>
                                </div>

                                <div class="back">
                                    <a href="https://www.twitter.com/<?php echo $twitter; ?>"> twitter</a>

                                </div>
                            </div>
                            <div class="d-inline-block float-left ml-3 p-1 mw-50">
                                <span>10 000</span></br>
                                <span>Followers</span>
                            </div>

                        </td>
                        <td class="align-middle subscribe-section facebook d-inline-block my-1 mw-50 text-truncate clear-fix">

                            <div class="d-inline-block float-left text-center p-3">
                                <div class="front">
                                    <a href="#"><i class="icon-sm fa fa-facebook"></i></a>
                                </div>

                                <div class="back">
                                    <a href="https://www.facebook.com/<?php echo $facebook; ?>"> facebook</a>

                                </div>
                            </div>
                            <div class="d-inline-block float-left ml-3 p-1 mw-50">
                                <span>10 000</span></br>
                                <span>Likes</span>
                            </div>

                        </td>
                    </tr>
                    <tr class="mw-100">
                        <td class="align-middle subscribe-section dribbble d-inline-block my-1 mw-50 text-truncate clear-fix">

                            <div class="d-inline-block float-left text-center p-3">
                                <div class="front">
                                    <a href="#"><i class="icon-sm fa fa-dribbble"></i></a>
                                </div>

                                <div class="back">
                                    <a href="https://www.dribbble.com/<?php echo $dribbble; ?>"> dribbble</a>

                                </div>
                            </div>
                            <div class="d-inline-block float-left ml-3 p-1 mw-50">
                                <span>10 000</span></br>
                                <span>Subscribe</span>
                            </div>

                        </td>
                        <td class="align-middle subscribe-section feed d-inline-block my-1 mw-50 text-truncate clear-fix">

                            <div class="d-inline-block float-left text-center p-3">
                                <div class="front">
                                    <a href="https://www.rss.com/<?php echo $rss; ?>"><i class="icon-sm fa fa-feed"></i></a>
                                </div>

                                <div class="back">
                                    <a href="#"> feed</a>

                                </div>
                            </div>
                            <div class="d-inline-block float-left ml-3 p-1 mw-50">
                                <span>10 000</span></br>
                                <span>Subscribe</span>
                            </div>

                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- side ads -->
            <div class="side-section side-ads mb-2">
                <div class="big-ad w-100 py-3 mt-2">
                    <img class="img-fluid mw-100" src="http://placehold.it/280x250/dddddd/aaaaaa">
                </div>
                <div class="big-ad d-inline-block clear-fix mt-2 text-md-center">
                    <img class="img-fluid mw-50  float-lg-left  m-md-2" src="http://placehold.it/125x125/dddddd/aaaaaa">
                    <img class="img-fluid mw-50  float-lg-right  m-md-2" src="http://placehold.it/125x125/dddddd/aaaaaa">
                </div>
            </div>
            <!-- whats hot -->
            <div class="side-section whats-hot mt-4 pr-4">
                <div class="side-title py-1 px-2 mb-4 clear-fix">
                    <h5 class=" d-inline text-capitalize ml-2">what's hot</h5>
                
                    <ul class=" float-right mr-2">
                        <li class="active" data-pg = "1"></li>
                        <li data-pg = "2"></li>
                        <li data-pg = "3"></li>
                    </ul> 
                </div>
                <div class="hot"></div>
                <!-- <div class="side-content d-flex flex-column py-1">
                    <div class="wh-item w-100 pr-1 mb-3 clear-fix">
                        <div class="whats-hot-img float-left">
                            <img src="http://placehold.it/60x60/999999/cccccc" alt="">
                            <span>1</span>
                        </div>
                        <div class="whats-hot-post w-75 float-right pl-3">
                            <span class="title d-block text-truncate text-capitalize mb-3">A new yorker doesn't necessary come from new york !</span>
                            <span class="time mr-3">3 minutes ago</span>
                            <span class="rating ml-3"><i class="fa fa-star-o" aria-hidden="true"></i> 9.25</span>
                        </div>
                    </div>
                </div>

                <div class="side-content d-flex flex-column py-1">
                    <div class="wh-item w-100 pr-1 mb-3 clear-fix">
                        <div class="whats-hot-img float-left">
                            <img src="http://placehold.it/60x60/999999/cccccc" alt="">
                            <span>2</span>
                        </div>
                        <div class="whats-hot-post w-75 float-right pl-3">
                            <span class="title d-block text-truncate text-capitalize mb-3">can you guess the most "overpaid" actor !</span>
                            <span class="time mr-3">24 hours ago</span>
                            <span class="rating ml-3"><i class="fa fa-star-o" aria-hidden="true"></i> 8</span>
                        </div>
                    </div>
                </div>
                <div class="side-content d-flex flex-column py-1">
                    <div class="wh-item w-100 pr-1 mb-3 clear-fix">
                        <div class="whats-hot-img float-left">
                            <img src="http://placehold.it/60x60/999999/cccccc" alt="">
                            <span>3</span>
                        </div>
                        <div class="whats-hot-post w-75 float-right pl-3">
                            <span class="title d-block text-truncate text-capitalize mb-3">A new yorker doesn't necessary come from new york !</span>
                            <span class="time mr-3">3 months ago</span>
                            <!-- <span class="rating ml-3"><i class="fa fa-star-o" aria-hidden="true"></i> 9.25</span> ->
                        </div>
                    </div>
                </div>

                <div class="side-content d-flex flex-column py-1">
                    <div class="wh-item w-100 pr-1 mb-3 clear-fix">
                        <div class="whats-hot-img float-left">
                            <img src="http://placehold.it/60x60/999999/cccccc" alt="">
                            <span>4</span>
                        </div>
                        <div class="whats-hot-post w-75 float-right pl-3">
                            <span class="title d-block text-truncate text-capitalize mb-3">can you guess the most "overpaid" actor !</span>
                            <span class="time mr-3">2 days ago</span>
                            <span class="rating ml-3"><i class="fa fa-star-o" aria-hidden="true"></i> 7</span>
                        </div>
                    </div>
                </div>

                <div class="side-content d-flex flex-column py-1">
                    <div class="wh-item w-100 pr-1 mb-3 clear-fix">
                        <div class="whats-hot-img float-left">
                            <img src="http://placehold.it/60x60/999999/cccccc" alt="">
                            <span>5</span>
                        </div>
                        <div class="whats-hot-post w-75 float-right pl-3">
                            <span class="title d-block text-truncate text-capitalize mb-3">A new yorker doesn't necessary come from new york !</span>
                            <span class="time mr-3">3 hours ago</span>
                            <!-- <span class="rating ml-3"><i class="fa fa-star-o" aria-hidden="true"></i> 9.25</span> ->
                        </div>
                    </div>
                </div> -->
            </div>

            <!-- football results -->
            <div class="side-section football-results my-4 pr-4">
            <?php 
                    //if ( is_active_sidebar( 'sidebar' ) ) : ?>
                        
                            <?php dynamic_sidebar( 'sidebars-1' ); ?>

                <?php// endif; ?>
                
            </div>
            <!-- ipress tweets -->
            <div class="side-section ipress-tweets my-4 pr-4">
            <?php 
                    //if ( is_active_sidebar( 'sidebar' ) ) : ?>
                        
                            <?php dynamic_sidebar( 'sidebars-2' ); ?>

                <?php //endif; ?>

                <!-- <div class="tweets w-100 d-block text-center">
                    <div class="top pt-4 px-1">
                        <h6 class="d-block float-left pl-4">iPress Tweets</h6>
                        <h6 class="handler d-block float-left pl-3">@ipress</h6>
                        <span class="true px-1 d-block"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
                    </div>
                    <div class="tweet d-block py-3 pl-4 pr-5">

                        Ut ut velit diam. Duis euismod iaculis est a pulvinar. Integer sed.est a pulvinar. Integer sed.
                    </div>
                    <div class="date pl-4 d-block">
                        2 hours ago
                    </div>
                    <ul class="pb-2 text-center">
                        <li class="active"></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div> -->
            </div>

            <!-- ipress poll -->
            <div class="side-section poll my-4 pr-4">
                <div class="side-title py-1 px-2 mb-3">
                    <h5 class="d-inline text-capitalize ml-2">poll</h5>
                </div>

                <?php 
                    //if ( is_active_sidebar( 'sidebar' ) ) : ?>
                        
                            <?php dynamic_sidebar( 'sidebars-3' ); ?>

                <?php //endif; ?>

                <!-- <h6 class="text-center">How is my site?</h6>
                <form action="" method="post">
                    <input type="radio" id="p1" name="poll-choice" value="amazing">
                    <label for="p1"><span><span></span></span>Amazing</label></br>
                    <input type="radio" id="p2" name="poll-choice" value="good">
                    <label for="p2"><span><span></span></span>Good</label></br>
                    <input type="radio" id="p3" name="poll-choice" value="canbe">
                    <label for="p3"><span><span></span></span>Can be improved</label></br>
                    <input type="radio" id="p4" name="poll-choice" value="nocomment">
                    <label for="p4"><span><span></span></span>No comment.</label></br>
                    <button type="submit">Vote</button>
                    <button type="">View Results</button>
                </form> -->
            </div>

            <!-- recent comments -->

            <!-- <div class="side-section recent-comments mt-4 pr-4"> -->
            <?php 
                    //if ( is_active_sidebar( 'sidebar' ) ) : ?>
                        
                            <?php dynamic_sidebar( 'sidebars-4' ); ?>

                <?php //endif; ?>
                <!-- <div class="side-title py-1 px-2 mb-4">
                    <h5 class="d-inline text-capitalize ml-2">recent comments</h5>
                </div>
                <div class="side-content d-flex flex-column pb-1">
                    <div class="wh-item w-100 pr-1 mb-2 clear-fix">
                        <div class="recent-img float-left">
                            <img src="http://placehold.it/65x65/999999/cccccc" alt="">
                        </div>
                        <div class="recent-post w-75 float-right pl-2">
                            <span class="commenter">Alex :</span>
                            <span class="title d-block text-truncate text-capitalize">A new yorker doesn't necessary come from new york !</span>
                            <span class="time mr-3">3 minutes ago</span>
                        </div>
                    </div>
                </div>

                <div class="side-content d-flex flex-column pb-1">
                    <div class="wh-item w-100 pr-1 mb-2 clear-fix">
                        <div class="recent-img float-left">
                            <img src="http://placehold.it/65x65/999999/cccccc" alt="">
                        </div>
                        <div class="recent-post w-75 float-right pl-2">
                            <span class="commenter">Karoon :</span>
                            <span class="title d-block text-truncate text-capitalize">A new yorker doesn't necessary come from new york !</span>
                            <span class="time mr-3">3 minutes ago</span>
                        </div>
                    </div>
                </div>

                <div class="side-content d-flex flex-column pb-1">
                    <div class="wh-item w-100 pr-1 mb-2 clear-fix">
                        <div class="recent-img float-left">
                            <img src="http://placehold.it/65x65/999999/cccccc" alt="">
                        </div>
                        <div class="recent-post w-75 float-right pl-2">
                            <span class="commenter">Admin :</span>
                            <span class="title d-block text-truncate text-capitalize">A new yorker doesn't necessary come from new york !</span>
                            <span class="time mr-3">3 minutes ago</span>
                        </div>
                    </div>
                </div>

                <div class="side-content d-flex flex-column pb-1">
                    <div class="wh-item w-100 pr-1 mb-2 clear-fix">
                        <div class="recent-img float-left">
                            <img src="http://placehold.it/65x65/999999/cccccc" alt="">
                        </div>
                        <div class="recent-post w-75 float-right pl-2">
                            <span class="commenter">Michele JK :</span>
                            <span class="title d-block text-truncate text-capitalize">A new yorker doesn't necessary come from new york !</span>
                            <span class="time mr-3">3 minutes ago</span>
                        </div>
                    </div>
                </div> -->
            <!-- </div> -->
        </div>