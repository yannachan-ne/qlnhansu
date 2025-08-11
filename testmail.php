<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$to = "yourrealmail@gmail.com";
$subject = "Test email";
$message = "Đây là test.";
$headers = "From: yourgmail@gmail.com\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

if (mail($to, $subject, $message, $headers)) {
    echo "Gửi thành công!";
} else {
    echo "Gửi thất bại!";
}