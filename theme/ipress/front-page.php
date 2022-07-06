<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ipress
 */

get_header(); 
get_sidebar();?>
	<!-- <div id="primary" class="content-area">
		<main id="main" class="site-main"> -->

        <div class="content flex-column col-md-9 col-auto">
        <?php
           
        ?>
            <!-- slider area -->
            <div class="slider-area col-lg-12">
                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="500">

                    <!-- Wrapper for slides -->
                    

                </div>
            </div>
            <!-- center section -->
            <div class="show-news row d-flex">
                <!-- widgets area -->
                <div class="widgets-area col-md-8 col-12 flex-column">
                    <!-- video widget -->
                    <div class="widget video-widget pr-3 py-2 mb-2">
                        <div class="widget-title py-1 px-2 mb-3">
                            <h5 class="my-auto text-capitalize ml-2">video widget</h5>
                        </div>
                        <div class="widget-content video">
                        <?php
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 1,
                            'tax_query' => array(
                            array(
                                'taxonomy' => 'post_format',
                                'field' => 'slug',
                                'terms' => 'post-format-video',
                                'operator' => 'IN'
                                ))
                            );
                            $video_query = new WP_Query( $args );
                            while ( $video_query->have_posts() ) : $video_query->the_post();
                            ?>
                            <div class="video-content">
                                <?php the_content(); ?>
                            </div>
                                                        
                        <?php endwhile; ?>
                        </div>
                    </div>

                    <!-- calendar widget -->
                    <div class="widget calendar-widget pr-3 py-2 mb-2">
                        <div class="widget-content calendar">
                            <?php $Cal_args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 1,
                                'odrer' => 'Desc',
                                'format' => 'link',
                                'tag' => 'calendar'
                            ); 
                            $cal_query = new WP_Query( $Cal_args );
                            while ($cal_query -> have_posts()) : $cal_query -> the_post();
                            ?>

                        <?php  the_content();
                        wp_reset_query();
                     endwhile;   ?>
                        
                            <!-- <iframe src="https://calendar.google.com/calendar/embed?showPrint=0&amp;showTabs=0&amp;height=300&amp;wkst=1&amp;bgcolor=%239999ff&amp;src=en.eg%23holiday%40group.v.calendar.google.com&amp;color=%23125A12&amp;ctz=Africa%2FCairo" style="border-width:0"
                                width="300" height="300" frameborder="0" scrolling="no"></iframe> -->
                        </div>
                    </div>

                    <!-- popular posts -->
                    <div class="widget popular-posts pr-3 py-2 mb-2">
                        <div class="widget-title py-1 px-2 mb-3">
                            <h5 class="my-auto text-capitalize ml-2">popular posts</h5>
                        </div>
                        <div class="widget-content popular-content">
                        <?php 
                         global $more; $more = -5; 
                        $popularpost = new WP_Query( array( 'posts_per_page' => 5, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'
                        ,'format' => 'standard'
                        /* ,'tax_query' => array(
                            array(
                                'taxonomy' => 'post_format',
                                'field' => 'slug',
                                'terms' => 'standard-post-format',
                                'operator' => 'IN'
                            )) */) );
                        while ( $popularpost->have_posts() ) : $popularpost->the_post();
                        ?>
                          
                            <div class="popular-post my-4">
                                <img src="<?php if(ipress_get_attachment() != '' ){
                                    echo ipress_get_attachment();
                                    }else{  
                                    echo 'http://placehold.it/275x200/eeeeee/222222';
                                    }?>" alt="" class="popular-image">
                                <div class="position-relative con">
                                <div class="category text-capitalize p-1 d-inline-block"><?php $category = get_the_category(); if($category){echo $category[0]->cat_name;}  ?></div>
                                <div class="caption text-capitalize px-3 py-2 w-100"><a href="<?php the_permalink(); ?>"><?php echo wpse_custom_excerpts(10); ?></a></div>
                                </div>
                            </div>
                            
                        <?php
                        endwhile;
                        ?>
                        <?php $more = 0;?>
                        <?php wp_reset_postdata(); ?>
                        </div>
<!-- 
                        <div class="widget-content popular-content">
                            <div class="popular-post my-4">
                                <img src="http://placehold.it/275x200/999999/cccccc" alt="" class="popular-image">
                                <div class="category text-capitalize p-1">technology</div>
                                <div class="caption text-capitalize px-3 py-2">In laoreet vel velit sed efficitur. Morbi venenatis vel</div>
                            </div>

                            <div class="popular-post my-4">
                                <img src="http://placehold.it/275x200/999999/cccccc" alt="" class="popular-image">
                                <div class="category text-capitalize p-1">technology</div>
                                <div class="caption text-capitalize px-3 py-2">In laoreet vel velit sed efficitur. Morbi venenatis vel</div>
                            </div>

                            <div class="popular-post my-4">
                                <img src="http://placehold.it/275x200/999999/cccccc" alt="" class="popular-image">
                                <div class="category text-capitalize p-1">technology</div>
                                <div class="caption text-capitalize px-3 py-2">In laoreet vel velit sed efficitur. Morbi venenatis vel</div>
                            </div>

                            <div class="popular-post my-4">
                                <img src="http://placehold.it/275x200/999999/cccccc" alt="" class="popular-image">
                                <div class="category text-capitalize p-1">technology</div>
                                <div class="caption text-capitalize px-3 py-2">In laoreet vel velit sed efficitur. Morbi venenatis vel</div>
                            </div>
                        </div> -->
                    </div>
                    <!-- popular-tags -->
                    <div class="widget popular-tags pr-3 py-2 mb-3">
                        <div class="widget-title py-1 px-2 mb-3">
                            <h5 class="my-auto text-capitalize ml-2">popular tags</h5>
                        </div>
                        <div class="widget-content tags-content">
                            <?php// echo do_shortcode('[ipresstags]');  ?>
                           <span>developer</span>
                            <span>business</span>
                            <span>theme forest</span>
                            <span>wordpress themes</span>
                            <span>styles</span>
                            <span>portfolio carousel</span>
                            <span class="red">workstation</span>
                            <span>wordpress plugins</span>
                            <span>beginner tutorial</span> 
                        </div>
                    </div>

                    <!-- facebook widget -->
                    <div class="widget facebook-widget pr-3 py-2 mb-3">
                        <img class="facebook-img" src="./images/fb-widget.png" alt=""> 
                        <?php/* echo do_shortcode('
                        [efb_likebox fanpage_url="https://www.facebook.com/abbas.elmenoofy"  box_width="275px" box_height="220px" responsive="1" show_faces="1" show_stream="1" hide_cover="0" small_header="1" hide_cta="1" locale="en_US"]
                        '); */ ?>
                        
                    </div>
                </div>
                <!-- posts area -->
                <div class="posts-area col-md-8 col-12 flex-column">
                    <!-- daily post -->
                   

                    <!-- category post -->
                    
                    <div class="post lifestyle-post category-post px-3 py-2">
                        <div class="post-title d-flex justify-content-start py-1 px-2 mb-3">
                            <h5 class=" mr-2">Lifestyle</h5>
                            <div class="ml-auto">
                                <ul class="mr-2">
                                    <li id="first" class="select"></li>
                                    <li id="second" class="select"></li>
                                </ul>
                                <i class="fa fa-rss" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="lifestyle-result"></div>
                    </div>
                    <!-- END Of category post -->
                    
                    <!-- carousel post -->
                    <div class="post carousel-post d-flex flex-column mb-5 px-3">
                        <div class="post-title d-flex justify-content-start py-1 px-2 mb-3">
                            <h5 class="text-capitalize mr-2">carousel posts</h5>
                            <div class="ml-auto">
                                <ul class="mr-2">
                                    <li class="active"></li>
                                    <li id="two"></li>
                                </ul>
                                <i class="fa fa-rss" aria-hidden="true"></i>
                            </div>
                        </div>

                        <div class="post-content mb-5">
                            <div class="post-images row justify-content-md-around">
                            <!--
                                <div class="p-img">
                                    <img src="http://placehold.it/180x160/999999/cccccc" alt="">
                                </div>

                                 <div class="p-img">
                                    <img src="http://placehold.it/180x160/999999/cccccc" alt="">
                                </div>

                                <div class="p-img">
                                    <img src="http://placehold.it/180x160/999999/cccccc" alt="">
                                </div> -->

                            </div> 
                        </div>

                        <div class="carousel-post-ads d-flex justify-content-around ">
                            <img src="http://placehold.it/460x60/999999/cccccc" alt="">
                        </div>
                    </div>
                    <!-- end carousel post -->

                    <!-- category post -->

                    <div class="post category-post music-post px-3 py-2">
                    <div class="post-title d-flex justify-content-start py-1 px-2 mb-3">
                            <h5 class="mr-2">Music</h5>
                            <div class="ml-auto float-right">
                                <ul class="mr-2">
                                    <li id="first" class="select"></li>
                                    <li id="second" class="select"></li>
                                </ul>
                                <i class="fa fa-rss" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="music-result"></div>
                        
                    </div>
                    <!-- END Of category post -->

                    <!-- category post -->

                    <div class="post category-post world-news-post px-3 py-2">
                    <div class="post-title d-flex justify-content-start py-1 px-2 mb-3">
                            <h5 class="mr-2">World News</h5>
                            <div class="ml-auto">
                                <ul class="mr-2">
                                    <li id="first" class="select"></li>
                                    <li id="second" class="select"></li>
                                </ul>
                                <i class="fa fa-rss" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="world-news-result"></div>
                    </div>
                    <!-- END Of category post -->
                </div>
            </div>

        </div>
	<!-- 	
		</main>
	</div> #primary  -->

<?php

get_footer();
