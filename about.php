<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="DiamondCoastHotelLogo.png">

  <?php include 'links.php'; ?>

  <meta name="description" content="" />
  <meta name="keywords" content="" />



  <title>Diamond Coast Hotel</title>

  <style>
    .untree_co--site-hero * {
      color: white !important;
    }

  </style>
</head>

<body>
  <div id="untree_co--overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

  <nav class="untree_co--site-mobile-menu">
    <div class="close-wrap d-flex">
      <a href="#" class="d-flex ml-auto js-menu-toggle">
        <span class="close-label">Close</span>
        <div class="close-times">
          <span class="bar1"></span>
          <span class="bar2"></span>
        </div>
      </a>
    </div>
    <div class="site-mobile-inner"></div>
  </nav>

  <div class="untree_co--site-wrap">
    <nav class="untree_co--site-nav dark js-sticky-nav">
      <div class="container d-flex align-items-center">
        <div class="logo-wrap">
          <a href="home.php" class="untree_co--site-logo">Diamond Coast Hotel</a>
        </div>
        <div class="site-nav-ul-wrap text-center d-none d-lg-block">
          <ul class="site-nav-ul js-clone-nav">
            <li><a href="home.php">Home</a></li>
            <li class="has-children">
              <a href="rooms.php">Rooms</a>
              <ul class="dropdown">
                <li><a href="#">King Bedroom</a></li>
                <li><a href="#">Queen &amp; Double Bedroom</a></li>
                <li><a href="#">Le Voila Suite</a></li>
              </ul>
            </li>
            <li><a href="myBooking.php">My Booking</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="Weather.php">Weather</a></li>
            <li><a href="about.php">About Us</a></li>
          </ul>
        </div>
        <div class="icons-wrap text-md-right">
          <ul class="icons-top d-none d-lg-block">
            <li class="mr-4">
              <a href="#" class="js-search-toggle"><span class="fa fa-search"></span></a>
            </li>
            <li>
              <a href="#" id="darkModeToggle"><i class="fa-solid fa-moon" id="icon"></i></a>
            </li>
            <li>
              <a href="#"><i class="fa-solid fa-user"></i></a>
            </li>
            <li>
              <a href="log-out.php"><i class="fa-solid fa-right-from-bracket"></i></a>
            </li>
          </ul>
          <!-- Mobile Toggle -->
          <a href="#" class="d-block d-lg-none burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
            <span></span>
          </a>
        </div>
      </div>
    </nav>

    <main class="untree_co--site-main">
      <div class="untree_co--site-hero inner-page bg-light" style="background-image: url('images/about_us.png'); background-size: cover; background-position: center;">
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
              <p>Founded in 2020, Diamond Coast Hotel has been committed to providing world-class hospitality and unforgettable experiences to our guests. Nestled in the heart of New York, our hotel boasts luxurious accommodations, top-notch amenities, and exceptional service.</p>
            </div>
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
              <img src="images/slider_2.jpg" alt="Hotel Interior" class="img-fluid">
            </div>
          </div>
        </div>
      </div>

      <?php include 'specialRequest.php'; ?>
    </main>
    <?php include 'footer.php'; ?>
  </div>
  <!-- Search -->
  <?php include 'searchWrapper.php'; ?>
</body>

</html>
