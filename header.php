<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

@include 'config.php';

$user_id = $_SESSION['user_id'] ?? null;

if (!$user_id) {
    header('location:login.php');
    exit; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiêu đề</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    
    <link rel="stylesheet" href="css/admin_style.css">
</head>
<body>

<?php
if (isset($message)) {
    foreach ($message as $message) {
        echo '
        <div class="message">
            <span>' . htmlspecialchars($message) . '</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
        ';
    }
}
?>

<header class="header">
    <div class="flex">
        <a href="home.php" class="logo">FreshHarvest<span> Market</span></a>

        <nav class="navbar">
            <a href="home.php">Trang chủ</a>
            <a href="shop.php">Cửa hàng</a>
            <a href="orders.php">Đơn hàng</a>
            <a href="about.php">Giới thiệu</a>
            <a href="contact.php">Liên hệ</a>
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user"></div>
            <a href="search_page.php" class="fas fa-search"></a>
            <?php
                $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
                $count_cart_items->execute([$user_id]);

                $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
                $count_wishlist_items->execute([$user_id]);
            ?>
            <a href="wishlist.php"><i class="fas fa-heart"></i><span>(<?= $count_wishlist_items->rowCount(); ?>)</span></a>
            <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $count_cart_items->rowCount(); ?>)</span></a>
        </div>

        <div class="profile">
            <?php
                $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
                $select_profile->execute([$user_id]);
                $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            ?>
            <img src="uploaded_img/<?= htmlspecialchars($fetch_profile['image']); ?>" alt="">
            <p><?= htmlspecialchars($fetch_profile['name']); ?></p>
            <a href="user_profile_update.php" class="btn">cập nhật hồ sơ</a>
            <a href="logout.php" class="delete-btn">đăng xuất</a>
            <div class="flex-btn">
                <a href="login.php" class="option-btn">đăng nhập</a>
                <a href="register.php" class="option-btn">đăng ký</a>
            </div>
        </div>
    </div>
</header>

</body>
</html>
