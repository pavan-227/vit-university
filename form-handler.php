<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
    $visitor_email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars(strip_tags(trim($_POST['subject'])));
    $message = htmlspecialchars(strip_tags(trim($_POST['message'])));

    $email_from = 'yourname@yourdomain.com'; // Prefer domain-based email
    $email_subject = 'New Form Submission';
    $email_body = "User Name: $name.\n".
                  "User Email: $visitor_email.\n".
                  "Subject: $subject.\n".
                  "User Message: $message.\n";

    $to = 'pavankatepalli0722@gmail.com';
    $headers = "From: $email_from\r\n";
    $headers .= "Reply-To: $visitor_email\r\n";

    if (mail($to, $email_subject, $email_body, $headers)) {
        header("Location: contact.html?status=success");
        exit();
    } else {
        echo "Mail sending failed. Please try again.";
    }
} else {
    echo "Invalid access.";
}
?>
