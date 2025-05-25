<?php
include("header.php");
include("db.php");
?>
      <!-- header section end -->
      <!-- testimonial section start -->
    



    <div class="testimonial_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="testimonial_taital">اخبار</h1>
                </div>
            </div>
            <div class="testimonial_section_2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="testimonial_box">
                            <div id="main_slider" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">


<?php
 // اتصال به پایگاه داده
   
$sql2 = "SELECT title,date , content, image FROM news WHERE news_id = 1";
$result2 = mysqli_query($link, $sql2);

if ($result2) {
    // اگر رکوردی وجود داشته باشه
    if (mysqli_num_rows($result2) > 0) {
        while ($row = mysqli_fetch_assoc($result2)) {
          
      
?>
                                    <div class="carousel-item active">
                                       <h1 style="text-align: right; font-size: 40px;" ><?=  $row['title']  ?></h1>
                                       
                                        <p class="testimonial_text" style="font-size: 20px;"> 
                                      <?=      $row['content']  ?>
                                        </p>
                                        <h4 class="client_name" style="text-align: left; "> <?=     $row['date']  ?> : تاریخ اعلام خبر       </h4>
                                        <div class="client_img"><img src="images/<?=      $row['image']  ?>"  width="200" height="100"></div>
                                    </div>

<?php
  }
    } else {
        echo "هیچ رکوردی پیدا نشد.";
    }
} else {
    echo "خطا در اجرای کوئری: " . mysqli_error($link);
}
?>
                                      

<br>

                                      <?php
 // اتصال به پایگاه داده
   
$sql3 = "SELECT title,date , content, image FROM news WHERE news_id = 2";
$result3= mysqli_query($link, $sql3);

if ($result3) {
    // اگر رکوردی وجود داشته باشه
    if (mysqli_num_rows($result3) > 0) {
        while ($row2 = mysqli_fetch_assoc($result3)) {
          
      
?>
                                       <div class="carousel-item">
                                       <h1 style="text-align: right; font-size: 40px;" ><?=  $row2['title']  ?></h1>
                                       
                                        <p class="testimonial_text" style="font-size: 20px;"> 
                                      <?=      $row2['content']  ?>
                                        </p>
                                        <h4 class="client_name" style="text-align: left; "> <?=     $row2['date']  ?> : تاریخ اعلام خبر       </h4>
                                        <div class="client_img"><img src="images/<?=      $row2['image']  ?>"  width="130" height="100"></div>
                                    </div>
<?php
  }
    } else {
        echo "هیچ رکوردی پیدا نشد.";
    }
} else {
    echo "خطا در اجرای کوئری: " . mysqli_error($link);
}
?>


<br>

                                                                 <?php
 // اتصال به پایگاه داده
   
$sql4 = "SELECT title,date , content, image FROM news WHERE news_id = 3";
$result4 = mysqli_query($link, $sql4);

if ($result4) {
    // اگر رکوردی وجود داشته باشه
    if (mysqli_num_rows($result4) > 0) {
        while ($row4 = mysqli_fetch_assoc($result4)) {
          
      
?> 
                                   
    <div class="carousel-item">
                                       <h1 style="text-align: right; font-size: 40px;" ><?=  $row4['title']  ?></h1>
                                       
                                        <p class="testimonial_text" style="font-size: 20px;"> 
                                      <?=      $row4['content']  ?>
                                        </p>
                                        <h4 class="client_name" style="text-align: left; "> <?=     $row4['date']  ?> : تاریخ اعلام خبر       </h4>
                                        <div class="client_img"><img src="images/<?=      $row4['image']  ?>"  width="200" height="100"></div>
                                    </div>


<?php
  }
    } else {
        echo "هیچ رکوردی پیدا نشد.";
    }
} else {
    echo "خطا در اجرای کوئری: " . mysqli_error($link);
}
?>








                                </div>
                                <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


      <!-- testimonial section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">2020 All Rights Reserved. Design by <a href="https://html.design">Free Html Templates</a></p>
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
