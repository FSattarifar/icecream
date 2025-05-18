<?php
session_start();
include("db.php"); // اتصال به پایگاه داده

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = mysqli_real_escape_string($link, $_POST['username']);
        $password = $_POST['password'];

        // جستجوی نام کاربری و رمز عبور در پایگاه داده
        $query = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
        $result = mysqli_query($link, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // ذخیره اطلاعات ورود در جلسه
            $_SESSION["state_login"] = true;
            $_SESSION["username"] = $row['username'];
            $_SESSION["user_id"] = $row['user_id'];


            mysqli_close($link);
            echo "success"; // ارسال وضعیت موفق
            exit();
        } else {
            echo "نام کاربری یا رمز عبور اشتباه است."; // پیام خطا در صورت عدم تطابق رمز عبور
        }
    } else {
        echo "نام کاربری یافت نشد."; // پیام خطا در صورت نبودن نام کاربری
    }
} else {
    echo "لطفاً تمامی فیلدها را پر کنید."; // پیام خطا در صورت خالی بودن فیلدها
}

?>