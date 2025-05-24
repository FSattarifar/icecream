
<style>
    /* فونت و استایل کلی صفحه */
body {
  font-family: "Vazir";
  background-color: #fff8f0;
  color: #333;
  margin: 0;
  padding: 20px;
  direction: rtl; /* راست‌چین */
}

/* محتوای اصلی در یک کادر وسط‌چین */
.container {
  max-width: 1000px;
  margin: auto;
  background-color: #fff;
  padding: 20px;
  border-radius: 16px;
  box-shadow: 0 0 15px rgba(0,0,0,0.1);
}

h1 {
  text-align: center;
  color: #ff69b4;
  font-weight: bold;
}

/* هر آیتم سبد خرید */
.cart-item {
  display: flex;
  align-items: center;
  border-bottom: 2px solid #CCCCCC;
  padding: 15px 0;
  flex-direction: row-reverse; /* راست به چپ */
  
}

.cart-item img {
  width: 125px;
  height: auto;
  margin-right: 20px; /* به جای margin-left */
  border-radius: 12px;
  border: 2px solid #CCCCCC;
  padding: 15px;
}

.item-details {
  flex: 1;
  text-align: right;
  
}

.item-details h3 {
  margin: 0 0 5px;
  color: #c94f7c;
  font-weight: bold;
}

.item-details p {
  margin: 5px 0;
  font-weight: bold;
}

/* دکمه حذف */
.remove-btn {
  background-color: #d00000;
  color: white;
  border: none;
  padding: 6px 12px;
  border-radius: 8px;
  cursor: pointer;
  font-weight: bold;
  margin-top: 15px;
}

.remove-btn:hover {
  background-color: #d00000;
}

/* جمع کل و دکمه‌ها */
.cart-total {
  margin-top: 20px;
  text-align: center;
}

.cart-actions {
  margin-top: 15px;
}

.cart-actions button {
  padding: 10px 20px;
  border: none;
  border-radius: 10px;
  margin: 5px;
  font-size: 16px;
  cursor: pointer;
}



.checkout-btn {
  background-color: #FC95C4;
  color: #1e1e1e;
  font-weight: bold;
}

.checkout-btn:hover {
  background-color: #1e1e1e;
  color: white;
}

</style>
<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>سبد خرید بستنی</title>
  <link rel="stylesheet" href="css/shopping-card-style.css">
</head>
<body>
  <div class="container">
    <h1>🍦 سبد خرید شما</h1>

    <div class="cart-item">
      <img src="images/img-4.png" alt="بستنی شکلاتی">
      <div class="item-details">
        <h3>بستنی شکلاتی</h3>
        <p>قیمت: 30,000 تومان</p>
        <p>تعداد: 2</p>
        <p>مجموع: 60,000 تومان</p>
        <button class="remove-btn">حذف</button>
      </div>
    </div>

    <div class="cart-item">
      <img src="images/img-3.png" alt="بستنی وانیلی">
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
        
        <button class="checkout-btn">نهایی کردن سفارش</button>
      </div>
    </div>
  </div>
</body>
</html>
