<footer class="untree_co--site-footer">

        <div class="container">
          <div class="row">
            <div class="col-md-4 pr-md-5">
              <h3>About Us</h3>
              <p>A hotel is an establishment that provides paid lodging on a short-term basis. Facilities provided may range from a modest-quality.</p>
            </div>
            <div class="col-md-8 ml-auto">
              <div class="row">
                <div class="col-md-3">
                  <h3>Navigation</h3>
                  <ul class="list-unstyled">
                    <li><a href="#" class="whiteTxt">Home</a></li>
                    <li><a href="#" class="whiteTxt">Rooms</a></li>
                    <li><a href="#" class="whiteTxt">My Booking</a></li>
                    <li><a href="#" class="whiteTxt">Gallery</a></li>
                    <li><a href="#" class="whiteTxt">About Us</a></li>
                    <li><a href="#" class="whiteTxt">Contact</a></li>
                  </ul>
                </div>
                <div class="col-md-9 ml-auto">
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <h3>Address</h3>
                      <address>123 Beachfront Avenue, Aberdeen, <br> Freetown, Sierra Leone</address>
                    </div>
                    <div class="col-md-6">
                      <h3>Telephone</h3>
                      <p>
                        <a href="#" class="whiteTxt">+973 3390 7130</a> <br>
                        <a href="#" class="whiteTxt">+973 3511 4629</a> <br>
                        <a href="#" class="whiteTxt">+973 3739 9714</a> <br>
                        <a href="#" class="whiteTxt">+973 3638 2127</a> <br>
                        <a href="#" class="whiteTxt">+973 3215 5844</a> <br>
                        <a href="#" class="whiteTxt">+973 3978 0645</a> <br>
                      </p>
                    </div>
                  </div>

                  <div class="newsletter-subscribe">
                <h3 class="mb-0">Join our newsletter</h3>
                   <p>Be the first to know our latest updates and news!</p>
                  <form id="subscribeForm" class="form-subscribe" action="#">
                    <div class="form-group d-flex">
                        <input type="email" class="form-control mr-2" id="subscribeEmail" placeholder="Enter your email" required>
                      <input type="submit" value="Subscribe" class="btn btn-black px-4 text-white">
                     </div>
                  </form>
              </div>
              </div>
            </div>
          </div>
          <div class="row mt-5 pt-5 align-items-center">
            <div class="col-md-6 text-md-left">
              <p>
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> <a href="home.php">Diamond Coast Hotel</a>. All Rights Reserved. Design by <a href="#" target="_blank" class="text-primary">Diamond Coast Hotel</a>
              </p>
            </div>
          
          </div>
        </div>
        
      </footer>
      <div id="customAlert" class="modal">
  <div class="modal-content">
    <span class="close-button">&times;</span>
    <h2 style="text-align:center;">DiamondCoast</h2>
    <p id="alertMessage" style ="text-align:center; font-weight:bold"></p>
    <button id="okButton" class="btn btn-black">OK</button>
  </div>
</div>
<script>
  // Reusing the modal from the previous example
  var modal = document.getElementById("customAlert");
  var modalMessage = document.getElementById("alertMessage");
  var closeButton = document.querySelector(".close-button");
  var okButton = document.getElementById("okButton");

  function showAlert(message) {
    modalMessage.textContent = message;
    modal.style.display = "block";
  }

  closeButton.onclick = function() {
    modal.style.display = "none";
  }
  okButton.onclick = function() {
    modal.style.display = "none";
  }

  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
  // Handling the subscription form submission
  document.getElementById('subscribeForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var subscribeEmail = document.getElementById('subscribeEmail').value;

    var subscriptionMessage = "Thank you! You have been subscribed with the email ( " + subscribeEmail+ " )";
    showAlert(subscriptionMessage);

    document.getElementById('subscribeForm').reset();
  });
</script>
