<?php

/**
 * Plugin Name:My Contact Form
 */
// include 'wp-load.php';

function example_form_plugin(){
    $content = '';
    $content .='<div>';
    $content .='<h2>Contact Us</h2>';
    $content .='<form method="post" action="http://localhost/wordpress/?page_id=23">';
    $content .='<label for="your_name">Name</label>';
    $content .='<input type="text" name="your_name" placeholder="Enter your name"/>';
    $content .='<br />';
    $content .='<label for="your_email">Email</label>';
    $content .='<input type="email" name="your_email" placeholder="Enter your email"/>';
    $content .='<br />';
    $content .='<label for="your_comments">Questions or comments</label>';
    $content .='<textarea name="your_comments" placeholder="Enter your questions or comments"></textarea>';
    $content .='<input type="submit" name="example_form_submit" value="SEND YOUR INFORMATION"/>';

    $content .='</div>';
    $content .='</form>';
    return $content;
}
add_shortcode('example_form','example_form_plugin');
function example_form_capture()
{
if(isset($_POST['example_form_submit']))
{
    echo "<pre>";
      print_r($_POST);
      echo "</pre>";
    $name= sanitize_text_field($_POST['your_name']);
    $email= sanitize_text_field($_POST['your_email']);
    $comments=sanitize_textarea_field($_POST['your_comments']);
    $email_to="srinjonsadhukhan9163@gmail.com";
    $subject="Test form submission";
    $message=''.$name.'-'.$email.'-'.$comments;
    wp_mail($email_to,$subject,$message);
}
}
add_action('wp_head','example_form_capture');
 ?>
 <!-- Shortcode:[example_form] -->