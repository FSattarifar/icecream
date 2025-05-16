
## ⚙️ عملیات درج (Insert)، ویرایش (Update) و نمایش (Select) با PDO

در این پروژه، برای هر جدول قابلیت‌های پایه‌ی درج، ویرایش و بارگذاری اطلاعات به کمک PDO پیاده‌سازی شده است.

---

### ✅ 1. جدول `users`

**📥 درج کاربر:**
```php
$stmt = $pdo->prepare("INSERT INTO users (username, password, email, phone) VALUES (?, ?, ?, ?)");
$stmt->execute(['newuser', 'newpass', 'new@example.com', '09123456789']);
````

**✏️ ویرایش کاربر:**

```php
$stmt = $pdo->prepare("UPDATE users SET email = ?, phone = ? WHERE user_id = ?");
$stmt->execute(['updated@example.com', '09300000000', 1]);
```

**📤 نمایش کاربران:**

```php
$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
```

---

### ✅ 2. جدول `contacts`

**📥 درج پیام:**

```php
$stmt = $pdo->prepare("INSERT INTO contacts (user_id, message) VALUES (?, ?)");
$stmt->execute([1, 'پیام تستی از کاربر ۱']);
```

**✏️ ویرایش پیام:**

```php
$stmt = $pdo->prepare("UPDATE contacts SET message = ? WHERE contact_id = ?");
$stmt->execute(['پیام ویرایش‌شده', 1]);
```

**📤 نمایش پیام‌ها:**

```php
$stmt = $pdo->query("SELECT * FROM contacts");
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
```

---

### ✅ 3. جدول `categories`

**📥 درج دسته‌بندی:**

```php
$stmt = $pdo->prepare("INSERT INTO categories (category_name) VALUES (?)");
$stmt->execute(['بستنی شکلاتی']);
```

**✏️ ویرایش دسته:**

```php
$stmt = $pdo->prepare("UPDATE categories SET category_name = ? WHERE category_id = ?");
$stmt->execute(['بستنی ژلاتو', 1]);
```

**📤 نمایش دسته‌ها:**

```php
$stmt = $pdo->query("SELECT * FROM categories");
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
```

---

### ✅ 4. جدول `products`

**📥 درج محصول:**

```php
$stmt = $pdo->prepare("INSERT INTO products (category_id, pname, description, price, image) VALUES (?, ?, ?, ?, ?)");
$stmt->execute([1, 'بستنی شکلاتی', 'بستنی با طعم شکلات تلخ', 45000, 'choco.jpg']);
```

**✏️ ویرایش محصول:**

```php
$stmt = $pdo->prepare("UPDATE products SET pname = ?, price = ? WHERE product_id = ?");
$stmt->execute(['بستنی کاراملی', 50000, 2]);
```

**📤 نمایش محصولات:**

```php
$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
```

---

### ✅ 5. جدول `news`

**📥 درج خبر:**

```php
$stmt = $pdo->prepare("INSERT INTO news (title, date, content, image) VALUES (?, CURDATE(), ?, ?)");
$stmt->execute(['خبر جدید', 'جشنواره تخفیف آغاز شد!', 'news3.jpg']);
```

**✏️ ویرایش خبر:**

```php
$stmt = $pdo->prepare("UPDATE news SET title = ?, content = ? WHERE news_id = ?");
$stmt->execute(['عنوان ویرایش‌شده', 'محتوای به‌روزرسانی‌شده', 1]);
```

**📤 نمایش اخبار:**

```php
$stmt = $pdo->query("SELECT * FROM news");
$news = $stmt->fetchAll(PDO::FETCH_ASSOC);
```

---

### ✅ 6. جدول `orders`

**📥 درج سفارش:**

```php
$stmt = $pdo->prepare("INSERT INTO orders (user_id, product_id, status, order_date, address) VALUES (?, ?, ?, CURDATE(), ?)");
$stmt->execute([1, 2, 0, 'تهران، خیابان آزادی']);
```

**✏️ ویرایش سفارش:**

```php
$stmt = $pdo->prepare("UPDATE orders SET status = ?, address = ? WHERE order_id = ?");
$stmt->execute([1, 'تهران، میدان انقلاب', 1]);
```

**📤 نمایش سفارش‌ها:**

```php
$stmt = $pdo->query("SELECT * FROM orders");
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
```

---

### 🔐 نکته امنیتی

تمامی دستورات از **Prepared Statements** استفاده می‌کنند تا از حملات SQL Injection جلوگیری شود.

