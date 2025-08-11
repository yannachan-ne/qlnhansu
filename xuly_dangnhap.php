<?php
session_start();
include "config.php";

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$sql = "SELECT * FROM dangky WHERE tendangnhap = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    if (password_verify($password, $row['matkhau'])) {
        $_SESSION['user'] = $row;
        switch ($row['quyen']) {
            case 'admin':
                header("Location: admin/index.php");
                exit;
            case 'user':
                header("Location: user/index.php");
                exit;
            default:
                $_SESSION['error'] = "Tài khoản không có quyền truy cập.";
                header("Location: login.php");
                exit;
        }
    }
}

$_SESSION['error'] = "Sai tên đăng nhập hoặc mật khẩu.";
header("Location: login.php");
exit;
