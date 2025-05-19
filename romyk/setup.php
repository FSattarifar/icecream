<?php
// ساخت دیتابیس
try {
    $pdo = new PDO("mysql:host=localhost", 'root', '');
    $pdo->exec("CREATE DATABASE IF NOT EXISTS project_db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
} catch (PDOException $e) {
    die("خطا در ساخت دیتابیس: " . $e->getMessage());
}

// فراخوانی اتصال
require_once 'db.php';

// ساخت جدول‌ها
try {
    // users
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS users (
            user_id INT AUTO_INCREMENT PRIMARY KEY,
            username NVARCHAR(50),
            password VARCHAR(50),
            email VARCHAR(255),
            phone VARCHAR(11)
        );
    ");

    // contacts
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS contacts (
            contact_id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT,
            message TEXT,
            FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
        );
    ");

    // categories
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS categories (
            category_id INT AUTO_INCREMENT PRIMARY KEY,
            category_name NVARCHAR(50)
        );
    ");

    // products
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS products (
            product_id INT AUTO_INCREMENT PRIMARY KEY,
            category_id INT,
            pname NVARCHAR(50),
            description TEXT,
            price INT,
            image NVARCHAR(50),
            FOREIGN KEY (category_id) REFERENCES categories(category_id) ON DELETE SET NULL
        );
    ");

    // news
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS news (
            news_id INT AUTO_INCREMENT PRIMARY KEY,
            title NVARCHAR(50),
            date DATE,
            content TEXT,
            image NVARCHAR(50)
        );
    ");

    // orders
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS orders (
            order_id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT,
            product_id INT,
            status INT,
            order_date DATE,
            address NVARCHAR(255),
            FOREIGN KEY (user_id) REFERENCES users(user_id),
            FOREIGN KEY (product_id) REFERENCES products(product_id)
        );
    ");

    echo "✅ جداول با موفقیت ساخته شدند.";
} catch (PDOException $e) {
    die("خطا در ساخت جداول: " . $e->getMessage());
}
?>
