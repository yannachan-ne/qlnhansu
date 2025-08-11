<?php
session_start();
include "config.php";

$email = $_SESSION['email_reset'] ?? '';
$token = trim($_POST['token'] ?? '');

if (!$email) {
    $_SESSION['message'] = "Phiên làm việc hết hạn. Vui lòng thử lại.";
    header("Location: quenmatkhau.php");
    exit;
}

$stmt = $conn->prepare("SELECT * FROM password_resets WHERE email = ? AND token = ?");
$stmt->bind_param("ss", $email, $token);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $_SESSION['verified_email'] = $email;
    ?>
    <!DOCTYPE html>
    <html lang="vi">
    <head>
        <meta charset="UTF-8">
        <title>Đang xác thực...</title>
        <script>
            setTimeout(function () {
                window.location.href = 'datlaimatkhau.php';
            }, 3000);
        </script>
    </head>
    <body>
        <h2 style="color: green;">✅ Mã xác thực đúng! Đang chuyển hướng đến trang đặt lại mật khẩu...</h2>
    </body>
    </html>
    <?php
    exit;
} else {
    $_SESSION['message'] = "❌ Mã xác thực không đúng hoặc đã hết hạn.";
    header("Location: nhap_token.php");
    exit;
}
