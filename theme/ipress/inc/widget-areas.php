<?php 

/**
 * 
 *  Recent posts widget in header sidebar
 * 
 */


function ipress_header_widgets_init() {
    
       register_sidebar( array(
           'name'          => 'Toppest Header Widget Area',
           'id'            => 'toppest-header-widget',
           'before_widget' => '<div class="chw-widget">',
           'after_widget'  => '</div>',
           'before_title'  => '<h2 class="chw-title">',
           'after_title'   => '</h2>',
       ) );
    
   }
add_action( 'widgets_init', 'ipress_header_widgets_init' );

// main menu search widget
function ipress_search_widget_init() {
    
       register_sidebar( array(
           'name'          => 'Menu Search Widget',
           'id'            => 'menu-search-widget',
           'before_widget' => '',
           'after_widget'  => '',
           'before_title'  => '',
           'after_title'   => '',
       ) );
    
   }
add_action( 'widgets_init', 'ipress_search_widget_init' );

// top ad widget
function ipress_top_ad_widget_init() {
    
       register_sidebar( array(
           'name'          => 'Top ad Widget',
           'id'            => 'top-ad-widget',
           'before_widget' => '<div class="ad col-md-7 col-sm-4 col-xs-2">',
           'after_widget'  => '</div>',
           'before_title'  => '',
           'after_title'   => '',
       ) );
    
   }
add_action( 'widgets_init', 'ipress_top_ad_widget_init' );

/**
 *  Footer Siderbars ( 3 widgets )
 */

function ipress_footer_sidebars(){
    $args = array(
        'name'          =>  __('FooterBar %d'),
        'id'            => "footer-bar",
        'description'   => '',
        'class'         => '',
        'before_widget' => '<div class="d-flex flex-column">',
        'after_widget'  => "</div>\n",
        'before_title'  => '<div class="main-title p-1">
                            <h5 class="ml-3 mt-2">',
        'after_title'   => "</h5>
                            </div>\n",
    );

    register_sidebars( 3, $args );
}add_action( 'widgets_init', 'ipress_footer_sidebars' );

//id="%1$s" class="widget %2$s"
/**
 *  widgets in sidebars...
 */

function ipress_sidebars_init() {
    $args =  array(
		'name'          => __('Sidebars %d'),
        'id'            => 'sidebars',
        
		'description'   => '',
		'before_widget' => '',
        'after_widget'  => "",
        'before_title'  => '',
        'after_title'   => "",
	);
	register_sidebars(4,$args);
}
add_action( 'widgets_init', 'ipress_sidebars_init' );


