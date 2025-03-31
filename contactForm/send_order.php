<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $city = htmlspecialchars($_POST["city"]);
    $street = htmlspecialchars($_POST["street"]);
    $house = htmlspecialchars($_POST["house"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    $to = "order@kamlava.ru";
    $subject = "Новый заказ с сайта";
    $body = "Поступил новый заказ:\n\n"
        . "Город: $city\n"
        . "Улица: $street\n"
        . "Дом: $house\n"
        . "Email: $email\n"
        . "Доп. информация: $message\n";

    $headers = "From: no-reply@kamlava.ru" . "\r\n" . "Reply-To: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Заказ успешно отправлен!";
    } else {
        echo "Ошибка отправки заказа.";
    }
}
?>
