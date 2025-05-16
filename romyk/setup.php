<?php
// ساخت دیتابیس
try {
    $pdo = new PDO("mysql:host=localhost", 'root', '');
    $pdo->exec("CREATE DATABASE IF NOT EXISTS project_db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
} catch (PDOException $e) {
    die("خطا در ساخت دیتابیس: " . $e->getMessage());
}

// اتصال به دیتابیس
$pdo->exec("USE project_db");

// ساخت جدول‌ها و افزودن داده نمونه
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
    $pdo->exec("
        INSERT INTO users (username, password, email, phone) VALUES
        ('ice_lover1', 'pass123', 'ice1@example.com', '09120000001'),
        ('sweetfan2', 'pass456', 'ice2@example.com', '09120000002');
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
    $pdo->exec("
        INSERT INTO contacts (user_id, message) VALUES
        (1, 'سلام، بستنی شکلاتی تخفیف نداره؟'),
        (2, 'آیا بستنی رژیمی هم دارید؟');
    ");

    // categories
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS categories (
            category_id INT AUTO_INCREMENT PRIMARY KEY,
            category_name NVARCHAR(50)
        );
    ");
    $pdo->exec("
        INSERT INTO categories (category_name) VALUES
        ('بستنی سنتی'),
        ('بستنی میوه‌ای');
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
    $pdo->exec("
        INSERT INTO products (category_id, pname, description, price, image) VALUES
        (1, 'بستنی زعفرانی', 'بستنی سنتی با طعم زعفران و خامه.', 40000, 'zaferani.jpg'),
        (2, 'بستنی توت‌فرنگی', 'بستنی خوشمزه با طعم توت‌فرنگی طبیعی.', 35000, 'strawberry.jpg');
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
    $pdo->exec("
        INSERT INTO news (title, date, content, image) VALUES
        ('افتتاح شعبه جدید', CURDATE(), 'شعبه جدید ما در شیراز افتتاح شد!', 'news1.jpg'),
        ('جشنواره تخفیف تابستانی', CURDATE(), 'با خرید هر سه بستنی، یکی رایگان بگیر!', 'news2.jpg');
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
    $pdo->exec("
        INSERT INTO orders (user_id, product_id, status, order_date, address) VALUES
        (1, 1, 1, CURDATE(), 'تهران، خیابان ولیعصر، پلاک ۱۲'),
        (2, 2, 0, CURDATE(), 'اصفهان، میدان نقش‌جهان، کوچه ۳');
    ");

    echo "✅ جداول و داده‌های نمونه برای بستنی‌فروشی با موفقیت ایجاد شدند.";
} catch (PDOException $e) {
    die("❌ خطا در ساخت جداول یا درج داده‌ها: " . $e->getMessage());
}
?>
