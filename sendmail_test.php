<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Gọi thư viện PHPMailer

$mail = new PHPMailer(true);

try {
    // Cấu hình SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // SMTP của Gmail
    $mail->SMTPAuth = true;
    $mail->Username = 'youremail@gmail.com'; // Email của bạn
    $mail->Password = 'your_app_password';  // Mật khẩu ứng dụng (App Password)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Người gửi
    $mail->setFrom('youremail@gmail.com', 'Tên của bạn');

    // Người nhận
    $mail->addAddress('receiver@example.com', 'Tên người nhận');

    // Nội dung
    $mail->isHTML(true);
    $mail->Subject = 'Test Email';
    $mail->Body    = 'Xin chào! Đây là email test gửi bằng <b>PHPMailer</b>.';
    $mail->AltBody = 'Xin chào! Đây là email test gửi bằng PHPMailer.';

    $mail->send();
    echo 'Email đã được gửi thành công';
} catch (Exception $e) {
    echo "Không thể gửi email. Lỗi: {$mail->ErrorInfo}";
}
