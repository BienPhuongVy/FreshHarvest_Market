<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Về chúng tôi</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="about">

   <div class="row">

      <div class="box">
         <img src="images/about-img-3.png" alt="">
         <h3>tại sao chọn chúng tôi?</h3>
         <p>FreshHarvest Market cam kết cung cấp sản phẩm tươi ngon, an toàn và đạt tiêu chuẩn hữu cơ. Chúng tôi luôn chọn lọc kỹ càng từ trái cây, rau củ đến thịt và cá, đảm bảo chất lượng tuyệt vời cho mỗi bữa ăn của gia đình bạn. Với dịch vụ giao hàng nhanh chóng và đội ngũ tận tâm, chúng tôi mang đến sự an tâm và tiện lợi trong mỗi lần mua sắm.</p>
         <a href="contact.php" class="btn">liên hệ chúng tôi</a>
      </div>

      <div class="box">
         <img src="images/about-img-5.png" alt="">
         <h3>chúng tôi cung cấp gì?</h3>
         <p>Chúng tôi cung cấp các loại trái cây tươi ngon, rau củ sạch, thịt tươi và cá mát, được bảo quản và vận chuyển một cách tốt nhất để giữ nguyên giá trị dinh dưỡng. Mỗi sản phẩm đều được chọn lọc kỹ càng, mang đến sự an toàn tuyệt đối cho bữa ăn của bạn và gia đình. Tất cả các sản phẩm đều không sử dụng hóa chất độc hại, giúp bạn yên tâm về chất lượng và an toàn sức khỏe.</p>
         <a href="shop.php" class="btn">cửa hàng của chúng tôi</a>
      </div>

   </div>

</section>

<section class="reviews">

   <h1 class="title">đánh giá của khách hàng</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/pic-7.jpg" alt="">
         <p>Tôi rất hài lòng khi mua sắm tại FreshHarvest Market. Các sản phẩm tươi ngon, đặc biệt là rau củ và trái cây. Tôi luôn tin tưởng vào chất lượng và độ an toàn của các thực phẩm hữu cơ ở đây. Mua sắm tại đây rất tiện lợi và dễ dàng.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Ngọc Lan</h3>
      </div>

      <div class="box">
         <img src="images/pic-10.jpg" alt="">
         <p>FreshHarvest Market là nơi tôi tìm được thịt tươi ngon và sạch. Thịt không có mùi lạ và luôn tươi mới. Cửa hàng rất chú trọng đến chất lượng sản phẩm, mang đến sự an tâm cho tôi khi mua thực phẩm cho gia đình.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Minh Tuấn</h3>
      </div>

      <div class="box">
         <img src="images/pic-8.jpg" alt="">
         <p>Mình rất thích mua trái cây tại FreshHarvest Market. Trái cây luôn tươi ngon, ngọt lành và rất sạch. Cửa hàng có nhiều lựa chọn từ trái cây nhiệt đới đến mùa vụ, giúp mình dễ dàng lựa chọn cho mỗi bữa ăn.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Hương Giang</h3>
      </div>

      <div class="box">
         <img src="images/pic-11.jpg" alt="">
         <p>Cửa hàng này luôn cung cấp cá tươi ngon, đảm bảo vệ sinh. Mình đã thử nhiều lần và chưa bao giờ thất vọng. Sản phẩm được bảo quản tốt, tươi mát, giúp mình an tâm hơn khi chế biến cho gia đình.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Quang Huy</h3>
      </div>

      <div class="box">
         <img src="images/pic-9.jpg" alt="">
         <p>Mình tin tưởng FreshHarvest Market khi mua rau củ tươi xanh cho gia đình. Rau luôn có chất lượng tốt, không hóa chất, giúp các bữa ăn luôn bổ dưỡng và an toàn. Cửa hàng giao hàng nhanh chóng và dịch vụ rất chu đáo.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Lan Anh</h3>
      </div>

      <div class="box">
         <img src="images/pic-12.jpg" alt="">
         <p>Tôi đã mua thực phẩm tại FreshHarvest Market nhiều lần và rất hài lòng. Thịt, cá, trái cây đều tươi ngon và sạch sẽ. Dịch vụ giao hàng nhanh chóng, nhân viên rất nhiệt tình và dễ chịu. Đây là nơi tôi luôn chọn mua thực phẩm an toàn cho gia đình.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Phúc An</h3>
      </div>

   </div>

</section>

<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>
