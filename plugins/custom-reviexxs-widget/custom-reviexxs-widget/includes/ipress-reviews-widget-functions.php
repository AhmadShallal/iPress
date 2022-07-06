<?php
/*
function post_like()
{
    // Check for nonce security
    $nonce = $_POST['nonce'];
  
    if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
        die ( 'Busted!');
     
    if(isset($_POST['post_like']))
    {
        // Retrieve user IP address
        $ip = $_SERVER['REMOTE_ADDR'];
        $post_id = $_POST['post_id'];
         
        // Get voters'IPs for the current post
        $meta_IP = get_post_meta($post_id, "voted_IP");
        $voted_IP = $meta_IP[0];
 
        if(!is_array($voted_IP))
            $voted_IP = array();
         
        // Get votes count for the current post
        $meta_count = get_post_meta($post_id, "votes_count", true);
 
        // Use has already voted ?
        if(!hasAlreadyVoted($post_id))
        {
            $voted_IP[$ip] = time();
 
            // Save IP and increase votes count
            update_post_meta($post_id, "voted_IP", $voted_IP);
            update_post_meta($post_id, "votes_count", ++$meta_count);
             
            // Display count (ie jQuery return value)
            echo $meta_count;
        }
        else
            echo "already";
    }
    exit;
}

$timebeforerevote = 120; // = 2 hours

function hasAlreadyVoted($post_id)
{
    global $timebeforerevote;
 
    // Retrieve post votes IPs
    $meta_IP = get_post_meta($post_id, "voted_IP");
    $voted_IP = $meta_IP;
     
    if(!is_array($voted_IP))
        $voted_IP = array();
         
    // Retrieve current user IP
    $ip = $_SERVER['REMOTE_ADDR'];
     
    // If user has already voted
    if(in_array($ip, array_keys($voted_IP)))
    {
        $time = $voted_IP[$ip];
        $now = time();
         
        // Compare between current time and vote time
        if(round(($now - $time) / 60) > $timebeforerevote)
            return false;
             
        return true;
    }
     
    return false;
}
*/
function post_like()
{
    // Check for nonce security
    $nonce = $_POST['nonce'];
  
    if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
        die ( 'Busted!');
     
    if(isset($_POST['post_like']))
    {
        // Retrieve user IP address
        $ip = $_SERVER['REMOTE_ADDR'];
        $post_id = $_POST['post_id'];
         
        // Get voters'IPs for the current post
        $voted_IP = get_option( "voted_IP" );
        $meta_IP = get_post_meta($post_id, "voted_IP");
        $voted_IP = $meta_IP[0];
 
        if(!is_array($voted_IP))
            $voted_IP = array();
         
        // Get votes count for the current post
        $meta_count = get_post_meta($post_id, "votes_count", true);
 
        // Use has already voted ?
        if(!hasAlreadyVoted($post_id))
        {
            $voted_IP[$ip] = time();
 
            // Save IP and increase votes count
            update_option( "voted_IP", $voted_IP );
            update_post_meta($post_id, "voted_IP", $voted_IP);
            update_post_meta($post_id, "votes_count", ++$meta_count);
             
            // Display count (ie jQuery return value)
            echo $meta_count;
        }
        else
            echo "already";
    }
    exit;
}

add_action('wp_ajax_nopriv_post-like', 'post_like');
add_action('wp_ajax_post-like', 'post_like');

$timebeforerevote = 120;

function hasAlreadyVoted($post_id)
{
    global $timebeforerevote;
 
    // Retrieve post votes IPs
    $voted_IP = get_option( "voted_IP" );
    $meta_IP = get_post_meta($post_id, "voted_IP") != '' ? get_post_meta($post_id, "voted_IP") : '0';
    $meta_IP = $meta_IP + array(null);
    $voted_IP = $meta_IP[0];
     
    if(!is_array($voted_IP)){
        $voted_IP = array();
    }    
    // Retrieve current user IP
    $ip = $_SERVER['REMOTE_ADDR']; //'41.34.159.166'; 
     
    // If user has already voted
    if(in_array($ip, array_keys($voted_IP)))
    {
        $time = $voted_IP[$ip];
        $now = time();
         
        // Compare between current time and vote time
        if(round(($now - $time) / 60) > $timebeforerevote)
            return false;
             
        return true;
    }
     
    return false;
}

function getPostLikeLink($post_id)
{
    $themename = "ipress";
 
    $vote_count = get_post_meta($post_id, "votes_count", true);
    $output = "";
    if(hasAlreadyVoted($post_id)){
        $output .= '<p class="post-like">';
        $output .= ' <span title="'.__('I like this article', $themename).'" class="like alreadyvoted"><i class="fa fa-star-o" aria-hidden="true"></i>Liked...</span>';
    }else{
    $output .= '<p class="post-like">';
        $output .= '<a href="#" data-post_id="'.$post_id.'">
                    <span  title="'.__('I like this article', $themename).'"class="qtip like"><i class="fa fa-star-o" aria-hidden="true"></i>Like this post.</span>
                </a>';
    }
    $output .= '</br><span class="count">Number of Votes : '.$vote_count.'</span></p>';
     
    return $output;
}

/////////////////////////////////////


//Customizing WordPress admin to show post votes
add_filter( 'manage_edit-post_columns', 'voteme_extra_post_columns' );
function voteme_extra_post_columns( $columns ) {
$columns[ "votes_count" ] = __( 'Votes' );
return $columns;
}

function voteme_post_column_row( $column ) {
	if ( $column != "votes_count" )
	return;

	global $post;
	$post_id = $post->ID;
	$votes_count= get_post_meta($post_id, "votes_count", true) != '' ? get_post_meta($post_id, "votes_count", true) : '0';
	echo $votes_count;

}

add_action( 'manage_posts_custom_column', 'voteme_post_column_row', 10, 2 );

// making columns sortable

add_filter( 'manage_edit-post_sortable_columns', 'votes_post_sortable_columns' );

function votes_post_sortable_columns( $columns )
{
	$columns[ "votes_count" ] = 'votes_count';
	return $columns;
}


add_action( 'load-edit.php', 'voteme_post_edit' );

function voteme_post_edit()
{
	add_filter( 'request', 'voteme_sort_posts' );
}
	function voteme_sort_posts( $vars )
{
	if ( isset( $vars['post_type'] ) && 'post' == $vars['post_type'] )
	{
		if ( isset( $vars['orderby'] ) && 'votes_count' == $vars['orderby'] )
		{
			$vars = array_merge(
			$vars,
			array(
			'meta_key' => 'votes_count',
			'orderby' => 'meta_value_num'
			)
			);
		}
	}
return $vars;
}
