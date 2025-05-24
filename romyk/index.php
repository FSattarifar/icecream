<?php
session_start();
include("db.php");

// دریافت اطلاعات محصولات
$sql = "SELECT product_id, pname, description FROM products";
$result = mysqli_query($link, $sql);

// دریافت اطلاعات دسته‌بندی‌ها با `MySQLi`
$sql2 = "SELECT * FROM categories";
$result2 = mysqli_query($link, $sql2);

if ($result2) {
    $categories = mysqli_fetch_all($result2, MYSQLI_ASSOC);
} else {
    $categories = []; // اگر کوئری ناموفق باشد، آرایه خالی برای جلوگیری از خطای foreach
}
?>
<!DOCTYPE html>
<html>

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Romyk</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- font css -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="css/font.css">


    <link rel="stylesheet" type="text/css" href="css/visited.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vazirmatn@33.0.3/Vazirmatn-font-face.css" rel="stylesheet">
    <style>
.nav-item {
    position: relative;
}

.submenu {
    display: none; /* مخفی کردن زیرمنو به طور پیش‌فرض */
    position: absolute;
    top: 100%;
    left: 0;
    background: white;
    list-style: none;
    padding: 0;
    margin: 0;
    width: 200px;
    border: 1px solid #ddd;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
}

.submenu li {
    padding: 10px;
}

.submenu li a {
    text-decoration: none;
    color: black;
    display: block;
    padding: 10px;
}

.nav-item:hover .submenu {
    display: block; /* نمایش زیرمنو هنگام هاور روی گزینه اصلی */
}
                        </style>
</head>

<body>
    <div class="header_section">
        <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="index.php"><img src="images/logo.png"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">ارتباط با ما</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">درباره ما</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="blog.php">اخبار</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="services.php">سرویس ها</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="icecream.php">بستنی</a>
                            <ul class="submenu">
                                <?php foreach ($categories as $cat): ?>
                                    <li>
                                        <a href="category.php?id=<?php echo $cat['category_id']; ?>">
                                            <?php echo htmlspecialchars($cat['category_name']); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
    
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">خانه</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <div class="login_bt">
                            <a href="login&register.php"><i class="fa fa-user" aria-hidden="true"></i></a>
                            <a href="shopping-card.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                        </div>
                    </form>
            </nav>
        </div>
        <!-- banner section start -->
        <div class="banner_section layout_padding">
            <div class="container">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php
                        $i = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<li data-target="#carouselExampleIndicators" data-slide-to="' . $i . '" ' . ($i === 0 ? 'class="active"' : '') . '>' . ($i + 1) . '</li>';
                            $i++;
                        }
                        ?>
                    </ol>



                    <div class="carousel-inner">
                        <?php
                        $i = 0;
                        mysqli_data_seek($result, 0);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h1 class="banner_taital"><?php echo htmlspecialchars($row['pname']); ?></h1>
                                        <p class="banner_text"><?php echo htmlspecialchars($row['description']); ?></p>
                                        <div class="started_text"><a href="#">خرید</a></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="banner_img"><img src="images/banner-img.png"></div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $i++;
                        }
                        ?>
                    </div>
                </div>
                <!-- banner section end -->
            </div>
            <br><br><br><br><br><br><br>
            <br>
            <!-- header section end -->
            <!-- about sectuion start -->
            <div class="about_section layout_padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="about_img"><img src="images/about-img.png"></div>
                        </div>
                        <div class="col-md-6" style="direction: rtl; text-align: right;">
                            <h1 class="about_taital">درباره ما</h1>
                            <p class="about_text" style="direction: rtl; text-align: right;">
                                یک گروه 7 نفره برای واحد توسعه نرم افزار تشکیل شد تا بر روی سایت بستنی فروشی کار کنیم.
                                اعضای گروه : <br>
                                صفحه ثبت نام و ورود :فاطمه ستاری فروشی<br>
                                اخبار : ریحانه غاضی<br>
                                محصولات :فاطمه دینکانی<br>
                                پایگاه داده : هانیه هندی<br>
                                طراحی سبد خرید : آیدا حیدری<br>
                                فرانت سبد خرید : مینا طاهری <br>
                                هدر : نازنین تیموری<br>
                                ارتباط با ما :فائزه معتمدی
                            </p>
                            <div class="read_bt_1" style="direction: rtl; text-align: right;">
                                <a href="#">اطلاعات بیشتر</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- about sectuion end -->
            <!-- cream sectuion start -->
            <?php
            include("db.php");
            $category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : 0;

            $link = mysqli_connect("localhost", "root", "", "project_db");

            if (!$link) {
                die("خطا در اتصال به پایگاه داده: " . mysqli_connect_error());
            }

            mysqli_query($link, "SET NAMES utf8");

            if ($category_id > 0) {
                $stmt = mysqli_prepare($link, "SELECT DISTINCT * FROM products WHERE category_id = ?");
                mysqli_stmt_bind_param($stmt, "i", $category_id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
            } else {
                $result = mysqli_query($link, "SELECT DISTINCT * FROM products");
            }

            $products = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $products[] = $row;
            }

            ?>

            <!-- استایل‌ها -->
            <style>
                .section-title-wrapper {
                    text-align: right;
                    margin-bottom: 30px;
                }

                .section-title h1 {
                    font-size: 28px;
                    font-weight: bold;
                    margin: 0;
                    position: relative;
                    display: inline-block;
                    padding-bottom: 10px;
                }

                .section-title h1::after {
                    content: "";
                    position: absolute;
                    bottom: 0;
                    right: 0;
                    width: 160px;
                    /* عرض خط صورتی */
                    height: 4px;
                    background-color: pink;
                    border-radius: 2px;
                }

                .cream_subtext {
                    text-align: right;
                    margin-top: 12px;
                    font-size: 16px;
                    color: #555;
                    padding-right: 2px;
                }

                .cream_img img {
                    width: 100%;
                    height: 250px;
                    object-fit: contain;
                    background-color: #f9f9f9;
                    border-radius: 6px;
                }

                .cream_box {
                    border: 1px solid #ddd;
                    padding: 10px;
                    margin-bottom: 20px;
                    border-radius: 10px;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                    height: 100%;
                }

                .cream_section .row {
                    margin-bottom: 20px;
                }
            </style>

            <!-- نمایش محصولات -->
            <div class="cream_section layout_padding" dir="rtl">
                <div class="container">
                    <!-- تیتر بخش -->
                    <div class="section-title-wrapper">
                        <div class="section-title">
                            <h1>محصولات ما</h1>
                        </div>
                        <p class="cream_subtext">نمایش محصولات دسته‌بندی شده</p>
                    </div>

                    <!-- لیست محصولات -->
                    <div class="cream_section_2">
                        <?php
                        $counter = 0;
                        foreach ($products as $row) {
                            if ($counter % 3 == 0) {
                                echo '<div class="row mb-4">';
                            }
                            ?>
                            <div class="col-md-4">
                                <div class="cream_box">
                                    <div class="cream_img">
                                        <img src="images/<?php echo htmlspecialchars($row['image']); ?>"
                                            alt="<?php echo htmlspecialchars($row['pname']); ?>">
                                    </div>
                                    <div class="price_text mt-2" style="font-size: 14px; color: #333;">
                                        <?php echo number_format($row['price']); ?> تومان
                                    </div>
                                    <h6 class="strawberry_text"><?php echo htmlspecialchars($row['pname']); ?></h6>
                                    <div class="description"
                                        style="flex-grow: 1; display: flex; align-items: center; justify-content: center; text-align: center;">
                                        <p class="cream_text"><?php echo htmlspecialchars($row['description']); ?></p>
                                    </div>
                                    <div class="cart_bt"><a href="#">افزودن به سبد</a></div>
                                </div>
                            </div>
                            <?php
                            $counter++;
                            if ($counter % 3 == 0) {
                                echo '</div>';
                            }
                        }
                        if ($counter % 3 != 0) {
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!-- cream sectuion end -->
            <!-- services section start -->















            <div class="services_section layout_padding">
                <div class="container">
                    <h1 class="title1" style="text-align: center;">آمار سایت ما</h1>
                    <hr>
                    <br>
                    <br>
                    <div class="stats1">
                        <div class="stat-item1">
                            <svg class="stat-icon1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 2c3.31 0 6 2.69 6 6s-2.69 6-6 6-6-2.69-6-6 2.69-6 6-6zm0 14.5c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5z" />
                            </svg>
                            <span class="stat-number1" data-target="1500">0</span>
                            <div class="stat-label1">کاربر فعال</div>
                        </div>
                        <div class="stat-item1">
                            <svg class="stat-icon1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4 14H8v-2h8v2zm0-4H8v-2h8v2zm0-4H8V6h8v2z" />
                            </svg>
                            <span class="stat-number1" data-target="3200">0</span>
                            <div class="stat-label1">بازدید روزانه</div>
                        </div>
                        <div class="stat-item1">
                            <svg class="stat-icon1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                            </svg>
                            <span class="stat-number1" data-target="500">0</span>
                            <div class="stat-label1">پروژه موفق</div>
                        </div>
                    </div>
                </div>
            </div>










            <script>
                const counters = document.querySelectorAll('.stat-number1');

                document.addEventListener('DOMContentLoaded', () => {
                    setTimeout(() => {
                        counters.forEach(counter => {
                            const target = +counter.getAttribute('data-target');
                            let count = 0;
                            const duration = 3000; // مدت زمان انیمیشن (3 ثانیه)
                            const increment = target / (duration / 50); // افزایش در هر فریم (هر 50 میلی‌ثانیه)

                            const updateCounter = () => {
                                if (count < target) {
                                    count += increment;
                                    if (count > target) count = target;
                                    counter.innerText = Math.floor(count).toLocaleString('fa-IR');
                                    counter.classList.add('counting');
                                    setTimeout(updateCounter, 50);
                                } else {
                                    counter.innerText = target.toLocaleString('fa-IR');
                                }
                            };
                            updateCounter();
                        });
                    }, 100);
                });
            </script>
            <!-- services section end -->
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
                                                            <h1 style="text-align: right; font-size: 40px;"><?= $row['title'] ?>
                                                            </h1>
                                                            <p class="testimonial_text" style="font-size: 20px;">
                                                                <?= $row['content'] ?>
                                                            </p>
                                                            <h4 class="client_name" style="text-align: left; ">
                                                                <?= $row['date'] ?> : تاریخ اعلام خبر
                                                            </h4>
                                                            <div class="client_img"><img src="images/<?= $row['image'] ?>"
                                                                    width="200" height="100"></div>
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
                                        </div>
                                        <a class="carousel-control-prev" href="#main_slider" role="button"
                                            data-slide="prev">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                        <a class="carousel-control-next" href="#main_slider" role="button"
                                            data-slide="next">
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
            <!-- contact section start -->
            <div class="contact_section layout_padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="contact_main">
                                <h1 class="contact_taital">Contact Us</h1>
                                <form action="/action_page.php">
                                    <div class="form-group">
                                        <input type="text" class="email-bt" placeholder="Name" name="Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="email-bt" placeholder="Email" name="Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="email-bt" placeholder="Phone Numbar" name="Email">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment"
                                            name="Massage"></textarea>
                                    </div>
                                </form>
                                <div class="main_bt"><a href="#">SEND</a></div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="location_text">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <span class="padding_left_10 active"><i class="fa fa-map-marker"
                                                    aria-hidden="true"></i></span>Making this the first true</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="padding_left_10"><i class="fa fa-phone"
                                                    aria-hidden="true"></i></span>Call : +01 1234567890
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="padding_left_10"><i class="fa fa-envelope"
                                                    aria-hidden="true"></i></span>Email : demo@gmail.com
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mail_main">
                                <h3 class="newsletter_text">Newsletter</h3>
                                <div class="form-group">
                                    <textarea class="update_mail" placeholder="Enter Your Email" rows="5" id="comment"
                                        name="Enter Your Email"></textarea>
                                    <div class="subscribe_bt"><a href="#">Subscribe</a></div>
                                </div>
                            </div>
                            <div class="footer_social_icon">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
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
                    <p class="copyright_text">2020 All Rights Reserved. Design by <a href="https://html.design">Free
                            Html
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