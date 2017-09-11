<?php

$a = mail( '385898sw@gmail.com', 'проверка функции mail', 'Тестовое письмо для проверки функкции mail, отправляю из корня' );
var_dump( $a );


// Сообщение
$message = "Line 1\r\nLine 2\r\nLine 3";

// На случай если какая-то строка письма длиннее 70 символов мы используем wordwrap()
$message = wordwrap($message, 70, "\r\n");

// Отправляем
mail('385898sw@gmail.com', 'My Subject', $message);

phpinfo();
