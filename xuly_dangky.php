<?php
session_start();
include "config.php";

$username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$repassword = $_POST['repassword'] ?? '';

// Lưu lại thông tin nhập
$_SESSION['old_data'] = [
    'username' => $username,
    'email' => $email
];

// Kiểm tra username
if (strpos($username, ' ') !== false || preg_match('/[^\w]/', $username)) {
    $_SESSION['error'] = "Tên đăng nhập không được chứa dấu cách hoặc ký tự đặc biệt.";
    header("Location: register.php");
    exit;
}

// Kiểm tra email trùng
$sql_email_check = "SELECT * FROM dangky WHERE email = ?";
$stmt_email_check = $conn->prepare($sql_email_check);
$stmt_email_check->bind_param("s", $email);
$stmt_email_check->execute();
$result_email_check = $stmt_email_check->get_result();

if ($result_email_check->num_rows > 0) {
    $_SESSION['error'] = "Email đã được sử dụng.";
    header("Location: register.php");
    exit;
}

// Kiểm tra mật khẩu
if ($password !== $repassword) {
    $_SESSION['error'] = "Mật khẩu không khớp.";
    header("Location: register.php");
    exit;
}

if (!preg_match('/^[A-Z]/', $password)) {
    $_SESSION['error'] = "Mật khẩu phải bắt đầu bằng chữ in hoa.";
    header("Location: register.php");
    exit;
}

if (!preg_match('/[0-9]/', $password)) {
    $_SESSION['error'] = "Mật khẩu phải chứa ít nhất một số.";
    header("Location: register.php");
    exit;
}

if (strlen($password) < 6) {
    $_SESSION['error'] = "Mật khẩu phải có ít nhất 6 ký tự.";
    header("Location: register.php");
    exit;
}

// Kiểm tra tên đăng nhập trùng
$sql_check = "SELECT * FROM dangky WHERE tendangnhap = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("s", $username);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

if ($result_check->num_rows > 0) {
    $_SESSION['error'] = "Tên đăng nhập đã tồn tại.";
    header("Location: register.php");
    exit;
}

// Nếu thành công thì clear old_data
unset($_SESSION['old_data']);

$hashed = password_hash($password, PASSWORD_DEFAULT);
$sql_insert = "INSERT INTO dangky (tendangnhap, email, matkhau, quyen) VALUES (?, ?, ?, 'user')";
$stmt_insert = $conn->prepare($sql_insert);
$stmt_insert->bind_param("sss", $username, $email, $hashed);

if ($stmt_insert->execute()) {
    $_SESSION['user'] = [
        'tendangnhap' => $username,
        'quyen' => 'user'
    ];
    $_SESSION['success'] = "Đăng ký thành công";
    header("Location: register_success.php");
    exit;
} else {
    $_SESSION['error'] = "Đăng ký thất bại. Vui lòng thử lại.";
    header("Location: register.php");
    exit;
}
