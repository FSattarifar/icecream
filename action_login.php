<?php
session_start();
if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // اتصال به پایگاه داده
    include("db.php");
    // جستجوی کاربر در پایگاه داده
    $query = "SELECT * FROM `users` WHERE username='$username' AND password='$password'";
    $result = mysqli_query($link, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        // تعیین وضعیت ورود
        $_SESSION["state_login"] = true;
        $_SESSION["username"] = $row['username'];
        $_SESSION["user_id"] = $row['user_id'];
        $_SESSION["type"] = $row['type']; // ذخیره نوع کاربر

        mysqli_close($link);

        // هدایت به صفحات مختلف بر اساس نوع کاربر
        if ($row['type'] == 1) { // اگر type برابر با 1 باشد، ادمین است
            echo "admin";
        } else { // سایر کاربران
            echo "user";
        }
    } else {
        mysqli_close($link);
        echo "error"; // پیام خطا برای کاربر غیرمعتبر
    }
} else {
    echo "error"; // پیام خطا در صورت پر نبودن فیلدها
}
?>