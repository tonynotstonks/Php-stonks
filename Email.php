<?php
$emails = ["user1@example.com", "user2@example.com"];
$subject = "Важное уведомление";
$message = "Привет! Это автоматическое уведомление от PHP.";

$headers = "From: noreply@example.com\r\n";
$headers .= "Reply-To: noreply@example.com\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

foreach ($emails as $email) {
    $success = mail($email, $subject, $message, $headers);
    if ($success) {
        echo "Email успешно отправлен на $email\n";
    } else {
        echo "Ошибка отправки email на $email\n";
    }
}
?>
