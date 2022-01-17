<?php

function check_email($field) {
  $field = filter_var($field, FILTER_SANITIZE_EMAIL);
  if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
      return true;
  } else {
      return false;
  }
}

$server_status = false;
$server_text = 'Please fill in all the fields.';

if (isset($_POST['contact-email']) && !empty($_POST['contact-email'])) {
  // Get the posted data.
  $name = $_POST['contact-name'];
  $email = $_POST['contact-email'];
  $message = $_POST['contact-message'];

  // Check if valid email
  if (check_email($email)) {
    // send email
    $to = "medghouly@gmail.com";
    $subject = "From: $name <$email>";
    if (mail($to, $subject, $message)) {
      $server_status = true;
      $server_text = 'Your message has been sent successfully.';
    }
    else {
      $server_status = false;
      $server_text = 'Sorry, an error occurred while sending your message.';
    }
  }
  else {
    $server_status = false;
    $server_text = 'Enter a valid email address.';
  }
}

echo json_encode(
  array(
  'status' => $server_status,
  'text' => $server_text
  )
);