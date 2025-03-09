<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    $to = "order@kamlava.ru";
    $subject = "Новый заказ";
    $message = "Пользователь с email: $email сделал заказ.";
    $headers = "From: no-reply@kamlava.ru";

    if (mail($to, $subject, $message, $headers)) {
        // Сообщение об успешной отправке
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Успешно</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                }
                .success-message {
                    background-color: #4CAF50;
                    color: white;
                    padding: 20px;
                    border-radius: 5px;
                    text-align: center;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
                .success-message a {
                    color: white;
                    text-decoration: underline;
                }
            </style>
        </head>
        <body>
            <div class='success-message'>
                <p>Ваш email успешно отправлен! Спасибо за ваш заказ.</p>
                <p>Вы будете перенаправлены на главную страницу через 5 секунд...</p>
                <p><a href='index.html'>Вернуться на главную</a></p>
            </div>
        </body>
        </html>";

        // Перенаправление на главную страницу через 5 секунд
        header("Refresh: 5; url=index.html");
    } else {
        // Сообщение об ошибке
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Ошибка</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                }
                .error-message {
                    background-color: #ff4d4d;
                    color: white;
                    padding: 20px;
                    border-radius: 5px;
                    text-align: center;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
                .error-message a {
                    color: white;
                    text-decoration: underline;
                }
            </style>
        </head>
        <body>
            <div class='error-message'>
                <p>Ошибка при отправке email. Пожалуйста, попробуйте еще раз.</p>
                <p><a href='index.html'>Вернуться на главную</a></p>
            </div>
        </body>
        </html>";
    }
}
?>