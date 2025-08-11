<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

include "config.php";

$email = trim($_POST['email'] ?? '');

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['message'] = "Email không hợp lệ.";
    header("Location: quenmatkhau.php");
    exit;
}

// Kiểm tra email có tồn tại
$stmt = $conn->prepare("SELECT * FROM dangky WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    $_SESSION['message'] = "Nếu email tồn tại, liên kết khôi phục đã được gửi.";
    header("Location: quenmatkhau.php");
    exit;
}

// Tạo token
$token = bin2hex(random_bytes(10));

// Gửi mail bằng mail()
$subject = "Mã xác thực khôi phục mật khẩu";
$message = "Mã xác thực của bạn là: <b>$token</b>";
$headers = "From: yourgmail@gmail.com\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

if (mail($email, $subject, $message, $headers)) {
    // ✅ Chỉ chèn token sau khi gửi mail thành công
    $stmt = $conn->prepare("INSERT INTO password_resets (email, token) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $token);
    $stmt->execute();

    // ✅ Gán session SAU khi session_start()
    $_SESSION['email_reset'] = $email;

    header("Location: nhap_token.php?email=" . urlencode($email));
    exit;
} else {
    $_SESSION['message'] = "Không thể gửi email.";
    header("Location: quenmatkhau.php");
    exit;
}
