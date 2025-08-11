<?php
session_start();
if (!isset($_SESSION['verified_email'])) {
    echo "<h3 style='color:red;'>❌ Không tìm thấy email xác thực trong session!</h3>";
    echo "<a href='quenmatkhau.php'>← Quay lại</a>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Đặt lại mật khẩu</title>
</head>
<body>
    <h2>Đặt lại mật khẩu</h2>
    <form action="xuly_reset.php" method="POST">
        <input type="password" name="password" placeholder="Mật khẩu mới" required>
        <input type="password" name="repassword" placeholder="Nhập lại mật khẩu" required>
        <button type="submit">Cập nhật</button>
    </form>
</body>
</html>
