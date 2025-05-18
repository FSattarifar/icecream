<?php
session_start();
include("db.php");

if (
    isset($_POST['usernamer']) && !empty($_POST['usernamer']) &&
    isset($_POST['passwordr']) && !empty($_POST['passwordr']) &&
    isset($_POST['emailr']) && !empty($_POST['emailr']) &&
    isset($_POST['phoner']) && !empty($_POST['phoner'])
) {
    // دریافت اطلاعات ارسالی از فرم
    $username = $_POST['usernamer'];
    $password = $_POST['passwordr'];
    $email = $_POST['emailr'];
    $phone = $_POST['phoner'];

    // بررسی صحت ایمیل
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        echo "پست الکترونیکی وارد شده معتبر نیست.";
        exit();
    }

    // بررسی صحت شماره تلفن
    if (!preg_match("/^09[0-9]{9}$/", $phone)) {
        echo "شماره تلفن نامعتبر است. شماره باید با '09' شروع شده و 11 رقم باشد.";
        exit();
    }

    // اتصال به پایگاه داده
    $link = mysqli_connect("localhost", "root", "", "jar");
    if (mysqli_connect_errno()) {
        echo "خطا در اتصال به پایگاه داده: " . mysqli_connect_error();
        exit();
    }

    mysqli_query($link, "SET NAMES utf8");

    // ذخیره اطلاعات در پایگاه داده
    $query = "INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `phone) VALUES (NULL, '$username', '$password', '$email', '$phone');";
    if (mysqli_query($link, $query)) {
        echo "success"; // پیام موفقیت برای پاسخ جاوااسکریپت
    } else {
        echo "ثبت‌نام انجام نشد. لطفاً دوباره تلاش کنید.";
    }

    // بستن اتصال به پایگاه داده
    mysqli_close($link);
} else {
    echo "لطفاً تمامی فیلدها را مقداردهی کنید.";
}
?>
