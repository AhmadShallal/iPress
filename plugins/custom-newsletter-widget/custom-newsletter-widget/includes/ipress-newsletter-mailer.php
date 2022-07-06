
<?php

$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);

include($path.'wp-load.php');

//add_action( 'wp_ajax_ipress_mailer', 'ipress_mailer' );
//add_action( 'wp_ajax_nopriv_ipress_mailer', 'ipress_mailer' );

//function ipress_mailer(){
    
    
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //get data
            $name = "New Newsletter Subscriber";
            $email = filter_var(trim($_POST['email']),FILTER_SANITIZE_EMAIL);
            $subject = $_POST['subject'];
            $to = $_POST['recipient'];
    
            //validation
            if(empty($email)){
                http_response_code(400);
                echo 'Please Fill out all Fields';
                wp_die();
            }
    
            // Build email
            $message = "Name : $name\n";
            $message .= "Email : $email \n\n";
    
            // headers
            $headers = "From : $name <$email>";
    
            if(wp_mail($to, $subject, $message, $headers )){
                
                http_response_code(200);
                echo 'you are now subscribed';
            }else{
                http_response_code(500);
                echo 'there was a problem';
            }
    
        }
            else{
            http_response_code(403);
            echo 'there was a problem';
        
        }        
//}

