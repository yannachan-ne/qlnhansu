<?php
$token = $_GET['token'] ?? '';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đặt lại mật khẩu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Đặt lại mật khẩu</h2>
        <form action="xuly_reset.php" method="POST">
            <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
            <div class="form-group">
                <input type="password" name="password" placeholder="Mật khẩu mới" required>
            </div>
            <div class="form-group">
                <input type="password" name="repassword" placeholder="Nhập lại mật khẩu" required>
            </div>
            <div class="form-actions">
                <button type="submit">Cập nhật mật khẩu</button>
            </div>
        </form>
    </div>
</body>
</html>
