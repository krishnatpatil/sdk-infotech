<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
  
if($_POST) {
    $name = "";
    $email = "";
    $subject = "";
    $message = "";
    $email_body = "<div>";
      
    if(isset($_POST['name'])) {
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Name:</b></label>&nbsp;<span>".$name."</span>
                        </div>";
    }
 
    if(isset($_POST['email'])) {
        $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $email_body .= "<div>
                           <label><b>Email:</b></label>&nbsp;<span>".$email."</span>
                        </div>";
    }
      
    if(isset($_POST['subject'])) {
        $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Subject:</b></label>&nbsp;<span>".$subject."</span>
                        </div>";
    }
      
    if(isset($_POST['message'])) {
        $message = htmlspecialchars($_POST['message']);
        $email_body .= "<div>
                           <label><b>Message:</b></label>
                           <div>".$message."</div>
                        </div>";
    }
      
    $recipient = "contactus@sdkinfotech.com";  
    $email_body .= "</div>";
 
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $email . "\r\n";
      
    if(mail($recipient, $subject, $message, $headers)) {
        echo '<div class="sent-message d-none">';
        echo '<img src="assets/img/correct.png" alt="Success" class="success__img" />';
        echo 'Your message has been sent. Thank you!';
        echo '</div>';
    } else {
        echo '<div class="error-message">';
        echo '<img src="assets/img/error.png" alt="Error" class="error__img" />';
        echo 'We are sorry but the email did not go through.';
        echo '</div>';
    }
      
} else {
    echo '<div class="error-message">';
    echo '<img src="assets/img/error.png" alt="Error" class="error__img" />';
    echo 'Oops! Something went wrong.';
    echo '</div>';
}
sleep(5);
header("Location: ../index.html");
?>
