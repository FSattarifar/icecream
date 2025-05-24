<?php
include("header.php");
?>
<?php
session_start();

// اتصال به پایگاه داده
try {
    $pdo = new PDO("mysql:host=localhost;dbname=project_db;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("خطا در اتصال: " . $e->getMessage());
}

// متغیرهای پیش‌فرض
$username = '';
$email = '';
$phone = '';
$message_status = '';

// اگر کاربر وارد شده باشد
$user_id = $_SESSION['user_id'] ?? null;

if ($user_id) {
    $stmt = $pdo->prepare("SELECT username, email ,phone FROM users WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $username = $user['username'];
        $email = $user['email'];
        $phone = $user['phone'];
    }
}

// اگر فرم ارسال شده باشد
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = trim($_POST['message'] ?? '');

    if (empty($message)) {
        $message_status = "پیام نمی‌تواند خالی باشد.";
    } elseif (!$user_id) {
        $message_status = "برای ارسال پیام باید وارد حساب شوید.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO contact (user_id, message) VALUES (?, ?)");
        $stmt->execute([$user_id, $message]);
        $message_status = "پیام شما با موفقیت ثبت شد.";
    }
}
?>

      <!-- header section end -->
      <!-- contact section start -->
      <div class="contact_section layout_padding">
         <div class="container"  >
            <div class="row">
               <div class="col-md-4">
                  
          
                  <div class="contact_main text-center"  >
                     <h1 class="contact_taital" style="margin-left:70px;">تماس با ما</h1>
                    
    <?php if (!empty($message_status)): ?>
        <div class="alert alert-info"><?= htmlspecialchars($message_status) ?></div>
    <?php endif; ?>
                     <form action="/action_page.php">
                        <div class="form-group " method="POST" >
                           <input  style="text-align:right" type="text" class="email-bt" placeholder=" نام کاربری" name="Name"  value="<?= htmlspecialchars($username) ?>" readonly>
                        </div>
                       

                        <div class="form-group">
                           <input style="text-align:right" type="text" class="email-bt"   placeholder="آدرس ایمیل" name="Name"value="<?= htmlspecialchars($email) ?>" readonly>
                        </div>
                        <div class="form-group" >
                           <input style="text-align:right" type="text" class="email-bt" placeholder=" شماره تماس" name="Name" value="<?= htmlspecialchars($phone) ?>" readonly>
                        </div>
                        <div class="form-group">
                           <textarea  style="text-align:right" class="massage-bt" placeholder="نظر شما" rows="5" id="comment" name="Massage"></textarea>
                        </div>
                     </form>
                     <button type="submit" class="btn btn-pink  btn-block"  style="margin-left: 10px;background-color:rgb(240, 110, 153); color: white; border: none;">ارسال پیام</button>
                  </div>
               </div>
               <div class="col-md-8" ">
                  <div class="location_text" >

                    <ul style="list-style: none; padding: 0; direction: rtl; text-align: right; text-align:center ;margin:0px; ">
  <li style="margin-bottom: 15px;">
    <a href="#" style="display: inline-flex; align-items: center;">
      <i class="fa fa-map-marker" style="margin-left: 10px; font-size: 35px;color:#dc3545;"></i>
      آدرس: شیراز پشت ارگ کریم‌خانی
    </a>
  </li>
  <br>
  <li style="margin-bottom: 15px;">
    <a href="#" style="display: inline-flex; align-items: center;">
      <i class="fa fa-phone" style="margin-left: 10px; font-size: 35px;color:#00fbff;"></i>
      تلفن تماس: 071-3262-8787
    </a>
  </li>
  <br>
  <li>
    <a href="#" style="display: inline-flex; align-items: center;">
      <i class="fa fa-envelope" style="margin-left: 10px; font-size: 35px;color:#ffffff;"></i>
      ایمیل: targoli18@gmail.com
    </a>
  </li>
</ul>
                  </div>
                  
                  <div class="mail_main" >
                    
                     <div class="form-group"  style="text-align:center ;margin-top: 30px;margin-bottom: 90px;">
                        <textarea class="update_mail" placeholder="لطفا ایمیل خود را وارد کنید" rows="5" id="comment" name="Enter Your Email" style="text-align:center"></textarea>
                        <div class="subscribe_bt"  ><a href="#" style="background-color:rgb(240, 110, 153);">عضو شدن</a></div>
                     </div>
                  </div>
                 <br>
                  <div class="footer_social_icon" style="text-align:center ;margin-right: 180px;margin-bottom: -60px;margin-top: 80px;">
  <ul style="display: inline-block; padding: 0; margin: 0;">
    <li style="display: inline-block; margin: 0 5px;">
      <a href="https://www.facebook.com/?locale=fa_IR"><i class="fa fa-facebook" ></i></a>
    </li>
    <li style="display: inline-block; margin: 0 5px;">
      <a href="http://localhost:8080/icecream/romyk/contact.php"><i class="fa fa-twitter" "></i></a>
    </li>
    <li style="display: inline-block; margin: 0 5px;">
      <a href="#http://localhost:8080/icecream/romyk/index.php"><i class="fa fa-linkedin"></i></a>
    </li>
    <li style="display: inline-block; margin: 0 5px;">
      <a  href="https://www.instagram.com/i.golfam?igsh=MWo2b3AzajQ0dzY1dg=="><i class="fa fa-instagram" "></i></a>
    </li>
  </ul>
</div>
               </div>
            </div>
         </div>
      </div>
      <!-- contact section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">تمامی حقوق این وب سایت برای بستنی فروشی  محفوظ می‌باشد <a href="https://html.design"></a></p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
    
   </body>
</html>

