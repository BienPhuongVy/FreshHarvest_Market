<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}

if (isset($_POST['add_to_wishlist'])) {

    $pid = filter_var($_POST['pid'], FILTER_SANITIZE_STRING);
    $p_name = filter_var($_POST['p_name'], FILTER_SANITIZE_STRING);
    $p_price = filter_var($_POST['p_price'], FILTER_SANITIZE_STRING);
    $p_image = filter_var($_POST['p_image'], FILTER_SANITIZE_STRING);

    $check_wishlist_numbers = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
    $check_wishlist_numbers->execute([$p_name, $user_id]);

    $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
    $check_cart_numbers->execute([$p_name, $user_id]);

    if ($check_wishlist_numbers->rowCount() > 0) {
        $message[] = 'Đã thêm vào danh sách yêu thích!';
    } elseif ($check_cart_numbers->rowCount() > 0) {
        $message[] = 'Đã thêm vào giỏ hàng!';
    } else {
        $insert_wishlist = $conn->prepare("INSERT INTO `wishlist`(user_id, pid, name, price, image) VALUES(?,?,?,?,?)");
        $insert_wishlist->execute([$user_id, $pid, $p_name, $p_price, $p_image]);
        $message[] = 'Đã thêm vào danh sách yêu thích!';
    }
}

if (isset($_POST['add_to_cart'])) {

    $pid = filter_var($_POST['pid'], FILTER_SANITIZE_STRING);
    $p_name = filter_var($_POST['p_name'], FILTER_SANITIZE_STRING);
    $p_price = filter_var($_POST['p_price'], FILTER_SANITIZE_STRING);
    $p_image = filter_var($_POST['p_image'], FILTER_SANITIZE_STRING);
    $p_qty = filter_var($_POST['p_qty'], FILTER_SANITIZE_STRING);

    $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
    $check_cart_numbers->execute([$p_name, $user_id]);

    if ($check_cart_numbers->rowCount() > 0) {
        $message[] = 'Đã thêm vào giỏ hàng!';
    } else {
        $check_wishlist_numbers = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
        $check_wishlist_numbers->execute([$p_name, $user_id]);

        if ($check_wishlist_numbers->rowCount() > 0) {
            $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE name = ? AND user_id = ?");
            $delete_wishlist->execute([$p_name, $user_id]);
        }

        $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES(?,?,?,?,?,?)");
        $insert_cart->execute([$user_id, $pid, $p_name, $p_price, $p_qty, $p_image]);
        $message[] = 'Đã thêm vào giỏ hàng!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Trang chủ</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<?php include 'header.php'; ?>

<div class="home-bg3">
   <section class="home">
      <div class="content">
         <span>ĐỪNG LO LẮNG, CHỈ CẦN LỰA CHỌN THỰC PHẨM HỮU CƠ</span>
         <h3>Chăm sóc sức khỏe mỗi ngày với thực phẩm tự nhiên, an toàn và tươi ngon.</h3>
         <p>Tại FreshHarvest Market, chúng tôi mang đến thực phẩm hữu cơ tươi ngon, giúp bạn duy trì sức khỏe và lối sống lành mạnh mỗi ngày.</p>
         <a href="about.php" class="btn">về chúng tôi</a>
      </div>
   </section>
</div>

<section class="home-category">
   <h1 class="title">mua theo danh mục</h1>
   <div class="box-container">
      <div class="box">
         <img src="images/cat-1.png" alt="">
         <h3>trái cây</h3>
         <p>Chọn lựa trái cây tươi ngon, ngọt lành từ vườn, giàu dinh dưỡng cho mỗi bữa ăn.</p>
         <a href="category.php?category=fruits" class="btn">trái cây</a>
      </div>
      <div class="box">
         <img src="images/Thit.png" alt="">
         <h3>thịt</h3>
         <p>Cung cấp thịt tươi, đảm bảo chất lượng, nguồn gốc rõ ràng, tốt cho sức khỏe.</p>
         <a href="category.php?category=meat" class="btn">thịt</a>
      </div>
      <div class="box">
         <img src="images/RauCu.png" alt="">
         <h3>rau củ</h3>
         <p>Những loại rau củ tươi xanh, không hóa chất, đầy đủ vitamin, giúp bữa ăn thêm phần dinh dưỡng.</p>
         <a href="category.php?category=vegitables" class="btn">rau củ</a>
      </div>
      <div class="box">
         <img src="images/Ca1.jpg" alt="">
         <h3>cá</h3>
         <p>Cá biển tươi ngon, đảm bảo vệ sinh, mang lại nguồn omega-3 tuyệt vời cho sức khỏe.</p>
         <a href="category.php?category=fish" class="btn">cá</a>
      </div>
   </div>
</section>

<section class="products">
   <h1 class="title">sản phẩm mới nhất</h1>
   <div class="box-container">
   <?php
      $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
      $select_products->execute();
      if ($select_products->rowCount() > 0) {
         while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) { 
   ?>
   <form action="" class="box" method="POST">
      <div class="price"><span><?= $fetch_products['price']; ?></span>VNĐ/KG</div>
      <a href="view_page.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
      <div class="name"><?= $fetch_products['name']; ?></div>
      <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
      <input type="hidden" name="p_name" value="<?= $fetch_products['name']; ?>">
      <input type="hidden" name="p_price" value="<?= $fetch_products['price']; ?>">
      <input type="hidden" name="p_image" value="<?= $fetch_products['image']; ?>">
      <input type="number" min="1" value="1" name="p_qty" class="qty">
      <input type="submit" value="thêm vào danh sách yêu thích" class="option-btn" name="add_to_wishlist">
      <input type="submit" value="thêm vào giỏ hàng" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   } else {
      echo '<p class="empty">chưa có sản phẩm nào được thêm vào!</p>';
   }
   ?>
   </div>
</section>

<?php include 'footer.php'; ?>
<script src="js/script.js"></script>
</body>
</html>
