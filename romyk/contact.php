<?php
include("header.php");
<<<<<<< HEAD



=======
?>
<?php
//session_start();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
>>>>>>> d3c8cc9 (contact1)
// اتصال به پایگاه داده
$conn = mysqli_connect("localhost", "root", "", "project_db");
if (!$conn) {
    die("خطا در اتصال به پایگاه داده: " . mysqli_connect_error());
}

// متغیرهای پیش‌فرض
$username = '';
$email = '';
$message_status = '';
$phone  = '';
$user_id = $_SESSION['user_id'] ?? null;

// اگر کاربر وارد شده باشد
if ($user_id) {
    $sql = "SELECT username, email , phone FROM users WHERE user_id = $user_id";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
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
        $message_status = "برای ارسال پیام باید وارد شوید.";
    } else {
        $message = mysqli_real_escape_string($conn, $message);
        $insert = "INSERT INTO contacts (user_id, message) VALUES ($user_id, '$message')";
        if (mysqli_query($conn, $insert)) {
            $message_status = "پیام شما با موفقیت ثبت شد.";
        } else {
            $message_status = "خطا در ذخیره پیام: " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="fa" >
<head>

      <!-- header section end -->
      <!-- contact section start -->
      <div class="contact_section layout_padding">
         <div class="container"  >
            <div class="row">
               <div class="col-md-4">
                  <label dir="rtl" style="margin-left:230px; color: white;" >وضعیت ارسال پیام:</label>
           <?php if (!empty($message_status)): ?>
                    <div style="text-align:right
                    ;background-color:rgb(240, 110, 153); color: white;border: none;margin-bottom: 50px;" class="btn btn-pink  btn-block"><?= htmlspecialchars($message_status) ?></div>
                   <?php endif; ?>
                  <div class="contact_main text-center"  >
                     <h1 class="contact_taital" style="margin-left:70px;">تماس با ما</h1>
                    
                
  
                     <form  method="POST" >
                        <div class="form-group " >
                           <input  style="text-align:right" type="text" class="email-bt" placeholder=" نام کاربری" name="Name"  value="<?= htmlspecialchars($username) ?>" readonly>
                        </div>
                       

                        <div class="form-group">
                           <input style="text-align:right" type="text" class="email-bt"   placeholder="آدرس ایمیل" name="Name"value="<?= htmlspecialchars($email) ?>" readonly>
                        </div>
                        <div class="form-group" >
                           <input style="text-align:right" type="text" class="email-bt" placeholder=" شماره تماس" name="Name" value="<?= htmlspecialchars($phone) ?>" readonly>
                        </div>
                         <div class="form-group">
            
            <textarea name="message" class="form-control"  style="text-align:right"rows="5" required placeholder="پیام خود را بنویسید."></textarea>
        </div>

                        <div class="form-group">
                        <button type="submit" class="btn btn-pink  btn-block"  style="margin-left: 10px;background-color:rgb(240, 110, 153); color: white; border: none;">ارسال پیام</button></div>
                     </form>
                     
                  </div>
               </div>
               <div class="col-md-8">
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

