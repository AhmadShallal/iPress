<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ipress
 */

get_header(); ?>
	<div class="d-flex  col-12">
	<?php  get_template_part( 'content', 'sidebar-2' ); ?>
	
	
	<div id="primary" class="content-area">
		
		
		
		<div id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			echo getPostLikeLink(get_the_ID());
			
			the_post_navigation();

			wpb_set_post_views(get_the_ID());

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;


		endwhile; // End of the loop.
		?>
		
		
		</div><!-- #main -->
			

	</div><!-- #primary -->
	</div>
	

<?php
//get_sidebar();
get_footer();
