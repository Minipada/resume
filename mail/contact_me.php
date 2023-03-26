<?php
// Check for empty fields
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = "d.bensoussan@proton.me";
$subject = "Wesbite contact Form:  $name";
$body = "<b>Name</b>: $name<br /><b>Email</b>: $email<br /><b>Phone</b>: $phone<br /><br /><b>Message</b>:<br />$message";
$header = "From: david@bensoussan.xyz\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$header .= "Reply-To: $email\n";
$header .= "Content-Type: text/html\r\n";

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
