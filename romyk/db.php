<?php
$host = 'localhost:8080';
$dbname = 'project_db';
$username = 'root';
$password = ''; // برای XAMPP معمولاً خالیه

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // خطا نمایش داده بشه ولی قطع نکنه
} catch (PDOException $e) {
    die("خطا در اتصال به پایگاه داده: " . $e->getMessage());
}
?>
