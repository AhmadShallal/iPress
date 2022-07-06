<?php

class IPress_Twitter_Widget extends WP_Widget {
    
        /**
         * Sets up a new Recent Posts widget instance.
         *
         * @since 2.8.0
         * @access public
         */
        public function __construct() {
            $widget_ops = array(
                'classname' => 'IPress_Twitter_Widget',
                'description' => __( 'Your site&#8217;s twitter widget.' ),
                'customize_selective_refresh' => true,
            );
            parent::__construct( 'ipress-twitter-widget', __( 'IPress Twitter Widget' ), $widget_ops );
            $this->alt_option_name = 'ipress_twitter_widget';
        }
    
        /**
         * Outputs the content for the current widget instance.
         *
         * @since 2.8.0
         * @access public
         *
         * @param array $args     Display arguments including 'before_handler', 'after_handler',
         *                        'before_widget', and 'after_widget'.
         * @param array $instance Settings for the current Recent Posts widget instance.
         */
        public function widget( $args, $instance ) {
            if ( ! isset( $args['widget_id'] ) ) {
                $args['widget_id'] = $this->id;
            }
    
            $handler = ( ! empty( $instance['handler'] ) ) ? $instance['handler'] : __( '' );
    
            /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
            $handler = apply_filters( 'widget_handler', $handler, $instance, $this->id_base );
    
            $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 3;
            if ( ! $number )
                $number = 3;
            //$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
    
            /**
             * Filters the arguments for the Recent Posts widget.
             *
             * @since 3.4.0
             *
             * @see WP_Query::get_posts()
             *
             * @param array $args An array of arguments used to retrieve the recent posts.
             */
            
            
             echo $args['before_widget']; 

            echo '<div class="tweets w-100 d-flex flex-column text-center">
            <div class="top pt-4 px-2 d-flex">
                <h6 class="d-block  pl-2 text-capitalize">'.$handler.' tweets</h6>
                <h6 class="handler d-block  pl-2"><a href="https://twitter.com/'.$handler.'">@'.$handler.'</a></h6>
                <span class="true mr-1"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
            </div>';
            getTweets($handler,$number);
            
            echo '<ul class="pb-2 ml-0 d-flex text-center">
            <li class="active"></li>
            <li></li>
            <li></li>
            </ul>
            </div>';
             echo $args['after_widget']; ?>
            <?php
            // Reset the global $the_post as this query will have stomped on it
            //wp_reset_postdata();
    
            //endif;
        }
    
        /**
         * Handles updating the settings for the current Recent Posts widget instance.
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
            $instance['handler'] = sanitize_text_field( $new_instance['handler'] );
            $instance['number'] = (int) $new_instance['number'];
            //$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
            return $instance;
        }
    
        /**
         * Outputs the settings form for the Recent Posts widget.
         *
         * @since 2.8.0
         * @access public
         *
         * @param array $instance Current settings.
         */
        public function form( $instance ) {
            $handler     = isset( $instance['handler'] ) ? esc_attr( $instance['handler'] ) : 'beautifulpics';
            $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;
           // $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
    ?>
            <p><label for="<?php echo $this->get_field_id( 'handler' ); ?>"><?php _e( 'handler @:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'handler' ); ?>" name="<?php echo $this->get_field_name( 'handler' ); ?>" type="text" value="<?php echo $handler; ?>" /></p>
    
            <p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
            <input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>
    
            
    <?php
        }
    }
    