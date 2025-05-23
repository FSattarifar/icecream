<?php
<<<<<<< HEAD
$host = 'localhost:8080';
$dbname = 'project_db';
$username = 'root';
$password = ''; // برای XAMPP معمولاً خالیه
=======
>>>>>>> b25f4803b90c3cc895760bf83c37af93d4f63b9c

 // اتصال به پایگاه داده
    $link = mysqli_connect("localhost", "root", "", "project_db");
    if (mysqli_connect_errno()) {
        http_response_code(500);
        exit("خطا در اتصال به پایگاه داده.");
    }
    mysqli_query($link, "SET NAMES utf8");
?>