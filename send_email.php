<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Function to send email
function sendEmail($to, $subject, $body) {
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'ujjwalis493@gmail.com';                 // SMTP username
        $mail->Password   = 'Ujjwal@i2s#';                         // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption; `ssl` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('ujjwalis493@gmail.com', 'ujjwal');
        $mail->addAddress($to);                                     // Add a recipient
       
        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Debugging: Print received POST data
var_dump($_POST);

// Get email, subject, and body from POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $subject = "Delete Website Notification";
    $body = "Please delete this website now.";
    
    // Debugging: Print extracted email
    echo "Email: " . $email . "<br>";
    
    // Send email
    if (sendEmail($email, $subject, $body)) {
        echo json_encode(array("status" => "success", "message" => "Email sent successfully."));
    } else {
        echo json_encode(array("status" => "error", "message" => "Failed to send email."));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Invalid request method."));
}
?>
