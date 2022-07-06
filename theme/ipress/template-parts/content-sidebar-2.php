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

<div class="side col-lg-3 flex-lg-column flex-md-row">
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
            

            <!-- football results -->
            <div class="side-section football-results my-4 pr-4">
            <?php 
                    //if ( is_active_sidebar( 'sidebar' ) ) : ?>
                        
                            <?php dynamic_sidebar( 'sidebars' ); ?>

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

            
        </div>