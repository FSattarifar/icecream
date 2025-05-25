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
                                // دریافت تمام اخبار از پایگاه داده به ترتیب news_id
                                $sql = "SELECT title, date, content, image FROM news ORDER BY news_id";
                                $result = mysqli_query($link, $sql);
                                
                                if ($result && mysqli_num_rows($result) > 0) {
                                    $first = true; // برای تعیین active بودن اولین اسلاید
                                    
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <div class="carousel-item <?php echo $first ? 'active' : ''; ?>">
                                            <h1 style="text-align: right; font-size: 40px;"><?= htmlspecialchars($row['title']) ?></h1>
                                            <p class="testimonial_text" style="font-size: 20px;">
                                                <?= nl2br(htmlspecialchars($row['content'])) ?>
                                            </p>
                                            <h4 class="client_name" style="text-align: left;">
                                                تاریخ اعلام خبر: <?= htmlspecialchars($row['date']) ?>
                                            </h4>
                                            <div class="client_img">
                                                <img src="images/<?= htmlspecialchars($row['image']) ?>" width="200" height="100" alt="<?= htmlspecialchars($row['title']) ?>">
                                            </div>
                                        </div>
                                        <?php
                                        $first = false;
                                    }
                                } else {
                                    echo '<div class="carousel-item active">
                                            <p class="testimonial_text" style="font-size: 20px; text-align: center;">
                                                خبری برای نمایش وجود ندارد.
                                            </p>
                                          </div>';
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

<!-- Javascript files-->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<script src="js/plugin.js"></script>
<!-- sidebar -->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>