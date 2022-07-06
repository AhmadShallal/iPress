<?php
/**
* A Simple Category Template
*/
 
get_header(); ?> 
 
<section id="primary" class="site-content w-100">
<div id="content" role="main">
 
<?php 
// Check if there are any posts to display
  if ( have_posts() ) : ?>
  
  <header class="archive-header">
  <h1 class="archive-title text-capitalize text-center"><?php single_cat_title(); ?></h1>
  <hr>
  
  <?php
    // Display optional category description
    if ( category_description() ) : ?>
    <div class="archive-meta"><?php echo category_description(); ?></div>
    <?php endif; ?>
    </header>
    <div class="simple-posts d-flex flex-wrap">
    <?php
    
      // The Loop
    while ( have_posts() ) : the_post(); ?>
      <div class="cat-post w-50 px-3 py-2 mb-3">
        <div class="post-content  clear-fix">
            <div class="post-img float-left w-50">
              <a href="<?php echo the_permalink(); ?>">
                <img src="<?php if(ipress_get_attachment() != false ){
                  echo ipress_get_attachment();
                }else{
                  echo 'http://placehold.it/275x200/eeeeee/222222';
                } ?>"/>
              </a>
                 
            </div>

            <div class="post-text d-block w-50  p-2 float-right">
                <h4 class="text-capitalize"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h4>
                  <p class="post-time ml-1">
                    <span class="time-link mr-1"><a href="<?php echo the_permalink(); ?>"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?> </a> </span> /
                    <span class="comments-link ml-1"><a href="<?php echo the_permalink(); ?>"><?php
                        echo get_comments_number_text( "No comments, yet", "One Comment", "%  Comments");
                                    ?></a></span>
                  </p>
                  <div class="post-preview d-inline-block p-1 h-50">
                      <?php echo wpse_custom_excerpts(30); ?>                 
                  </div>
            </div>
        </div>
      </div>

    <?php endwhile;
          echo paginate_links();
    ?>
  
      </div>
      <?php 
    else: ?>
    <p>Sorry, no posts matched your criteria.</p>
    
    
    <?php endif; 
    wp_reset_query();
    ?>
</div>
</section>
 
 
<?php// get_sidebar(); ?>
<?php get_footer(); ?>