<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ipress
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
		<link rel="pingback"  href="<?php bloginfo('pingback_url'); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="header-container d-flex flex-column">
        <!-- top section -->
        <div class="top-section header-section d-flex justify-content-end">
            <div class="top-latest mr-auto">
                <span class="circ">
                    <i class="fa fa-circle fa-xs"></i>
                </span>
                <span>
                    <?php 
                        if ( is_active_sidebar( 'toppest-header-widget' ) ) : ?>
                            <div id="header-widget-area" class="chw-widget-area widget-area" role="complementary">
                            <?php dynamic_sidebar( 'toppest-header-widget' ); ?>
                            </div>
                            
                    <?php endif; ?>
                </span>

            </div>
            <div class="top-links d-inline-flex">
                <div class="date "><?php echo current_time('F j, Y g:i a'); ?></div>
                <div class="social-links">
                <?php
                $pinterest = esc_attr( get_option( 'pinterest_handler' ) );
                $gplus = esc_attr( get_option( 'gplus_handler' ) );
                $twitter = esc_attr( get_option( 'twitter_handler' ) );
                $facebook = esc_attr( get_option( 'facebook_handler' ) );
                $rss = esc_attr( get_option( 'rss_handler' ) );
                ?>
                    <a class="pinterest" href="https://pinterest.com/<?php echo $pinterest; ?>"><i class="icon-sm fa fa-pinterest-p"></i></a>
                    <a class="gplus" href="https://plus.google.com/<?php echo $gplus; ?>"><i class="icon-sm fa fa-google-plus"></i></a>
                    <a class="twitter" href="https://twitter.com/<?php echo $twitter; ?>"><i class="icon-sm fa fa-twitter"></i></a>
                    <a class="facebook" href="https://facebook.com/<?php echo $facebook; ?>"><i class="icon-sm fa fa-facebook"></i></a>
                    <a class="rss" href="https://rss.com/<?php echo $rss; ?>"><i class="icon-sm fa fa-feed"></i></a>
                </div>
                <span class="lang"><a href="#"><img src="./images/us.svg" alt=""></a></span>
            </div>
        </div>
        <!-- logo-section -->
        <?php
        $logo = esc_attr( get_option( 'site_logo' ) );
        ?>
        <div class="logo-section header-section d-flex justify-content-end align-carousel-items-center">
            <div class="logo mr-auto align-self-center col-md-3 col-xs-2">
                <img src="<?php echo $logo; ?>" alt="">
            </div>
           <!--  <div class="ad col-md-7 col-sm-4 col-xs-2">
                <img src="./images/ads1.png" alt="">
            </div> -->
            <?php 
                if ( is_active_sidebar( 'top-ad-widget' ) ) : ?>
                   <?php dynamic_sidebar( 'top-ad-widget' ); ?>
            <?php endif; ?>
        </div>
        <!-- menu section -->
        <div class="menu-section">
            <nav class="navbar navbar-inverse navbar-expand-lg">
                <!-- <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> -->
                
                <div class="navbar-header">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- <a class="navbar-brand" href="<?php// echo home_url(); ?>">
                <i class="icon-sm fa fa-inverse fa-home "></i>
                </a> -->
                </div>
                
                <?php 
                    wp_nav_menu( array(
                        'theme_location'	=> 'primary',
                        'depth'				=> 2,
                        'container'			=> 'div' ,
                        'container_class'	=> 'navbar-collapse',
                        'container_id'		=> 'navbar',
                        'menu_class'		=> 'nav navbar-nav',
                        'before'            => '',
                        'after'             => '',
                        'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
                        'walker'			=> new WP_Bootstrap_Navwalker()
                    ) );
                ?>

                <!-- <div class="menu-2 ml-auto">
                        <form class="form-inline">
                            <div class="input-group">
                                <input class="form-control bg-inverse" type="text" id="search-top" placeholder="search">
                               
                                <span class="input-group-addon" id="basic-addon1"><i class="icon-sm fa fa-search"></i></span>

                            </div>
                            <button class=""><i class="fa fa-random fa-inverse" aria-hidden="true"></i></button>
                        </form>
                    </div> -->
            </nav>
        </div>
    </header>
    <main class="d-flex nowrap row container-fluid">