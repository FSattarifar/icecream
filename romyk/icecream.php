<?php
include("header.php");
include("db.php");

$category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : 0;

if ($category_id > 0) {
    $stmt = $pdo->prepare("SELECT DISTINCT * FROM products WHERE category_id = :category_id");
    $stmt->execute(['category_id' => $category_id]);
} else {
    $stmt = $pdo->query("SELECT DISTINCT * FROM products");
}

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        width: 160px; /* عرض خط صورتی */
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
                            <img src="images/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['pname']); ?>">
                        </div>
                        <div class="price_text mt-2" style="font-size: 14px; color: #333;">
                            <?php echo number_format($row['price']); ?> تومان
                        </div>
                        <h6 class="strawberry_text"><?php echo htmlspecialchars($row['pname']); ?></h6>
                        <div class="description" style="flex-grow: 1; display: flex; align-items: center; justify-content: center; text-align: center;">
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
