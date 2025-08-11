<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// $host = "sql211.infinityfree.com"; 
// $user = "if0_39664077";
// $password = "Xuan642003";
// $database = "if0_39664077_qlnhansu"; 

$host = "localhost";
$user = "root";
$password = "";
$database = "qlnhansu";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("❌ Kết nối thất bại: " . $conn->connect_error);
}

$conn->set_charset("utf8");

echo "✅ Kết nối thành công đến CSDL!";
