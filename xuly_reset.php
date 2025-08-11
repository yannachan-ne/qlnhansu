<?php
session_start();
include "config.php";

$email = $_SESSION['email_reset'] ?? '';
$password = $_POST['password'] ?? '';
$repassword = $_POST['repassword'] ?? '';

if ($password !== $repassword) {
    $_SESSION['message'] = "Mật khẩu không khớp.";
    header("Location: datlaimatkhau.php");
    exit;
}

$hashed = password_hash($password, PASSWORD_DEFAULT);

// Cập nhật mật khẩu
$stmt = $conn->prepare("UPDATE dangnhap SET matkhau = ? WHERE email = ?");
$stmt->bind_param("ss", $hashed, $email);
$stmt->execute();

// Xoá token
$stmt = $conn->prepare("DELETE FROM password_resets WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();

session_destroy();
header("Location: index.php");
exit;
