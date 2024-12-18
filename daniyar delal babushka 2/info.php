<?php session_start();
include_once 'api/db.php';
if(!array_key_exists('id', $_GET)){
  header("location: search.php");
  exit;
}

$id = $_GET['id'];
$post = $db->query(
  "SELECT * FROM posts WHERE id = '$id'"
)->fetchAll();
if(empty($post)) {
  header("location: search.php");
  exit;
}
echo json_encode($post);


$userId = $post[0]['user_id'];
$user = $db->query(
  "SELECT * FROM users WHERE id = '$userId'"
)->fetchAll();
echo json_encode($user);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Найдено</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="styles/settings.css">
    <link rel="stylesheet" href="info.css">
</head>
<body>
    <header>
        <div class="container">
            <a href="search.php">На Страницу поиска</a>
        </div>
    </header>
    <main>
        <section class="info">
            <div class="container">
                <div class="info_item">
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <img src="images/img/sab.webp" />
                          </div>
                          <div class="swiper-slide">
                            <img src="images/img/sab.webp" />
                          </div>
                          <div class="swiper-slide">
                            <img src="images/img/sab.webp" />
                          </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                      </div>
                      <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <img src="images/img/sab.webp" />
                          </div>
                          <div class="swiper-slide">
                            <img src="images/img/sab.webp" />
                          </div>
                          <div class="swiper-slide">
                            <img src="images/img/sab.webp" />
                          </div>
                        </div>
                      </div>
                </div>
                <div class="info_item">
                <div class="pet-info">
                    <ul>
                        <li><?php echo $post[0]['type_animal']; ?></li>
                        <li><?php echo $user[0]['name']; ?></li>
                        <li><?php echo $user[0]['phone']; ?></li>
                        <li><?php echo $user[0]['email']; ?></li>
                        <li><?php echo $post[0]['description']; ?></li>
                        <li><?php echo $post[0]['mark']; ?></li>
                        <li><?php echo $post[0]['address']; ?></li>
                        <li><?php echo $post[0]['date_found']; ?></li>
                    </ul>
                </div>
                </div>
            </div>  
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiper2", {
      spaceBetween: 10,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      thumbs: {
        swiper: swiper,
      },
    });
  </script>
</body>
</html>