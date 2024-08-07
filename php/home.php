<?php
session_start(); // Start the session

if (!isset($_SESSION['username'])) {
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

  <div class="untree_co--site-main">


    <div class="owl-carousel owl-hero">

      <div class="untree_co--site-hero overlay" style="background-image: url('../images/Hotel_DCH.webp')">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-8">
              <div class="site-hero-contents text-center" data-aos="fade-up">
                <h1 class="hero-heading">Diamond Coast Hotel</h1>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="untree_co--site-hero overlay" style="background-image: url('../images/slider_1.jpg')">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7">
              <div class="site-hero-contents text-center" data-aos="fade-up">
                <h1 class="hero-heading">Enjoy Your Stay</h1>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="untree_co--site-hero overlay" style="background-image: url('../images/S3.jpg')">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-10">
              <div class="site-hero-contents text-center" data-aos="fade-up">
                <h1 class="hero-heading">Away from the Hustle and Bustle of City Life</h1>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="untree_co--site-section float-left pb-0 featured-rooms">

      <div class="container pt-0 pb-5">
        <div class="row justify-content-center text-center">
          <div class="col-lg-6 section-heading" data-aos="fade-up">
            <h3 class="text-center">Featured Rooms</h3>
          </div>
        </div>
      </div>

      <div class="container-fluid pt-5">
        <div class="suite-wrap overlap-image-1">

          <div class="suite">
            <div class="image-stack">
              <div class="image-stack-item image-stack-item-top" data-jarallax-element="-50">
                <div class="overlay"></div>
                <img src="../images/room_1_a.jpg" alt="Image" class="img-fluid pic1">
              </div>
              <div class="image-stack-item image-stack-item-bottom">
                <div class="overlay"></div>
                <img src="../images/room_1_b.jpg" alt="Image" class="img-fluid pic2">
              </div>
            </div>
          </div> <!-- .suite -->

          <div class="suite-contents" data-jarallax-element="50">
            <h2 class="suite-title whiteTxt">King Bedroom</h2>
            <div class="suite-excerpt">
              <p>Relax in the comfort of our spacious King Bedroom, featuring a plush king-size bed, stunning city or garden views, and premium amenities for an exceptional stay. Enjoy the convenience of high-speed Wi-Fi and a work desk, along with a spa-inspired bathroom, for a luxurious respite.</p>
              <p><a href="rooms.php#KingRoom" class="readmore whiteTxt">Room Details</a></p>
            </div>
          </div>
        </div>

        <div class="suite-wrap overlap-image-2">

          <div class="suite">
            <div class="image-stack">
              <div class="image-stack-item image-stack-item-top">
                <div class="overlay"></div>
                <img src="../images/room_2_a.jpg" alt="Image" class="img-fluid pic1">
              </div>
              <div class="image-stack-item image-stack-item-bottom" data-jarallax-element="-50">
                <div class="overlay"></div>
                <img src="../images/room_2_b.jpg" alt="Image" class="img-fluid pic2">
              </div>
            </div>
          </div>

          <div class="suite-contents" data-jarallax-element="50">
            <h2 class="suite-title whiteTxt">Queen &amp; Double Bedroom</h2>
            <div class="suite-excerpt pr-5">
              <p>Our spacious Double Queen Bedroom provides the comfort of two plush queen beds, along with modern conveniences like high-speed Wi-Fi and a well-appointed bathroom. Ideal for families or groups, this room ensures a restful and rejuvenating stay.</p>
              <p><a href="rooms.php#QueenRoom" class="readmore whiteTxt">Room Details</a></p>
            </div>
          </div>

        </div>

      </div>
    </div>

    <div class="untree_co--site-section">
      <div class="container">
        <div class="container pt-0 pb-5">
          <div class="row justify-content-center text-center">
            <div class="col-lg-6 section-heading" data-aos="fade-up">
              <h3 class="text-center">Hotel Amenities</h3>
            </div>
          </div>
        </div>
        <div class="row custom-row-02192 align-items-stretch">
          <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
            <div class="media-29191 text-center h-100">
              <div class="media-29191-icon">
                <img src="../images/svg/parking.svg" alt="Image" class="img-fluid">
              </div>
              <h3>Free Self-Parking</h3>
              <p>Enjoy the convenience of complimentary self-parking during your stay. Our on-site lot provides hassle-free access, allowing you to come and go as needed without additional fees.</p>
              <p>
              <p><a href="about.php" class="readmore reverse whiteTxt whiteTxt">Read More</a></p>
              </p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="200">
            <div class="media-29191 text-center h-100">
              <div class="media-29191-icon">
                <img src="../images/svg/internet.svg" alt="Image" class="img-fluid">
              </div>
              <h3>High speed Internet access</h3>
              <p>High-speed WiFi is available throughout our hotel, keeping you connected during your stay at no extra charge.</p>
              <p>
              <p><a href="about.php" class="readmore reverse whiteTxt">Read More</a></p>
              </p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
            <div class="media-29191 text-center h-100">
              <div class="media-29191-icon">
                <img src="../images/svg/wifi.svg" alt="Image" class="img-fluid">
              </div>
              <h3>Complimentary WiFi in public areas</h3>
              <p>Complimentary WiFi is accessible in all our public spaces, enabling you to stay connected while enjoying the hotel's common areas.</p>
              <p>
              <p><a href="about.php" class="readmore reverse whiteTxt">Read More</a></p>
              </p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="200">
            <div class="media-29191 text-center h-100">
              <div class="media-29191-icon">
                <img src="../images/svg/elevator.svg" alt="Image" class="img-fluid">
              </div>
              <h3>Elevators</h3>
              <p>Elevators provide easy access to all floors, ensuring a smooth and convenient stay.</p>
              <p>
              <p><a href="about.php" class="readmore reverse whiteTxt">Read More</a></p>
              </p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
            <div class="media-29191 text-center h-100">
              <div class="media-29191-icon">
                <img src="../images/svg/partners.svg" alt="Image" class="img-fluid">
              </div>

              <h3>Meeting rooms</h3>
              <p>Our well-equipped meeting rooms offer flexible spaces for your business or event needs.</p>
              <p>
              <p><a href="about.php" class="readmore reverse whiteTxt">Read More</a></p>
              </p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="200">
            <div class="media-29191 text-center h-100">
              <div class="media-29191-icon">
                <img src="../images/svg/washing-machine.svg" alt="Image" class="img-fluid">
              </div>
              <h3>Laundry and Valet service</h3>
              <p>Convenient laundry and valet services are available to cater to your needs during your stay.</p>
              <p>
              <p><a href="about.php" class="readmore reverse whiteTxt">Read More</a></p>
              </p>
            </div>
          </div>

        </div>
      </div>
    </div>



  </div>
  <?php include 'footer.php'; ?>
  </div>

  <!-- Search -->
  <?php include 'searchWrapper.php'; ?>

</body>

</html>