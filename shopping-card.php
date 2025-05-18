<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>سبد خرید بستنی</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1>🍦 سبد خرید شما</h1>

    <div class="cart-item">
      <img src="icecream1.png" alt="بستنی شکلاتی">
      <div class="item-details">
        <h3>بستنی شکلاتی</h3>
        <p>قیمت: 30,000 تومان</p>
        <p>تعداد: 2</p>
        <p>مجموع: 60,000 تومان</p>
        <button class="remove-btn">حذف</button>
      </div>
    </div>

    <div class="cart-item">
      <img src="icecream2.png" alt="بستنی وانیلی">
      <div class="item-details">
        <h3>بستنی وانیلی</h3>
        <p>قیمت: 25,000 تومان</p>
        <p>تعداد: 1</p>
        <p>مجموع: 25,000 تومان</p>
        <button class="remove-btn">حذف</button>
      </div>
    </div>

    <div class="cart-total">
      <h2>جمع کل: 85,000 تومان</h2>
      <div class="cart-actions">
        <button class="continue-btn">ادامه خرید</button>
        <button class="checkout-btn">نهایی کردن سفارش</button>
      </div>
    </div>
  </div>
</body>
</html>
