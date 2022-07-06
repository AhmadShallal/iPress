<?php

class IPress_Widget_Football extends WP_Widget {
    
        /**
         * Sets up a new Recent Posts widget instance.
         *
         * @since 2.8.0
         * @access public
         */
        public function __construct() {
            $widget_ops = array(
                'classname' => 'ipress_football',
                'description' => __( 'Recent Football matches results.' ),
                'customize_selective_refresh' => true,
            );
            parent::__construct( 'ipress-football', __( 'Ipress Football' ), $widget_ops );
            $this->alt_option_name = 'widget_recent_entries';
        }
    
        /**
         * Outputs the content for the current Football results widget instance.
         *
         * @since 2.8.0
         * @access public
         *
         * @param array $args     Display arguments including 'before_competition', 'after_competition',
         *                        'before_widget', and 'after_widget'.
         * @param array $instance Settings for the current Recent Posts widget instance.
         */
        public function widget( $args, $instance ) {
            $competitionId    =  $instance['id'];            
            $number    =  $instance['number'];

            echo $args['before_widget'];
            echo $this->get_match_results($competitionId ,$number);
            echo $args['after_widget'];
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
            /*$instance = array(
                'competition' => (!empty($new_instance['competition'] )) ? strip_tags( $new_instance['competition'] ):' ',
                'id' => (!empty($new_instance['id'] )) ? strip_tags( $new_instance['id'] ):' ',
                'number' => (!empty($new_instance['number'] )) ? strip_tags( $new_instance['number'] ):' '
            );
            */
            $instance = $old_instance;
            $instance['competition'] = sanitize_text_field( $new_instance['competition'] );
            $instance['id'] = (int) $new_instance['id'];
            $instance['number'] = (int) $new_instance['number'];
            
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

            $uri = 'http://api.football-data.org/v1/competitions/';
            $reqPrefs['http']['method'] = 'GET';
            $reqPrefs['http']['header'] = 'X-Auth-Token: 81e7ed95bbf548909f4c793f5eabc580';
            $stream_context = stream_context_create($reqPrefs);
            $response = file_get_contents($uri, false, $stream_context);
            $json = json_decode($response,true);
            
            
        
            $competition     = isset( $instance['competition'] ) ? esc_attr( $instance['competition'] ) : 'BSA';
            $competitionId    = isset( $instance['id'] ) ? absint( $instance['id'] ) : 444;            
            $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;
            $comp = array($competition => $competitionId);
    ?>
        
            <p><label for="<?php echo $this->get_field_id( 'competition' ); ?>">Please Choose One Competition.</label></p>           
           <p>
           <select class="form-control widefat comp" id="<?php echo $this->get_field_id( 'competition' ); ?>" name="<?php echo $this->get_field_name( 'competition' ); ?>" value="<?php echo $competition  ?>">
                <option selected="selected"><?php echo 'you choose  '.$competition ?></option>
                <?php
                    foreach ($json as $value) {
                        $comp[$value['league']] =  $value['id']  ;
                        ?>
                    <option  value="<?= $value['league'] ?>" >
                    <?php echo $value['league'] ; ?>
                    </option>
                <?php
                    } ?>
            </select> 
           </p>
           <?php  $competitionId =($comp[$competition]); ?>
            <p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of matches to show:' ); ?></label>
            <input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>
            <p><input class="hidden" id="<?php echo $this->get_field_id( 'id' ); ?>" name="<?php echo $this->get_field_name( 'id' ); ?>" type="text-input" value="<?php echo $competitionId; ?>"  /></p>
    <?php
           
        }         
         
        public function get_match_results($id,$num){
            $uri = 'http://api.football-data.org/v1/competitions/'.$id.'/fixtures';
            $reqPrefs['http']['method'] = 'GET';
            $reqPrefs['http']['header'] = 'X-Auth-Token: 81e7ed95bbf548909f4c793f5eabc580';
            $stream_context = stream_context_create($reqPrefs);
            $json_fixtures = file_get_contents($uri, false, $stream_context);
            $parsed_fixtures = json_decode($json_fixtures,true);
            $fixtures_only = $parsed_fixtures['fixtures'];


            ?>
    
            <div class="side-title py-1 px-2 mb-3">
                <h5 class="d-inline text-capitalize ml-2">football results</h5>
            </div> 
            <div class="side-content py-1">
            <div  class="container-fluid" >
            <div class="date"><?php echo $date = date('m/d/Y h:i:s a', time()); ?></div>
            <?php
            for($x = 0 ; $x< $num ; $x++ ){
                //echo $fixtures_only[$x]['date'];
            
            
            ?> 
           
               
                <div class="football-result w-100 text-center my-2">
                    <div class="teams table-row">
                        <div class="team text-capitalize  "><?php echo $fixtures_only[$x]['homeTeamName']; ?></div>
                        <span class="sep"> - </span>
                        <div class="team text-capitalize "><?php echo $fixtures_only[$x]['awayTeamName']; ?></div>
                    </div>
                    
                    <div class="results table-row">
                        <div class="number "><?php echo $fixtures_only[$x]['result']['goalsAwayTeam']; ?></div>
                        <span class="sep"> - </span>
                        <div class="number "><?php echo $fixtures_only[$x]['result']['goalsHomeTeam']; ?></div>                        
                    </div>
                </div>
            
            <?php
            }?>
            </div>
            </div>
            <?Php
        }
          
    }
    ?>