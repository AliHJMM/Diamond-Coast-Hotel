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

    <div class="untree_co--site-hero inner-page bg-light" style="background-image: url('../images/Contact_us.png'); background-size: cover; background-position: center;">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-9">
            <div class="site-hero-contents" data-aos="fade-up">
              <h1 class="hero-heading">Contact Us</h1>
              <div class="sub-text w-75">
                <p>don't hesitate to contact our dedicated reservations team. We're available 24/7 to assist with all your travel planning needs.</p>
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
            <h2 class="display-4 mb-5 whiteTxt">Fill the form</h2>
          </div>
          <div class="col-md-6 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
            <form id="contactForm" action="#">
              <div class="form-group">
                <label for="name">Your Name *</label>
                <input type="text" class="form-control" id="name" required>
              </div>
              <div class="form-group">
                <label for="email">Your Email *</label>
                <input type="text" class="form-control" id="email" required>
              </div>
              <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" id="subject">
              </div>
              <div class="form-group">
                <label for="message">Message *</label>
                <textarea name="message" class="form-control" id="message" cols="30" rows="10" required></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send" class="btn btn-primary mt-4">
              </div>
            </form>
          </div>

          <div class="col-md-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
            <div class="media-29190">
              <span class="label">Email</span>
              <p><a href="#">malasfoor04@gmail.com</a></p>
            </div>
            <div class="media-29190">
              <span class="label">Phone</span>
              <p><a href="#">+973 37399714</a></p>
            </div>
            <div class="media-29190">
              <span class="label">Address</span>
              <p>123 Beachfront Avenue, Aberdeen,
              Freetown, Sierra Leone</p>
            </div>
            <div class="media-29190">
              <span class="label">Social</span>
              <ul class="icons-top icons-dark">
                <li><a href="https://www.facebook.com/leomessi/"><span class="icon-facebook"></span></a></li>
                <li><a href="https://x.com/eqrb_10"><span class="icon-twitter"></span></a></li>
                <li><a href="https://www.instagram.com/leomessi/"><span class="icon-instagram"></span></a></li>
                <li><a href="https://www.tripadvisor.com/Attraction_Review-g34438-d27734764-Reviews-The_Messi_Experience-Miami_Florida.html"><span class="icon-tripadvisor"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>


  </main>
  <?php include 'footer.php'; ?>
  </div>

  <!-- Search -->
  <?php include 'searchWrapper.php'; ?>

  <div id="customAlert" class="modal">
    <div class="modal-content">
      <span class="close-button">&times;</span>
      <h2 style="text-align:center;">Diamond Coast</h2>
      <p id="alertMessage" style="text-align:center; font-weight:bold;"></p>
      <button id="okButton" class="btn btn-black">OK</button>
    </div>
  </div>

  <script>
    // Get modal element
    var modal = document.getElementById("customAlert");
    var modalMessage = document.getElementById("alertMessage");
    var closeButton = document.querySelector(".close-button");
    var okButton = document.getElementById("okButton");

    // Function to show the modal with a custom message
    function showAlert(message) {
      modalMessage.textContent = message;
      modal.style.display = "block";
    }

    // Close the modal when the user clicks the close button or OK button
    closeButton.onclick = function() {
      modal.style.display = "none";
    }
    okButton.onclick = function() {
      modal.style.display = "none";
    }

    // Close the modal if the user clicks outside of the modal content
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }

    document.getElementById('contactForm').addEventListener('submit', function(event) {
      event.preventDefault();

      var name = document.getElementById('name').value;
      var email = document.getElementById('email').value;
      var subject = document.getElementById('subject').value;
      var message = document.getElementById('message').value;

      var confirmationMessage = "Thank you, " + name + "! We have received your message and will get back to you at " + email + " soon";

      // Use the custom alert
      showAlert(confirmationMessage);

      // Optionally, you can reset the form after submission
      document.getElementById('contactForm').reset();
    });
  </script>

</body>

</html>