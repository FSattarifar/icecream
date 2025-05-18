<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Signup Form</title>
    <link rel="stylesheet" href="css/style_login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <!--ورود-->
    <div class="container">
        <div class="form-box login">
            <form action="action_login.php" method="post" onsubmit="return false;">
                <h1>ورود</h1>
                <div class="input-box">
                    <input type="text" id="username" name="username" placeholder="نام کامل" required>
                    <i class='bx bxs-user'></i>
                    <div id="username-error" class="error" style="color: red; font-size: small;"></div>
                </div>
                <div class="input-box">
                    <input type="password" id="password" name="password" placeholder="رمز" required>
                    <i class='bx bxs-lock-alt'></i>
                    <div id="password-error" class="error" style="color: red; font-size: small;"></div>
                </div>

                <!-- بخش کپچا -->
                <div class="input-box">
                    <input type="text" id="captcha-input" placeholder="کد کپچا" required>
                    <i class='bx bxs-shield'></i>
                    <div id="captcha-error" class="error" style="color: red; font-size: small;"></div>
                </div>
                <div id="captcha" class="captcha-box" onclick="refreshCaptcha()">CAPTCHA</div>
                </br>
                <button type="button" class="btn" onclick="validateCaptcha()">ورود</button>
                </br>
                </br>
            </form>
        </div>



        <!--ثبت نام-->
        <div class="form-box register">
            <form action="action_register.php" method="post" name="register1" onsubmit="return false;">

                <h1>عضویت</h1>
                <div class="input-box">
                    <input type="text" placeholder="نام کامل" id="usernamer" name="usernamer" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="email" placeholder="ایمیل" id="emailr" name="emailr" required>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box">
                    <input type="phone" placeholder="شماره تماس" id="phoner" name="phoner" required>
                    <i class='bx bxs-phone'></i>
                </div>
                <style>
                    #passwordr.weak {
                        border: 2px solid red;
                    }

                    #passwordr.medium {
                        border: 2px solid orange;
                    }

                    #passwordr.strong {
                        border: 2px solid green;
                    }
                </style>




                <div class="input-box">
                    <input type="password" placeholder="رمز" id="passwordr" name="passwordr" required
                        onkeyup="checkPasswordStrength()">
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div id="response-message" style="color: red; text-align: center;"></div>
                <button type="button" class="btn" onclick="submitRegister()">عضویت</button>
            </form>
        </div>

        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>بستنی فروشی</h1>
                <p>ایجاد حساب کاربری</p>
                <button type="submit" class="btn register-btn">عضویت</button>
            </div>

            <div class="toggle-panel toggle-right">
                <h1>بستنی فروشی</h1>
                <p>ورود به حساب کاربری</p>
                <button class="btn login-btn">ورود</button>
            </div>
        </div>
    </div>
    <script src="./js/script_login&register.js"></script>

    <script>
        // تولید کد کپچا
        function generateCaptcha() {
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            let captcha = '';
            for (let i = 0; i < 6; i++) {
                captcha += characters.charAt(Math.floor(Math.random() * characters.length));
            }
            return captcha;
        }

        // مقداردهی اولیه کپچا
        let captchaText = generateCaptcha();
        document.getElementById('captcha').innerText = captchaText;

        // به‌روزرسانی کپچا هنگام کلیک
        function refreshCaptcha() {
            captchaText = generateCaptcha();
            document.getElementById('captcha').innerText = captchaText;
        }

        // بررسی کپچا
        function validateCaptcha() {
            const userInput = document.getElementById('captcha-input').value;
            const captchaText = document.getElementById('captcha').innerText;
            const username = document.getElementById("username").value;
            const password = document.getElementById("password").value;
            const usernameError = document.getElementById("username-error");
            const passwordError = document.getElementById("password-error");
            const generalError = document.getElementById("captcha-error");
            let isValid = true;

            // بررسی خالی بودن فیلدها
            if (username === "") {
                usernameError.textContent = "نام کاربری نمی‌تواند خالی باشد.";
                isValid = false;
            } else {
                usernameError.textContent = "";
            }

            if (password === "") {
                passwordError.textContent = "رمز عبور نمی‌تواند خالی باشد.";
                isValid = false;
            } else {
                passwordError.textContent = "";
            }

            if (userInput !== captchaText) {
                generalError.textContent = "کپچا اشتباه است، لطفاً دوباره تلاش کنید.";
                isValid = false;
            } else {
                generalError.textContent = "";
            }

            if (isValid) {
                // ارسال اطلاعات به سرور با AJAX
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "action_login.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        if (xhr.responseText === "admin") {
                            // هدایت به صفحه ادمین
                            window.location.replace("admin_index.php");
                        } else if (xhr.responseText === "user") {
                            // هدایت به صفحه اصلی کاربران
                            window.location.replace("index.php");
                        } else {
                            // نمایش پیام خطا در صورت عدم موفقیت
                            generalError.textContent = "نام کاربری یا کلمه عبور اشتباه است.";
                        }
                    }
                };
                xhr.send(`username=${username}&password=${password}`);
            }
        }

        //ثبت نام
        function submitRegister() {
            const username = document.getElementById("usernamer").value;
            const email = document.getElementById("emailr").value;
            const password = document.getElementById("passwordr").value;
            const phone = document.getElementById("phoner").value; // اضافه کردن شماره تلفن
            const responseMessage = document.getElementById("response-message");

            // بررسی پر بودن فیلدها در سمت کلاینت
            if (username === "" || email === "" || password === "" || phone === "") {
                responseMessage.style.color = "red";
                responseMessage.textContent = "لطفاً تمامی فیلدها را پر کنید.";
                return;
            }

            // بررسی صحت شماره تلفن
            const phoneRegex = /^09[0-9]{9}$/;
            if (!phoneRegex.test(phone)) {
                responseMessage.style.color = "red";
                responseMessage.textContent = "شماره تلفن نامعتبر است. شماره باید با '09' شروع شده و 11 رقم باشد.";
                return;
            }
            // بررسی قدرت رمز عبور
            const hasUpperCase = /[A-Z]/.test(password);
            const hasLowerCase = /[a-z]/.test(password);
            const hasNumber = /\d/.test(password);
            const hasSpecialChar = /[!@#$%^&*(),.?":{}|<>]/.test(password);

            // بررسی صحت ایمیل
            const emailRegex = /^[^\s@]+@gmail\.com$/;
            if (!emailRegex.test(email)) {
                responseMessage.style.color = "red";
                responseMessage.textContent = "لطفاً یک ایمیل معتبر از Gmail وارد کنید (example@gmail.com).";
                return;
            }


            if (password.length < 6 || !hasUpperCase || !hasLowerCase || !hasNumber || !hasSpecialChar) {
                responseMessage.style.color = "red";
                responseMessage.textContent = "رمز عبور باید حداقل ۶ کاراکتر، شامل حروف بزرگ، کوچک، عدد و کاراکتر خاص باشد.";
                return;
            }

            // ارسال اطلاعات به سرور با استفاده از AJAX
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "action_register.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // پردازش پاسخ سرور
                    if (xhr.responseText === "success") {
                        responseMessage.style.color = "green";
                        responseMessage.textContent = "ثبت‌نام با موفقیت انجام شد.";
                    } else {
                        responseMessage.style.color = "red";
                        responseMessage.textContent = xhr.responseText;
                    }
                }
            };
            xhr.send(`usernamer=${username}&emailr=${email}&passwordr=${password}&phoner=${phone}`);
        }





        function checkPasswordStrength() {
            var password = document.getElementById("passwordr").value;
            var inputField = document.getElementById("passwordr");

            // حذف کلاس‌های قبلی
            inputField.classList.remove("weak", "medium", "strong");

            // تعریف شرط‌های بررسی قدرت رمز
            var hasUpperCase = /[A-Z]/.test(password);  // شامل حروف بزرگ
            var hasLowerCase = /[a-z]/.test(password);  // شامل حروف کوچک
            var hasNumber = /\d/.test(password);        // شامل عدد
            var hasSpecialChar = /[!@#$%^&*(),.?":{}|<>]/.test(password); // شامل کاراکتر خاص

            // بررسی قدرت رمز
            if (password.length < 6 || !hasUpperCase || !hasLowerCase || !hasNumber || !hasSpecialChar) {
                inputField.classList.add("weak");  // رمز ضعیف
            } else if (password.length >= 6 && hasUpperCase && hasLowerCase && hasNumber && hasSpecialChar) {
                inputField.classList.add("strong");  // رمز قوی
            } else {
                inputField.classList.add("medium");  // رمز متوسط
            }
        }


    </script>



</body>

</html>