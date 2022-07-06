<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ipress
 */

?>
 </main>
<footer class="footer-container d-flex flex-row px-3 py-2">

        <div class="info-section pt-2">
            <div class="footer-logo p-3">
            <?php
                $flogo = esc_attr( get_option( 'footer_logo' ) );
            ?>
                <img src="<?php echo $flogo; ?>" alt="">
            </div>
            <div class="footer-info ml-3 p-1">
                <p class="info">In laoreet vel velit sed efficitur. Morbi venenatis vel lectus rutrum euismod. Maecenas at ipsum aliquet lorem ultricies commodo. Vivamus suscipit tincidunt quam, et pharetra tellus aliquam laoreet. Aliquam erat volutpat. Maecenas viverra
                    vel elit ut suscipit. lectus dui id ex.</p>
                <p class="email mt-2">
                    <span class="mr-2">Email:</span> information@ipress.com
                </p>
            </div>
        </div>
        <div class=" recent-posts px-3 pt-3 mt-3">
            
                <?php 
                    if ( is_active_sidebar( 'footer-bar' ) ) : ?>
                        
                            <?php dynamic_sidebar( 'FooterBar 1' ); ?>

                <?php endif; ?>
        </div>    
        <div class=" best-revs px-3 pt-3 mt-3">
                <?php 
                    if ( is_active_sidebar( 'footer-bar' ) ) : ?>
                        
                            <?php dynamic_sidebar( 'FooterBar 2' ); ?>

                <?php endif; ?>
        </div> 
        <div class=" footer-contact px-3 pt-3 mt-3">
           <!--  <div class="main-title p-1">
                <h5 class="ml-3 mt-2">Newsletters</h5>
            </div> -->
            <?php 
                    if ( is_active_sidebar( 'footer-bar' ) ) : ?>
                        
                            <?php dynamic_sidebar( 'FooterBar 3' ); ?>

                <?php endif; ?>
        
            <div class="main-title p-1 mt-3">
               <h5 class="ml-3 mt-2">Connect with Us</h5>
           </div>
            <div class="footer-social d-flex flex-row mt-3">
                <?php
                $dribbble = esc_attr( get_option( 'dribbble_handler' ) );
                $pinterest = esc_attr( get_option( 'pinterest_handler' ) );
                $gplus = esc_attr( get_option( 'gplus_handler' ) );
                $twitter = esc_attr( get_option( 'twitter_handler' ) );
                $facebook = esc_attr( get_option( 'facebook_handler' ) );
                $rss = esc_attr( get_option( 'rss_handler' ) );
                $github = esc_attr( get_option( 'github_handler' ) );
                $linkedin = esc_attr( get_option( 'linkedin_handler' ) );
                ?>
                <a href="https://www.dribbble.com/<?php echo $dribbble; ?>" class="footer-social-link ml-1 p-2"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                <a href="https://plus.google.com/<?php echo $gplus; ?>" class="footer-social-link ml-1 p-2"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
                <a href="https://www.twitter.com/<?php echo $twitter; ?>" class="footer-social-link ml-1 p-2"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/<?php echo $facebook; ?>" class="footer-social-link ml-1 p-2"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                <a href="https://www.rss.com/<?php echo $rss; ?>" class="footer-social-link ml-1 p-2"><i class="fa fa-rss" aria-hidden="true"></i></a>
                <a href="https://www.linkedin.com/<?php echo $linkedin; ?>" class="footer-social-link ml-1 p-2"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                <a href="https://www.github.com/<?php echo $github; ?>" class="footer-social-link ml-1 p-2"><i class="fa fa-github" aria-hidden="true"></i></a>
                <a href="https://www.pinterest.com/<?php echo $pinterest; ?>" class="footer-social-link ml-1 p-2"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
            </div>
        </div>



    </footer>

    <div class="d-block container-fluid copy-footer px-5 pt-3 clear-fix">
        <div class="border"></div>
        <div class="copy d-inline-block ml-2 my-2">copyright</div>
        <div class="link d-inline-block float-right mr-2 my-2">
            back to top
            <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
        </div>
    </div>
	

<?php wp_footer(); ?>

</body>
</html>
