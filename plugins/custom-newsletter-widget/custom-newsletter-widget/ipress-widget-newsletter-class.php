<?php

class IPress_Widget_Newsletter extends WP_Widget {
    
    public function __construct(){
        
       parent::__construct(
           'newsletter_widget',
           __( 'Ipress Newsletter Widget', 'ipresstextdomain' ),
           array(
               'classname'   => 'tutsplustext_widget',
               'description' => __( 'A basic newsletter plugin.', 'ipresstextdomain' )
           )
         );
        }
         public function widget( $args, $instance ) {    
            
           extract( $args );
            
           $title         = apply_filters( 'widget_title', $instance['title'] );
           
            
           echo $before_widget;
            
           if ( $title ) {
               echo $before_title . $title . $after_title;
           }
            ?>                    
           <p class="my-3 pr-3">To receive the latest updates and Latest Posts enter your email</p>
           <div id="form-msg"></div>
           <form id="nl-form" class="my-4 form-inline" method="post" action="<?php echo plugins_url().'/custom-newsletter-widget/includes/ipress-newsletter-mailer.php'; ?>">
               <input type="email" name="email" id="email" placeholder="please enter your email" required>
               <input type="hidden" name="recipient" value="<?php echo $instance['recipient']; ?>">
               <input type="hidden" name="subject" value="<?php echo $instance['subject']; ?>">
               <button type="submit" name="nl-submit"><i class="fa fa-check" aria-hidden="true"></i></button>
           </form>
           <?php
           echo $after_widget;
            
       }
        

         public function update( $new_instance, $old_instance ) {        
            
           $instance = $old_instance;
            
           $instance['title'] = strip_tags( $new_instance['title'] );
           $instance['recipient'] = strip_tags( $new_instance['recipient'] );
           $instance['subject'] = strip_tags( $new_instance['subject'] );
           
           return $instance;
            
       }

       
        /**
         * Outputs the settings form for the  widget.
         *
         * @since 2.8.0
         * @access public
         *
         * @param array $instance Current settings.
         */
        public function form( $instance ) {
            $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : 'Newsletter';
            $recipient =  $instance['recipient'];
            $subject     = isset( $instance['subject'] ) ? esc_attr( $instance['subject'] ) : 'You have a new Subscriber';
           
    ?>
            <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>
    
            <p><label for="<?php echo $this->get_field_id( 'recipient' ); ?>"><?php _e( 'Recipient:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'recipient' ); ?>" name="<?php echo $this->get_field_name( 'recipient' ); ?>" type="text" value="<?php echo $recipient; ?>" /></p>

            <p><label for="<?php echo $this->get_field_id( 'subject' ); ?>"><?php _e( 'Subject:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'subject' ); ?>" name="<?php echo $this->get_field_name( 'subject' ); ?>" type="text" value="<?php echo $subject; ?>" /></p>
            
    <?php
        }
    }
    