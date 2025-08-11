<?php
session_start();
header("refresh:4;url=login.php"); // Tự động chuyển về login.php sau 4 giây
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Đăng ký thành công</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #89f7fe, #66a6ff);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', sans-serif;
    }

    .success-card {
      background-color: #fff;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      padding: 40px 30px;
      text-align: center;
      max-width: 400px;
      width: 100%;
      animation: fadeIn 0.6s ease-in-out;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .success-icon {
      background-color: #4CAF50;
      color: white;
      width: 64px;
      height: 64px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 28px;
      margin: 0 auto 20px;
    }

    .success-title {
      font-size: 22px;
      font-weight: bold;
      color: #28a745;
    }

    .success-message {
      font-size: 15px;
      color: #6c757d;
      margin-top: 10px;
    }
  </style>
</head>
<body>

  <div class="success-card">
    <div class="success-icon">
      ✓
    </div>
    <div class="success-title">🎉 Đăng ký thành công!</div>
    <div class="success-message">Bạn sẽ được chuyển đến trang đăng nhập trong giây lát…</div>
  </div>

</body>
</html>
