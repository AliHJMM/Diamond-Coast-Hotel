<?php
session_start(); // Start the session
require_once 'config.php';
if (!isset($_SESSION['username'])) {
    header("Location: sign-in.php");
    exit();
}

try {
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $room_id = isset($_GET['room_id']) ? (int)$_GET['room_id'] : 0;
    $stmt = $pdo->prepare("SELECT * FROM rooms WHERE room_id = :room_id");
    $stmt->execute(['room_id' => $room_id]);
    $room = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

if (!$room) {
    echo "Room not found!";
    header("Location: rooms.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="DiamondCoastHotelLogo.png">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:400,500i,700|Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/vendor/icomoon/style.css">
    <link rel="stylesheet" href="css/vendor/owl.carousel.min.css">
    <link rel="stylesheet" href="css/vendor/aos.css">
    <link rel="stylesheet" href="css/vendor/animate.min.css">
    <link rel="stylesheet" href="css/vendor/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Diamond Coast Hotel - Booking</title>
    <style>
        .room-details-container {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }
        .room-image {
            max-width: 300px;
            height: auto;
            margin-right: 20px;
        }
        .room-info {
            flex: 2;
        }
        .booking-form-container {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            margin-top: 10px;
        }
        .booking-form-container .form-group {
            margin-right: 20px;
            flex: 1;
        }
        .booking-form-container .form-group:last-child {
            margin-right: 0;
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
        <nav class="untree_co--site-nav js-sticky-nav">
            <div class="container d-flex align-items-center">
                <div class="logo-wrap">
                    <a href="home.php" class="untree_co--site-logo">Diamond Coast Hotel</a>
                </div>
                <div class="site-nav-ul-wrap text-center d-none d-lg-block">
                    <ul class="site-nav-ul js-clone-nav">
                        <li><a href="index.php">Home</a></li>
                        <li class="has-children"><a href="rooms.php">Rooms</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="weather.php">Weather</a></li>
                    </ul>
                </div>
                <div class="icons-wrap text-md-right">
                    <ul class="icons-top d-none d-lg-block">
                        <li class="mr-4">
                        <a href="#" class="js-search-toggle"><span class="fa fa-search"></span></a>
                        </li>
                        <li>
                            <a href="#"><span class="icon-facebook"></span></a>
                        </li>
                        <li>
                            <a href="#"><span class="icon-twitter"></span></a>
                        </li>
                        <li>
                            <a href="#"><span class="icon-instagram"></span></a>
                        </li>
                    </ul>
                    <a href="#" class="d-block d-lg-none burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
                        <span></span>
                    </a>
                </div>
            </div>
        </nav>

        <div class="untree_co--site-main">
            <div class="untree_co--site-section">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-6 section-heading" data-aos="fade-up">
                            <h3 class="text-center">Booking</h3>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="room-details-container">
                                <img src="images/<?php echo htmlspecialchars($room['image_url']); ?>" alt="Room Image" class="room-image">
                                <div class="room-info">
                                    <h4><?php echo htmlspecialchars($room['name']); ?></h4>
                                    <p><?php echo htmlspecialchars($room['description']); ?></p>
                                    <p>Price per night: <strong>$<?php echo htmlspecialchars($room['price']); ?></strong></p>
                                </div>
                            </div>
                            <div class="booking-form-container">
                                <form action="process_booking.php" method="post" class="booking-form" data-aos="fade-up">
                                    <input type="hidden" name="room_id" value="<?php echo htmlspecialchars($room['room_id']); ?>">
                                    <div class="form-group">
                                        <label for="start_date">Start Date</label>
                                        <input type="date" name="start_date" id="start_date" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="end_date">End Date</label>
                                        <input type="date" name="end_date" id="end_date" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="total_price">Total Price</label>
                                        <input type="text" name="total_price" id="total_price" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Book Now</button>
                                    </div>
                                </form>
                            </div>
                            <!-- Additional content can go here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'footer.php'; ?>
    </div>

    <?php include 'searchWrapper.php'; ?>

    <script src="js/vendor/jquery-3.3.1.min.js"></script>
    <script src="js/vendor/popper.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/vendor/owl.carousel.min.js"></script>
    <script src="js/vendor/jarallax.min.js"></script>
    <script src="js/vendor/jarallax-element.min.js"></script>
    <script src="js/vendor/ofi.min.js"></script>
    <script src="js/vendor/aos.js"></script>
    <script src="js/vendor/jquery.lettering.js"></script>
    <script src="js/vendor/jquery.sticky.js"></script>
    <script src="js/vendor/TweenMax.min.js"></script>
    <script src="js/vendor/ScrollMagic.min.js"></script>
    <script src="js/vendor/scrollmagic.animation.gsap.min.js"></script>
    <script src="js/vendor/debug.addIndicators.min.js"></script>
    <script src="js/main.js" defer></script>
  <script src="js/darkmode.js" defer></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Set the minimum date for the start date input
            var today = new Date().toISOString().split('T')[0];
            document.getElementById("start_date").setAttribute('min', today);

            // Event listener for changes in the start date
            document.getElementById("start_date").addEventListener('change', function () {
                var startDate = document.getElementById("start_date").value;
                document.getElementById("end_date").setAttribute('min', startDate);
                calculateTotalPrice();
            });

            // Event listener for changes in the end date
            document.getElementById("end_date").addEventListener('change', calculateTotalPrice);

            // Function to calculate the total price
            function calculateTotalPrice() {
                var startDate = new Date(document.getElementById("start_date").value);
                var endDate = new Date(document.getElementById("end_date").value);
                if (startDate && endDate && startDate <= endDate) {
                    var diffTime = Math.abs(endDate - startDate);
                    var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                    var pricePerNight = <?php echo $room['price']; ?>; // Get price per night from PHP
                    var totalPrice = diffDays * pricePerNight;
                    document.getElementById("total_price").value = '$' + totalPrice;
                } else {
                    document.getElementById("total_price").value = '';
                }
            }
        });
    </script>
</body>
</html>
