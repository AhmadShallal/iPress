<?php
/**
 * ipress functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ipress
 */

if ( ! function_exists( 'ipress_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ipress_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ipress, use a find and replace
		 * to change 'ipress' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ipress', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'ipress' ),
		) );


		
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'ipress_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'ipress_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ipress_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ipress_content_width', 640 );
}
add_action( 'after_setup_theme', 'ipress_content_width', 0 );

/** Enabling shortcodes */
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */


/**
 * Enqueue scripts and styles.
 */
function ipress_scripts() {
	wp_enqueue_style( 'ipress-style', get_stylesheet_uri() );

	wp_enqueue_script( 'ipress-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'ipress-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


//wp_enqueue_script('my-ajax-request', admin_url('admin-ajax.php'), array('jquery'));

//wp_localize_script('my-ajax-request', 'MyAjax', array('ajaxurl' => admin_url('admin-ajax.php')));
}
add_action( 'wp_enqueue_scripts', 'ipress_scripts' );

add_filter('get_search_form', 'my_search_form');
function my_search_form($html) {
 $action = esc_url( home_url('/') );
 $html =' <div class="menu-2 ml-auto">
 <form class="form-inline" role="search" method="get" id="search-form" action="">
	 <div class="input-group">
		 <input class="form-control bg-inverse" type="search" placeholder="search" name="s" id="search-input">
		
		 <button class="input-group-addon" type="submit" id="search-submit"><i class="icon-sm fa fa-search"></i></button>

	 </div>
	 <button class=""><i class="fa fa-random fa-inverse" aria-hidden="true"></i></button>
 </form>
</div>';
 return $html;
}

add_filter( 'wp_nav_menu_items','add_search_box', 10, 2 );
function add_search_box( $items, $args ) {
$items .=  get_search_form( false );
return $items;
}

function wpse_custom_excerpts($limit) {
    return wp_trim_words(get_the_excerpt(), $limit, '<a href="'. esc_url( get_permalink() ) . '">' . '&nbsp;&hellip;' . /*__( 'Read more &nbsp;&raquo;', 'wpse' ) .*/ '</a>');
} 

/**
 * 
 * Read More for excerept
 */
function wpdocs_excerpt_more( $more ) {
	
	/*if ( $more == -5 ) {
		return '[.....]';
	}else{*/
			return sprintf( '<a class="read-more" href="%1$s">%2$s</a>',
			get_permalink( get_the_ID() ),
			__( 'Read More', 'textdomain' )
			);
	//}
    
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

/** Assign numbers to hot posts */
/*
function updateNumbers() {
	/* numbering the published posts, starting with 1 for oldest;
	/ creates and updates custom field 'incr_number';
	/ to show in post (within the loop) use <?php echo get_post_meta($post->ID,'incr_number',true); ?>
	/ alchymyth 2010 *
	global $wpdb;
	$querystr = "SELECT $wpdb->posts.* FROM $wpdb->posts WHERE $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type = 'post' ";
	$pageposts = $wpdb->get_results($querystr, OBJECT);
	$counts = 0 ;
	if ($pageposts):
	foreach ($pageposts as $post):
	$counts++;
	add_post_meta($post->ID, 'incr_number', $counts, true);
	update_post_meta($post->ID, 'incr_number', $counts);
	endforeach;
	endif;
	}  
	
	add_action ( 'publish_post', 'updateNumbers', 11 );
	add_action ( 'deleted_post', 'updateNumbers' );
	add_action ( 'edit_post', 'updateNumbers' );
*/
/**
 *  Get views count for popular posts
 */
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);



/** Popular Tags */
function ipress_tags() { 
	$string = '';
	$iptags =  get_tags();
	foreach ($iptags as $tag) { 
	$string .= '<span class="tagbox"><a data-count="'. $tag->count .'" class="taglink" href="'. get_tag_link($tag->term_id) .'">'. $tag->name . '</a></span>' . "\n" ;
	} 
	return $string;
}add_shortcode('ipresstags' , 'ipress_tags' );

/* function wpdocs_excerpt_more( $more ) {
    return '[.....]';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' ); */

//

function more_post_ajax(){
    $page = $_POST["paged"];
    header("Content-Type: text/html");

    $args = array(
        'post_type' => 'post',
        'paged' => $page,
		'cat' => 'uncategorized',
		'posts_per_page' => 5
    );

    $hotpost = new WP_Query($args);
    while ($hotpost->have_posts()) { $hotpost->the_post();
		$index = $hotpost->current_post + 1;
		?>
		  
			<div class="side-content d-flex flex-column py-1">
				<div class="wh-item w-100 pr-1 mb-3 clear-fix">
					<div class="whats-hot-img float-left">
						<!-- <img src="http://placehold.it/60x60/999999/cccccc" alt=""> -->
						<?php echo get_the_post_thumbnail( $id, array( 60, 60 )); ?>
						<span><?php echo $index++;  ?></span>
					</div>
					<div class="whats-hot-post w-75 float-right pl-3">
						<span class="title d-block text-truncate text-capitalize mb-3"><?php the_title(); ?></span>
						<span class="time mr-3"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
						<span class="rating ml-3"><i class="fa fa-star-o" aria-hidden="true"></i><?php/* $meta = get_post_meta( get_the_ID() );  print_r($meta['votes_count'][0]);*/ ?></span>
					</div>
				</div>
			</div> 
			
	<?php
	}
	?>
		
		<?php  wp_reset_postdata(); 
    

    exit; 
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax'); 
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');


function addAttributeToDropdown($html_content){
	$html_content = str_replace('<select','<select onchange=""',$html_content);
	return $html_content; 
  }
  
  add_filter('wp_dropdown_cats','addAttributeToDropdown');




/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * requiring admin page functions file.
 */

require get_template_directory() . '/inc/function-admin.php';

/**
 * requiring admin page functions file.
 */

require get_template_directory() . '/inc/enqueue.php';


/**
 * requiring theme support file.
 */

 require get_template_directory() . '/inc/ipress-theme-support.php';

/**
 * requiring cpt file.
 */

 require get_template_directory() . '/inc/ipress-custom-post-types.php';


 /**
 * requiring Widgets file.
 */

require get_template_directory() . '/inc/widget-areas.php';

/**
 *  requiring the nav walker
 */

require get_template_directory() . '/inc/wp-bootstrap-navwalker.php';



