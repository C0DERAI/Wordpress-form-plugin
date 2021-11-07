<?php
/** 
 *Plugin Name: Form Plugin
 *Plugin Desctiption: This is a contact form plugin
*/
function form_plugin(){
  $content = '';

  $content .= '<h2 class="contact-us-title"> contact us </h2>';

  $content .= '<form method="post" class="contact-us-form" action="http://127.0.0.1/wordpress/">';

  $content .= '<label>Full Name
    <input type="text" name="your_name" class="form-control" placeholder="Enter your name..." />
  </label>';

  $content .= '<label>Email Address
    <input type="email" name="your_email" class="form-control" placeholder="Enter your email address..." />
  </label>';

  $content .= '<label>Your Message
    <textarea class="form-control" name="your_message" placeholder="Enter your message..."></textarea>
  </label>';

  $content .= '<input type="submit" name="form_submit" class="button submit-button"/>';
  $content .= '</form>';

  $content .= '<div class="contact-us-info">	
  <p>&#128241; phone number: 0123 4567890</p> </br>	
  <p>&#128231; email address: enquiries@lgservices.com</p></div>';
  
  return $content;
}

add_shortcode('contact_form','form_plugin');

function form_capture(){
  if(isset($_POST['form_submit'])){
    $name = sanitize_text_field($_POST['your_name']);
    $email = sanitize_text_field($_POST['your_email']);
    $message = sanitize_textarea_field($_POST['your_message']);

    $to = 'riwatrj@gmail.com';
    $subject = 'Sumitted by users';
    $message = ''.$name.' - '.$email.' - '.$message;
    wp_mail($to,$subject,$message);
  }
}

add_action('wp_head','form_capture');

?>