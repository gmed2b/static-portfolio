<?php

function check_email($field) {
  $field = filter_var($field, FILTER_SANITIZE_EMAIL);
  if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
      return true;
  } else {
      return false;
  }
}

// Get the posted data.
$name = $_POST['contact-name'];
$email = $_POST['contact-email'];
$message = $_POST['contact-message'];

if (!empty($name) && !empty($email) && !empty($message)) {
  // Check if valid email
  if (check_email($email)) {
    // send email
    $receiver = "medghouly@gmail.com";
    $sender = "From: $email";
    $subject = "From: $name <$email>";
    if (mail($receiver, $subject, $message, $sender)) {
      echo json_encode(
        array(
        'success' => true,
        'text' => 'Your message has been sent successfully.'
        )
      );
    } else {
      echo json_encode(
        array(
        'success' => false,
        'text' => 'Sorry, an error occurred while sending your message.'
        )
      );
    }
  }
  else {
    echo json_encode(
      array(
      'success' => false,
      'text' => 'Enter a valid email address.'
      )
    );
  }
}
else {
  echo json_encode(
    array(
    'success' => false,
    'text' => 'Please fill in all the fields.'
    )
  );
  exit;
}