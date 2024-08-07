<?php
session_start(); // Start the session
if (!isset($_SESSION['username']) && !isset($_GET['room_type_id'])) {
    header("Location: sign-in.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php include 'links.php'; ?>



  <title>Diamond Coast Hotel</title>
</head>

<body>

  <?php include 'header.php'; ?>

  <main class="untree_co--site-main">


    <div class="untree_co--site-hero inner-page" style="background-image: url('../images/Gallery.png')">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7 text-center">
            <div class="site-hero-contents" data-aos="fade-up">
              <h1 class="hero-heading text-white">Gallery</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="untree_co--site-section">

      <div class="container-fluid px-0">

        <div class="row justify-content-center text-center pt-0 pb-5">
          <div class="col-lg-6 section-heading" data-aos="fade-up">
            <h3 class="text-center">Slider Gallery</h3>
          </div>
        </div>

        <div class="row align-items-stretch">
          <div class="col-9 relative" data-aos="fade-up" data-aos-delay="">
            <div class="owl-carousel owl-gallery-big">
              <div class="slide-thumb bg-image" style="background-image: url('../images/G8.jpg')"></div>
              <div class="slide-thumb bg-image" style="background-image: url('../images/G9.jpg')"></div>
              <div class="slide-thumb bg-image" style="background-image: url('../images/G10.jpg')"></div>
              <div class="slide-thumb bg-image" style="background-image: url('../images/Rece.jpg')"></div>
            </div>

            <div class="slider-counter text-center"></div>

          </div>
          <div class="col-3 relative" data-aos="fade-up" data-aos-delay="100">

            <div class="owl-carousel owl-gallery-small">
              <div class="slide-thumb bg-image" style="background-image: url('../images/G8.jpg')"><a href="#"></a></div>
              <div class="slide-thumb bg-image" style="background-image: url('../images/G9.jpg')"><a href="#"></a></div>
              <div class="slide-thumb bg-image" style="background-image: url('../images/G10.jpg')"><a href="#"></a></div>
              <div class="slide-thumb bg-image" style="background-image: url('../images/Rece.jpg')"><a href="#"></a></div>
            </div>

          </div>
        </div>
      </div>

    </div>

    <div class="untree_co--site-section">
      <div class="container">
        <div class="row justify-content-center text-center pt-0 pb-5">
          <div class="col-lg-6 section-heading" data-aos="fade-up">
            <h3 class="text-center">More Galleries</h3>
          </div>
        </div>
        <div class="row gutter-2">
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="">
            <a href="../images/G1.jpg" data-fancybox="gallery">
              <img src="../images/G1.jpg" alt="Image" class="img-fluid">
            </a>
          </div>
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <a href="../images/G2.jpg" data-fancybox="gallery">
              <img src="../images/G2.jpg" alt="Image" class="img-fluid">
            </a>
          </div>
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <a href="../images/G3.jpg" data-fancybox="gallery">
              <img src="../images/G3.jpg" alt="Image" class="img-fluid">
            </a>
          </div>
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
            <a href="../images/G4.jpg" data-fancybox="gallery">
              <img src="../images/G4.jpg" alt="Image" class="img-fluid">
            </a>
          </div>
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
            <a href="../images/G5.jpg" data-fancybox="gallery">
              <img src="../images/G5.jpg" alt="Image" class="img-fluid">
            </a>
          </div>
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="">
            <a href="../images/G6.jpg" data-fancybox="gallery">
              <img src="../images/G6.jpg" alt="Image" class="img-fluid">
            </a>
          </div>
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <a href="../images/G7.jpg" data-fancybox="gallery">
              <img src="../images/G7.jpg" alt="Image" class="img-fluid">
            </a>
          </div>
        </div>
      </div>
    </div>






  </main>
  <?php include 'footer.php'; ?>
  </div>
  <!-- Search -->
  <?php include 'searchWrapper.php'; ?>
</body>

</html>