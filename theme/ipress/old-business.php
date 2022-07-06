<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ipress
 */

get_header(); ?>

<?php
query_posts('showposts=5&category_name=business');
if ( have_posts() ) : while ( have_posts() ) : the_post();?>
	<div class="post daily-post px-3 py-2">
	<div class="post-title py-1 px-2 mb-3">
		<h5 class="d-inline ml-2"><?php  get_the_category(); ?></h5>
	</div>
	<div class="post-content  clear-fix">
		<div class="post-img float-left mw-50">
			<img src="" alt="" class="">
		</div>

		<div class="post-text d-block w-50  float-right">
			<h4 class="text-capitalize"><?php the_title(); ?></h4>
			<p class="post-time ml-1">
				<span class="time-link mr-1"><a href="#"> <?php the_time(  ); ?> </a> </span> /
				<span class="comments-link ml-1"><a href="#"> <?php  ?> </a></span>
			</p>
			<p class="post-preview d-inline-block  h-50">
				<?php the_excerpt(); ?>
			</p>
		</div>
	</div>

</div>
<?php
endwhile; else:
// No posts.
endif;
wp_reset_query();
?>

<?php
//get_sidebar();
get_footer();
