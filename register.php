<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="style.css?v=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="container slide-in">
        <?php if (!empty($_SESSION['error'])): ?>
            <p style="color:red;"><?php echo $_SESSION['error'];
                                    unset($_SESSION['error']); ?></p>
        <?php endif; ?>

        <form action="xuly_dangky.php" method="POST" class="form active">
            <h2>Đăng ký</h2>
            <div class="form-group">
                <input
                    type="text"
                    name="username"
                    placeholder="Tên đăng nhập"
                    required
                    value="<?= htmlspecialchars($_SESSION['old_data']['username'] ?? '') ?>"
                    autocomplete="off">
            </div>
            <div class="form-group">
                <input
                    type="email"
                    name="email"
                    placeholder="Email"
                    required
                    value="<?= htmlspecialchars($_SESSION['old_data']['email'] ?? '') ?>"
                    autocomplete="off">
            </div>
            <div class="form-group password-wrapper">
                <input type="password" name="password" placeholder="Mật khẩu" required id="registerPassword">
                <i class="fa-solid fa-eye toggle-password" onclick="togglePassword('registerPassword', this)"></i>
            </div>
            <div class="form-group password-wrapper">
                <input type="password" name="repassword" placeholder="Nhập lại mật khẩu" required id="rePassword">
                <i class="fa-solid fa-eye toggle-password" onclick="togglePassword('rePassword', this)"></i>
            </div>
            <div class="form-actions">
                <button type="submit">Đăng ký</button>
            </div>
            <div class="switch-form">
                Đã có tài khoản? <a href="login.php" class="animated-link">Đăng nhập</a>
            </div>
        </form>
    </div>

    <script>
        function togglePassword(inputId, icon) {
            const input = document.getElementById(inputId);
            if (input.type === "password") {
                input.type = "text";
                icon.classList.replace("fa-eye", "fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.replace("fa-eye-slash", "fa-eye");
            }
        }
    </script>
</body>
<?php unset($_SESSION['old_data']); ?>

</html>