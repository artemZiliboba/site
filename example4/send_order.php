<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $to = "order@kamlava.ru";
    $subject = "Новый заказ от посетителя сайта";
    $body = "Email: $email\n\nДополнительное сообщение:\n$message";

    $headers = "From: order@kamlava.ru\r\n" .
               "Reply-To: $email\r\n" .
               "Content-Type: text/plain; charset=UTF-8\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "OK";
    } else {
        http_response_code(500);
        echo "Ошибка отправки письма.";
    }
}
?>
