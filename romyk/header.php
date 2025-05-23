<?php
include 'db.php';
try {
    $stmt = $pdo->query("SELECT * FROM categories");
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $categories = []; // اگه خطا داد، یه آرایه خالی بده که foreach خطا نده
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
    <title>Icecream</title>
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
</head>

<body>
    <div class="header_section header_bg">
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
               </div>
            </nav>
         </div>
      </div>
</body>


