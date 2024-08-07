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
  <style>
    .untree_co--site-hero * {
      color: white !important;
    }
  </style>
</head>

<body>
  <?php include 'header.php'; ?>

  <main class="untree_co--site-main">
    <div class="untree_co--site-hero inner-page bg-light" style="background-image: url('../images/about_us.png'); background-size: cover; background-position: center;">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-9">
            <div class="site-hero-contents" data-aos="fade-up">
              <h1 class="hero-heading">About Us</h1>
              <div class="sub-text w-75">
                <p>Learn more about Diamond Coast Hotel and what makes us a premier destination for luxury and comfort.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="untree_co--site-section">
      <div class="container">
        <div class="row">
          <div class="col-12" data-aos="fade-up">
            <h2 class="display-4 mb-5 whiteTxt">Our Story</h2>
          </div>
          <div class="col-md-6 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
            <p>Welcome to the Diamond Coast, Freetown's newest and most luxurious hotel. Established in 2024, the Diamond Coast offers travelers a sophisticated retreat in the heart of this vibrant city. Our contemporary design takes inspiration from the sparkling waters and pristine beaches just minutes away. Guests can look forward to spacious accommodations, world-class amenities, and stunning panoramic views of the coast and nearby mountains. Whether visiting for business or leisure, our dedicated team is committed to ensuring your stay is comfortable, productive, and truly exceptional. We invite you to discover the Diamond Coast - a brilliant gem along the shores of Freetown.</p>
          </div>
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
            <img src="../images/Diamond.png" alt="Hotel Interior" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php include 'footer.php'; ?>
  </div>
  <?php include 'searchWrapper.php'; ?>
</body>

</html>