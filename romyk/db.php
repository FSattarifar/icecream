<?php

 // اتصال به پایگاه داده
    $link = mysqli_connect("localhost", "root", "", "project_db");
    if (mysqli_connect_errno()) {
        http_response_code(500);
        exit("خطا در اتصال به پایگاه داده.");
    }
    mysqli_query($link, "SET NAMES utf8");
?>