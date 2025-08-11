<?php
session_start();

// Nhận email từ URL (nếu có) và gán lại vào session
if (isset($_GET['email'])) {
    $_SESSION['email_reset'] = $_GET['email'];
}

$email = $_SESSION['email_reset'] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nhập mã xác thực</title>
</head>
<body>
    <h2>Nhập mã xác thực</h2>

    <?php if (!empty($_SESSION['message'])): ?>
        <p style="color:red;"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></p>
    <?php endif; ?>

    <form action="xuly_token.php" method="POST">
        <input type="text" name="token" placeholder="Nhập mã token" required>
        <button type="submit">Xác nhận</button>
    </form>
</body>
</html>
