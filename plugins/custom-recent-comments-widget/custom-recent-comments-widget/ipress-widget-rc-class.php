<?php

class IPress_Widget_Recent_Comments extends WP_Widget {
    
        /**
         * Sets up a new Recent comments widget instance.
         *
         * @since 2.8.0
         * @access public
         */
        public function __construct() {
            $widget_ops = array(
                'classname' => 'ipress_recent_comments',
                'description' => __( 'Your site&#8217;s most recent comments.' ),
                'customize_selective_refresh' => true,
            );
            parent::__construct( 'ipress-recent-comments', __( 'Ipress Recent comments' ), $widget_ops );
            $this->alt_option_name = 'widget_recent_entries';
        }
    
        /**
         * Outputs the content for the current Recent comments widget instance.
         *
         * @since 2.8.0
         * @access public
         *
         * @param array $args     Display arguments including 'before_title', 'after_title',
         *                        'before_widget', and 'after_widget'.
         * @param array $instance Settings for the current Recent comments widget instance.
         */
        public function widget( $args, $instance ) {
            if ( ! isset( $args['widget_id'] ) ) {
                $args['widget_id'] = $this->id;
            }
    
            $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( '' );
    
            /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
            $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
    
            $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
            if ( ! $number )
                $number = 5;
            $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
    
            /**
             * Filters the arguments for the Recent comments widget.
             *
             * @since 3.4.0
             *
             * @see WP_Query::get_posts()
             *
             * @param array $args An array of arguments used to retrieve the recent comments.
             */
            
                $args = array(
                    'orderby' => 'modified',
                    'order' => 'DESC',
                    'before_widget' => '<div class="side-section recent-comments mt-4 pr-4">',
                    'after_widget' => '</div>',
                    'before_title' =>'<div class="side-title py-1 px-2 mb-4">
                    <h5 class="d-inline text-capitalize ml-2">',
                    'after_title' =>'</h5>
                    </div>'
                );
                $comments_query = new WP_Comment_Query;
                $comments = $comments_query->query( $args );

                if ( !empty( $comments ) ) :
            ?>
            <?php echo $args['before_widget']; ?>
            <?php if ( $title ) {
                echo $args['before_title'] . $title . $args['after_title'];
            } ?>
            
            <?php foreach ( $comments as $comment ) { ?>
            
            <div class="side-content d-flex flex-column pb-1">
                    <div class="wh-item w-100 pr-1 mb-2 clear-fix">
                        <div class="recent-img float-left">
                            <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="">
                        </div>
                        <div class="recent-post w-75 float-right pl-2">
                        <a href="<?php the_permalink(); ?>">

                            <span class="commenter"><?php the_author(); ?></span>
                            <span class="title d-block text-truncate text-capitalize"><?php the_title(); ?></span>
                            <span class="time mr-3"><?php echo get_the_date(); ?></span>
                        </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
            
            <?php echo $args['after_widget']; ?>
            <?php
            // Reset the global $the_post as this query will have stomped on it
            wp_reset_postdata();
        else:echo 'No comments found.';
            endif;
        }
    
        /**
         * Handles updating the settings for the current Recent comments widget instance.
         *
         * @since 2.8.0
         * @access public
         *
         * @param array $new_instance New settings for this instance as input by the user via
         *                            WP_Widget::form().
         * @param array $old_instance Old settings for this instance.
         * @return array Updated settings to save.
         */
        public function update( $new_instance, $old_instance ) {
            $instance = $old_instance;
            $instance['title'] = sanitize_text_field( $new_instance['title'] );
            $instance['number'] = (int) $new_instance['number'];
            $instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
            return $instance;
        }
    
        /**
         * Outputs the settings form for the Recent comments widget.
         *
         * @since 2.8.0
         * @access public
         *
         * @param array $instance Current settings.
         */
        public function form( $instance ) {
            $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
            $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
            $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
    ?>
            <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>
    
            <p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of comments to show:' ); ?></label>
            <input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>
    
            <p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
            <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label></p>
    <?php
        }
    }
    