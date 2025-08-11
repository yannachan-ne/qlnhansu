<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="style.css?v=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="container slide-in">
        <?php if (!empty($_SESSION['error'])): ?>
            <p style="color:red;"><?php echo $_SESSION['error'];
                                    unset($_SESSION['error']); ?></p>
        <?php endif; ?>

        <form action="xuly_dangnhap.php" method="POST" class="form active">
            <h2>Đăng nhập</h2>
            <div class="form-group">
                <input type="text" name="username" placeholder="Tên đăng nhập" required>
            </div>
            <div class="form-group password-wrapper">
                <input type="password" name="password" placeholder="Mật khẩu" required id="loginPassword">
                <i class="fa-solid fa-eye toggle-password" onclick="togglePassword('loginPassword', this)"></i>
            </div>
            <div class="form-actions">
                <button type="submit">Đăng nhập</button>
            </div>
            <div class="forgot-password">
                <a style="
                    display: block;
                    margin-top: 20px;
                    text-align: center;
                    font-size: 14px;
                    color: red;
                    text-decoration: none;
                " href="quenmatkhau.php" class="animated-link">Quên mật khẩu?</a>
            </div>
            <div class="switch-form">
                Chưa có tài khoản? <a href="register.php" class="animated-link">Đăng ký</a>
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

</html>