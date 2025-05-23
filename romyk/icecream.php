<?php
include("header.php");
?>
<?php
require_once 'db.php';

if (isset($_GET['cat'])) {
    $cat_id = intval($_GET['cat']);
    $stmt = $pdo->prepare("SELECT * FROM products WHERE category_id = ?");
    $stmt->execute([$cat_id]);
    $products = $stmt->fetchAll();
} else {
    $stmt = $pdo->query("SELECT * FROM products");
    $products = $stmt->fetchAll();
}

// حالا $products رو نمایش بده
    <!-- header section end -->
    <!-- cream sectuion start -->
    <div class="cream_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="cream_taital">Our Featured Ice Cream</h1>
                    <p class="cream_text">tempor incididunt ut labore et dolore magna aliqua</p>
                </div>
            </div>
            <div class="cream_section_2">
                <div class="row">
                    <div class="col-md-4">
                        <div class="cream_box">
                            <div class="cream_img"><img src="images/img-1.png"></div>
                            <div class="price_text">$10</div>
                            <h6 class="strawberry_text">Strawberry Ice Cream</h6>
                            <div class="cart_bt"><a href="#">Add To Cart</a></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="cream_box">
                            <div class="cream_img"><img src="images/img-2.png"></div>
                            <div class="price_text">$10</div>
                            <h6 class="strawberry_text">Strawberry Ice Cream</h6>
                            <div class="cart_bt"><a href="#">Add To Cart</a></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="cream_box">
                            <div class="cream_img"><img src="images/img-1.png"></div>
                            <div class="price_text">$10</div>
                            <h6 class="strawberry_text">Strawberry Ice Cream</h6>
                            <div class="cart_bt"><a href="#">Add To Cart</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cream_section_2">
                <div class="row">
                    <div class="col-md-4">
                        <div class="cream_box">
                            <div class="cream_img"><img src="images/img-3.png"></div>
                            <div class="price_text">$10</div>
                            <h6 class="strawberry_text">Strawberry Ice Cream</h6>
                            <div class="cart_bt"><a href="#">Add To Cart</a></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="cream_box">
                            <div class="cream_img"><img src="images/img-4.png"></div>
                            <div class="price_text">$10</div>
                            <h6 class="strawberry_text">Strawberry Ice Cream</h6>
                            <div class="cart_bt"><a href="#">Add To Cart</a></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="cream_box">
                            <div class="cream_img"><img src="images/img-5.png"></div>
                            <div class="price_text">$10</div>
                            <h6 class="strawberry_text">Strawberry Ice Cream</h6>
                            <div class="cart_bt"><a href="#">Add To Cart</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="seemore_bt"><a href="#">See More</a></div>
        </div>
    </div>
    <!-- cream sectuion end -->
    <!-- copyright section start -->
    <div class="copyright_section margin_top90">
        <div class="container">
            <p class="copyright_text">2020 All Rights Reserved. Design by <a href="https://html.design">Free Html
                    Templates</a></p>
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