<!-- <?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?> -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quên mật khẩu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Quên mật khẩu</h2>
        <?php if (!empty($_SESSION['message'])): ?>
            <p style="color: green;"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></p>
        <?php endif; ?>
        <form action="xuly_quenmatkhau.php" method="POST">
            <div class="form-group">
                <input type="email" name="email" placeholder="Nhập email của bạn" required>
            </div>
            <div class="form-actions">
                <button type="submit">Gửi liên kết đặt lại</button>
            </div>
        </form>
        <div class="switch-form">
            <a href="index.php">← Quay lại trang đăng nhập</a>
        </div>
    </div>
</body>
</html>
